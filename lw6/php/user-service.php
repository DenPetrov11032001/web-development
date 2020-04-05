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


    header("Content-Type: text/plain");

    $emailUser = $_GET['email'];
    $fileDataArray = getDataFromFile('data/' . $emailUser . '.txt');

    $nameUser = $fileDataArray['name'];
    $emailUser = $fileDataArray['email'];
    $countryUser = $fileDataArray['country'];
    $genderUser = $fileDataArray['gender'];
    $messageUser = $fileDataArray['message'];

    define("name", "{$nameUser}");
    define("email", "{$emailUser}");
    define("country", "{$countryUser}");
    define("gender", "{$genderUser}");
    define("message", "{$messageUser}");

    header("Location: /user.php" . "?name={$nameUser}&email={$emailUser}&country={$countryUser}&gender={$genderUser}&message={$messageUser}");
?>
