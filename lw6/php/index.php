<?php 
    function getParameter(string $name): ?string
    {
        return isset($_GET[$name]) ? (string)$_GET[$name] : null;
    }

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

    function userDataPrint(?string $strName)
    {
        $value = getParameter("{$strName}");
        if ($value != null)
        {
            echo $strName . ": {$value}" . "\n";
        }
        else
        {
            echo "Field {$strName} doesn't exist." . "\n";
        }
    }

    header("Content-Type: text/plain");

    $emailUser = getParameter('email'); 
    $dir = 'data/';
    $fileName = $dir . $emailUser . '.txt'; 

    writeDataToFile($fileName);

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'user-service.php';
    header("Location: http://$host/php/$extra" . "?email={$emailUser}");