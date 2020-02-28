<?php 
    function getGETParameter(string $name): ?string
    {
        return isset($_GET[$name]) ? (string) $_GET[$name] : null;
    }

    $emailUser = getGETParameter('email');
        
    $dir = 'data/'; 
    if (!file_exists($dir.$emailUser)){ 
        $fileSource = fopen($dir.$emailUser.'.txt', 'w+'); 
    }

    $firstNameUser = getGETParameter('first_name');
    $lastNameuser = getGETParameter('last_name');
    $ageUser = getGETParameter('age');
    if ($firstNameUser != null) fwrite($fileSource, $firstNameUser.PHP_EOL);
    if ($lastNameuser != null) fwrite($fileSource, $lastNameuser.PHP_EOL);
    fwrite($fileSource, $emailUser.PHP_EOL);
    if ($ageUser != null) fwrite($fileSource, $ageUser.PHP_EOL);

    fclose($fileSource);