<?php

function feedbacksListPage()
{
    $email = $_GET['email'];
    $dataFromDatabase = getUser(database()->quote($email));

    $name = $dataFromDatabase['name'];
    $email = $dataFromDatabase['email'];
    $country = $dataFromDatabase['country'];
    $gender = $dataFromDatabase['gender'];
    $message = $dataFromDatabase['message'];

    renderTemplate('feedbacks.tpl.php',
        ['name' => "{$name}",
        'email' => "{$email}",
        'country' => "{$country}",
        'gender' => "{$gender}",
        'message' => "{$message}"]);
}

