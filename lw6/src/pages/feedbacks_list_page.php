<?php

    function feedbacksListPage()
    {
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

        $email = $_GET['email'];
        $fileDataArray = getDataFromFile('../src/data/' . $email . '.txt');

        $name = $fileDataArray['name'];
        $email = $fileDataArray['email'];
        $country = $fileDataArray['country'];
        $gender = $fileDataArray['gender'];
        $message = $fileDataArray['message'];

        renderTemplate('feedbacks.tpl.php', ['name' => "{$name}", 'email' => "{$email}",
            'country' => "{$country}", 'gender' => "{$gender}",
            'message' => "{$message}"]);
    }

