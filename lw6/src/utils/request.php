<?php
    function getParameter(string $name): ?string
    {
        return isset($_POST[$name]) ? (string)$_POST[$name] : null;
    }

    function getFormMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }