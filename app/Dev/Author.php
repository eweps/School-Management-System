<?php

namespace App\Dev;

/**
 * The class containing the authors information
 */
class Author {

    private static string $name;
    private static string $email;

    public function __construct()
    {
        self::$name = 'Mr Rabbit';
        self::$email = 'rabbitmaid@proton.me';
    }

    public static function getName(): string
    {
        return self::$name;
    }

    public static function getEmail(): string 
    {
        return self::$email;
    }

}