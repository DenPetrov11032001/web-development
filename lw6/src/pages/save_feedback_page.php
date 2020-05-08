<?php

function saveFeedbackPage()
{
    $email = getParameter('email');
    $fileName = '../src/data/' . $email . '.txt';
    $name = getParameter('name');
    $country = getParameter('country');
    $gender = getParameter('gender');
    $message = getParameter('message');
    if ($name !== '' && $email !== '' && $message !== '')
    {
        $isDataCorrect = 'Ваши данные приняты';
        $isWriteInFile = false;
        foreach ($_POST as $key => $value)
        {
            if (($key == 'name') || ($key == 'country')
                || ($key == 'email') || ($key == 'gender')
                || ($key == 'message'))
            {
                if (!$isWriteInFile)
                {
                    file_put_contents($fileName, "{$key}=>{$value};");
                    $isWriteInFile = true;
                }
                else
                {
                    file_put_contents($fileName, "{$key}=>{$value};", FILE_APPEND);
                }
            }
        }
    }
    else
    {
        $isDataCorrect = 'Ваши данные не приняты';
    }

    renderTemplate("main.tpl.php", ['name' => "{$name}", 'email' => "{$email}",
        'country' => "{$country}", 'gender' => "{$gender}",
        'message' => "{$message}", 'isDataCorrect' => "{$isDataCorrect}"]);
}
