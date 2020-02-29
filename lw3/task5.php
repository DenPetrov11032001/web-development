<?php 
    header("Content-Type: text/plain");
    function getGETParameter(string $name): ?string
    {
        return isset($_GET[$name]) ? (string) $_GET[$name] : null;
    }

    $fileSource = fopen('data/den.txt', 'r');
    $fileStr = file_get_contents('data/den.txt');
    $fileDataArray = array();
    $arrayPairs = explode(';', $fileStr);
    foreach($arrayPairs as $str) 
    {
        list($key, $value) = explode('=>', $str);
        $fileDataArray[$key] = $value;
    }

    $firstNameUser = $fileDataArray['first_name'];
    $lastNameUser = $fileDataArray['last_name'];
    $emailUser = $fileDataArray['email'];
    $ageUser = $fileDataArray['age'];

    echo "Fitst Name: " . $firstNameUser . "\n";
    echo "Last Name: " . $lastNameUser . "\n";
    echo "Email: " . $emailUser . "\n";
    echo "Age: " . $ageUser . "\n";
    
    fclose($fileSource);
