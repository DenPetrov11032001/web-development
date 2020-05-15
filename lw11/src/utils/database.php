<?php

function database(): PDO
{
    static $connection = null;
    if ($connection === null)
    {
        $connection = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    }
    return $connection;
}

function hasUser(string $email): bool
{
    $stmt = database()->query("
        SELECT
          *
        FROM
          users
        WHERE
          email = {$email}
    ");

    return empty($stmt->fetch());
}

function addUser(string $email, string $name, string $country, string $gender, string $message): void
{
    database()->query("
        INSERT INTO 
          users
        SET
          email = {$email},
          name = {$name},
          country = {$country},
          gender = {$gender},
          message = {$message}
    ");
}


function getUser(string $email): array
{
    $stmt = database()->query("
        SELECT 
          *
        FROM
          users
        WHERE
          email = {$email}    
    ");

    return $stmt->fetch();
}
