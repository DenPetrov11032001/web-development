<?php

function saveFeedbackPage()
{
    $email = getParameter('email');
    $name = getParameter('name');
    $country = getParameter('country');
    $gender = getParameter('gender');
    $message = getParameter('message');

    $hasUser = hasUser(database()->quote($email));
    if ($name !== '' && $email !== '' && $message !== '' && $hasUser)
    {
        $isDataCorrect = 'Ваши данные приняты';
        addUser(
            database()->quote($email),
            database()->quote($name),
            database()->quote($country),
            database()->quote($gender),
            database()->quote($message)
        );
    }
    else
    {
        $isDataCorrect = 'Ваши данные не приняты';
    }

    renderTemplate("main.tpl.php",
        ['name' => "{$name}",
        'email' => "{$email}",
        'country' => "{$country}",
        'gender' => "{$gender}",
        'message' => "{$message}",
        'isDataCorrect' => "{$isDataCorrect}"]);
}
