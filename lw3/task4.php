<?php 
    function getGETParameter(string $name): ?string
    {
        return isset($_GET[$name]) ? (string) $_GET[$name] : null;
    }

    function userDataCorrect($nameFile, ?string $name, ?string $strName)
    {
        if ($name != null)
        {
            echo $strName . " : {$name}" . "<BR>";
        }
        else
        {
            echo "Not correct $strName. <BR>";
        }
    }

    $emailUser = getGETParameter('email');  
    $dir = 'data/';
    $fileName = $dir . $emailUser . '.txt'; 
    if (!file_exists($dir.$emailUser)){ 
        $fileSource = fopen($dir.$emailUser . '.txt', 'w+'); 
    }

    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);

    foreach ($queries as $key => $value) 
    {
        file_put_contents($fileName, "{$key}=>{$value};", FILE_APPEND);
    }

    $firstNameUser = $queries['first_name'];
    $lastNameUser = $queries['last_name'];
    $ageUser = $queries['age'];

    userDataCorrect($fileSource, $firstNameUser, 'firstNameUser');
    userDataCorrect($fileSource, $lastNameUser, 'lastNameUser');
    userDataCorrect($fileSource, $emailUser, 'emailUser');
    userDataCorrect($fileSource, $ageUser, 'ageUser');
