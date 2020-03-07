<?php 
    function getParameter(string $name): ?string
    {
        return isset($_GET[$name]) ? (string)$_GET[$name] : null;
    }

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

    function printData(array $fileDataArray)
    {
        $firstNameUser = $fileDataArray['first_name'];
        $lastNameUser = $fileDataArray['last_name'];
        $emailUser = $fileDataArray['email'];
        $ageUser = $fileDataArray['age'];
    
        echo "Fitst Name: " . $firstNameUser . "\n";
        echo "Last Name: " . $lastNameUser . "\n";
        echo "Email: " . $emailUser . "\n";
        echo "Age: " . $ageUser . "\n";
    }

    header("Content-Type: text/plain");

    $emailUser = $_GET['email'];
    $fileDataArray = getDataFromFile('data/' . $emailUser . '.txt');
    printData($fileDataArray);
