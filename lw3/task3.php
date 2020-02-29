<?php 
    function getGETParameter(string $name): ?string
    {
        return isset($_GET[$name]) ? (string) $_GET[$name] : null;
    }

    $query = getGETParameter('password');
    $security = 0;
    $lenQuery = strlen($query);
    $security += $lenQuery;
    $digitInQuery = preg_match_all('/[1-9]/', $query);
    $security += (4 * $digitinQuery);
    $charsInUpCase = preg_match_all('/[A-Z]/', $query);
    if ($charsInUpCase != 0){
        $security += 2*($lenQuery - $charsInUpCase);    
    }
    $charsInLowCase = preg_match_all('/[a-z]/', $query);
    if ($charsInLowCase != 0){
        $security += 2*($lenQuery - $charsInLowCase);    
    }
    // ex all low or up
    if ((($charsInUpCase != 0 ) && ($charsInLowCase == 0)) || (($charsInUpCase == 0 ) && ($charsInLowCase != 0)))
    {
        $security = 0;
    }
    // repeat chars
    $countRepeatChars = 0;
    $result = count_chars($query, 0);
    for ($i=0; $i < count($result); $i++)
    {
        if (($result[$i] != 0) && ($result[$i] != 1))
            $countRepeatChars += $result[$i];
    }
    $security -= $countRepeatChars;
    echo $security;