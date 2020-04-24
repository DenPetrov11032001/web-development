<?php

    $email = $_POST["email"];
    header('Content-Type: application/json');

    $out[] = $_POST;
    $email = $out[0];

    $userEmail = substr($email[json], 10, -2);
    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL))
    {
        echo json_encode(true);
    }
    else
    {
        echo json_encode(false);
    }