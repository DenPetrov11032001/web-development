<?php
    function feedbacksListPage()
    {
        return require_once("/src/pages/feedbacks_list_page.php");
    }

    function saveFeedbackPage(string $name, string $email, string $country, string $gender, string $message)
    {
        $host  = $_SERVER['HTTP_HOST'];
        header("Location: http://$host/src/pages/save_feedback_page.php" . "?name={$name}&email={$email}&country={$country}&gender={$gender}&message={$message}");
    }

    function mainPage()
    {
        $host  = $_SERVER['HTTP_HOST'];
        header("Location: http://$host/src/pages/main_page.php");
    }

    function request()
    {
        require_once("/src/utils/request.php");
    }

    function template()
    {
       require_once("/src/utils/template.php");
    }