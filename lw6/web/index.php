<?php
    include("../src/common.inc.php");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $message = $_POST['message'];

    if ($_SERVER['REQUEST_METHOD'] === "POST" && $email !== '')
    {
        saveFeedbackPage($name, $email, $country, $gender, $message);
    }
    else
    {
        mainPage();
    }


