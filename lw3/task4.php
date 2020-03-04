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
            if (($key == 'first_name') || ($key == 'last_name') 
            || ($key == 'email') || ($key == 'age')) 
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
            echo "Field {$strName} doesn't exsist." . "\n";
        }
    }

    header("Content-Type: text/plain");

    $emailUser = getParameter('email'); 
    $dir = 'data/';
    $fileName = $dir . $emailUser . '.txt'; 

    writeDataToFile($fileName);

    userDataPrint('first_name');
    userDataPrint('last_name');
    userDataPrint('email');
    userDataPrint('age');
