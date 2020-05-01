<?php 
    include("../utils/request.php");
    include("../utils/template.php");

    function getDataFromFile(string $fileName): array
    {
        $fileStr = file_get_contents($fileName);
        $fileDataArray = array();
        $arrayPairs = explode(';', $fileStr);
        foreach($arrayPairs as $str) 
        {
            list($key, $value) = explode('=>', $str);
            $fileDataArray[$key] = $value;
        }
        return $fileDataArray;
    }

    $emailUser = $_GET['email'];
    $fileDataArray = getDataFromFile('../data/' . $emailUser . '.txt');

    $nameUser = $fileDataArray['name'];
    $emailUser = $fileDataArray['email'];
    $countryUser = $fileDataArray['country'];
    $genderUser = $fileDataArray['gender'];
    $messageUser = $fileDataArray['message'];

    renderTemplate('feedbacks.tpl.php', ['name' => "{$nameUser}", 'email' => "{$emailUser}",
                                                   'country' => "{$countryUser}", 'gender' => "{$genderUser}",
                                                   'message' => "{$messageUser}"]);

