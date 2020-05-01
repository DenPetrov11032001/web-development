<?php
    include("../utils/request.php");

    function writeDataToFile(string $fileName)
    {
        $isWriteInFile = false;
        foreach ($_GET as $key => $value)
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

    $emailUser = getParameter('email');
    $fileName = '../data/' . $emailUser . '.txt';

    writeDataToFile($fileName);

    $host  = $_SERVER['HTTP_HOST'];
    header("Location: http://$host/src/pages/feedbacks_list_page.php" . "?email={$emailUser}");

