# RSA Encryption in PHP

This project implements a basic RSA encryption and decryption algorithm in PHP from scratch. The implementation includes generating prime numbers, computing the necessary keys, and using those keys to encrypt and decrypt messages.

## Table of Contents
- [Overview](#overview)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Functions](#functions)
- [Example](#example)
- [Notes](#notes)

## Overview
RSA (Rivest-Shamir-Adleman) is an asymmetric cryptographic algorithm used for secure data transmission. This project demonstrates the key steps involved in RSA encryption:
1. Prime number generation
2. Key generation (public and private keys)
3. Encryption using the public key
4. Decryption using the private key

## Requirements
- PHP 7.2 or higher
- GMP extension for PHP

## Installation
1. Ensure PHP and GMP extension are installed on your system.
2. Clone this repository or download the source code.

## Usage
Run the PHP script to see the RSA encryption and decryption in action.

```bash
php rsa_encryption.php
```


# Functions
## Prime Number Generation
#### 1. `is_prime($num)`: Checks if a given number is prime.

#### 2. `generate_prime($bits)`: Generates a random prime number with the specified number of bits.

## Key Generation
#### 1. Two large primes, p and q, are generated.
#### 2. $n: Calculated as the product of p and q.
#### 3. $phi: Calculated as (p - 1) * (q - 1).

## Choosing Exponents
#### 1. $e: Chosen commonly as 65537, a widely used prime number.
#### 2. Ensure e is coprime with phi(n).
#### 3. $d: Calculated as the modular multiplicative inverse of e mod phi(n).

## Encryption and Decryption
#### 1. encrypt($message, $e, $n): Encrypts the message using the public key (e, n).
#### 2. decrypt($encrypted, $d, $n): Decrypts the message using the private key (d, n).

## Example
In the file rsa_encryption.php you will find an example of how to use the functions to encrypt and decrypt a message.



## Notes
This example uses small prime numbers for simplicity. In a real-world scenario, use much larger primes for security.
The message to be encrypted should be numeric in this basic implementation. For more practical use, consider converting text to numeric form before encryption.