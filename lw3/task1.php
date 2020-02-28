<?php 
    function getGETParameter(string $name): ?string
    {
        return isset($_GET[$name]) ? (string) $_GET[$name] : null;
    }
    
    $query = getGETParameter('text');
    $query = trim($query);
    $query = preg_replace('/\s+/', ' ', $query);
    header("Content-Type: text/plain");
    echo $query;
