<?php 
    function getGETParameter(string $name): ?string
    {
        return isset($_GET[$name]) ? (string) $_GET[$name] : null;
    }
    
    $query = getGETParameter('identifier');
    $firstSymbol = substr($query, 0, 1);
    if (preg_grep("/^[a-zA-Z]+[a-zA-Z0-9]*$/", array($firstSymbol)) || $query !== null)
    {
        echo "Yes - the query string is an indifier";
    }
    else{
        echo "No - the query string isn't an indifier";
    }
