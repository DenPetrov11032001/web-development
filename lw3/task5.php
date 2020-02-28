<?php 
    function getGETParameter(string $name): ?string
    {
        return isset($_GET[$name]) ? (string) $_GET[$name] : null;
    }

    $fileSource = fopen('data/den11032001.txt', 'r');
    $fileStr = file_get_contents ('data/den11032001.txt');
    $fileDataArray = explode("\n", $fileStr);
    
    $firstNameUser = $fileDataArray[0];
    $lastNameUser = $fileDataArray[1];
    $emailUser = $fileDataArray[2];
    $ageUser = $fileDataArray[3];

    echo "Fitst Name: ".$firstNameUser."<BR>";
    echo "Last Name: ".$lastNameUser."<BR>";
    echo "Email: ".$emailUser."<BR>";
    echo "Age: ".$ageUser."<BR>";
    fclose($fileSource);
