<?php
// Function to check if a number is prime
function is_prime($num) {
    if ($num <= 1) return false;
    if ($num <= 3) return true;
    if ($num % 2 == 0 || $num % 3 == 0) return false;

    for ($i = 5; $i * $i <= $num; $i += 6) {
        if ($num % $i == 0 || $num % ($i + 2) == 0) return false;
    }
    return true;
}

// Function to generate a random prime number with a specified number of bits
function generate_prime($bits) {
    do {
        $num = gmp_random_bits($bits);
    } while (!is_prime($num));

    return $num;
}

// Generate two large prime numbers, p and q
$p = generate_prime(8);
$q = generate_prime(8);

// Calculate n = p * q
$n = gmp_mul($p, $q);

// Calculate Euler's totient function, phi(n) = (p - 1) * (q - 1)
$phi = gmp_mul(gmp_sub($p, 1), gmp_sub($q, 1));

// Function to compute the greatest common divisor (GCD) using Euclid's algorithm
function gcd($a, $b) {
    while (gmp_cmp($b, 0) != 0) {
        $temp = $b;
        $b = gmp_mod($a, $b);
        $a = $temp;
    }
    return $a;
}

// Choose the encryption exponent e
// Commonly used value for e is 65537
$e = gmp_init(65537);

// Ensure e is coprime with phi(n)
while (gmp_cmp(gcd($e, $phi), 1) != 0) {
    $e = gmp_add($e, 2);
}

// Calculate the decryption exponent d, which is the modular multiplicative inverse of e mod phi(n)
$d = gmp_invert($e, $phi);

// Function to encrypt a message using the public key (e, n)
function encrypt($message, $e, $n) {
    $message = gmp_init($message);
    return gmp_powm($message, $e, $n); // Compute message^e mod n
}

// Function to decrypt a message using the private key (d, n)
function decrypt($encrypted, $d, $n) {
    return gmp_powm($encrypted, $d, $n); // Compute encrypted^d mod n
}

// Example usage
$message = "42"; // The message must be a number for this basic example
$encrypted = encrypt($message, $e, $n);
$decrypted = decrypt($encrypted, $d, $n);

// Output the generated keys and results
echo "p: $p, q: $q\n";
echo "n: $n, phi: $phi\n";
echo "e: $e, d: $d\n";
echo "Message: $message\n";
echo "Encrypted: " . gmp_strval($encrypted) . "\n";
echo "Decrypted: " . gmp_strval($decrypted) . "\n";
?>