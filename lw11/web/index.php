<?php
include("../src/common.inc.php");

if (getRequestMethod() === "POST")
{
    saveFeedbackPage();
}
else
{
    mainPage();
}

