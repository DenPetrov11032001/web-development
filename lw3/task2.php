<?php 
    function getGETParameter(string $name): ?string
    {
        return isset($_GET[$name]) ? (string) $_GET[$name] : null;
    }
    
    $query = getGETParameter('identifier');
    $firstSymbol = substr($query, 0, 1);
    if (preg_grep("/(1|2|3|4|5|6|7|8|9|0|#|@|'|&|%|!|<|>|\|;|:|,)/i", array($firstSymbol)) || $query == null){
        echo "No - the query string isn't an indifier";
    }
    else{
        echo "Yes - the query string is an indifier";
    }
