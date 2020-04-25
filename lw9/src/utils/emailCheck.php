<?php

    $email = $_POST["email"];
    header('Content-Type: application/json');

    $email = $_POST['email'];
    $name = $_POST['name'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $isEmailTrue = true;
    }
    else
    {
        $isEmailTrue = false;
    }

    $isNameTrue = ctype_alpha($name) && (strlen($name) >= 3);

    $arr = array('email' => $isEmailTrue, 'name' => $isNameTrue);
    echo json_encode($arr);
