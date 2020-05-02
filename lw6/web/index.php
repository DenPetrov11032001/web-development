<?php
    include("../src/common.inc.php");

    if (getFormMethod() === "POST")
    {
        saveFeedbackPage();
    }
    else
    {
        mainPage();
    }
