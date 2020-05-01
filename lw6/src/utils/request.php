<?php
    function getParameter(string $name): ?string
    {
        return isset($_GET[$name]) ? (string)$_GET[$name] : null;
    }