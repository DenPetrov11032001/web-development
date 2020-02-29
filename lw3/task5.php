<?php 
    function getGETParameter(string $name): ?string
    {
        return isset($_GET[$name]) ? (string) $_GET[$name] : null;
    }

    $fileSource = fopen('data/den.txt', 'r');
    $fileStr = file_get_contents('data/den.txt');
    $fileDataArray = array();
    $arrayPairs = explode(';', $fileStr);
    foreach($arrayPairs as $str) {
        list($key, $value) = explode('=>', $str);
        $fileDataArray[$key] = $value;
    }

    $firstNameUser = $fileDataArray['first_name'];
    $lastNameUser = $fileDataArray['last_name'];
    $emailUser = $fileDataArray['email'];
    $ageUser = $fileDataArray['age'];

    echo "Fitst Name: ".$firstNameUser."<BR>";
    echo "Last Name: ".$lastNameUser."<BR>";
    echo "Email: ".$emailUser."<BR>";
    echo "Age: ".$ageUser."<BR>";
    
    fclose($fileSource);
