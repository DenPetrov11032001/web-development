<?php
    include("../src/common.inc.php");

    if ($_SERVER['REQUEST_METHOD'] === "POST")
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $gender = $_POST['gender'];
        $message = $_POST['message'];

        saveFeedbackPage($name, $email, $country, $gender, $message);
    }
    else
    {
        mainPage();
    }


