<?php

function redirect($location)
{
    header("Location: {$location}");
}

function setMessageAndRedirect($index, $message, $redirectTo)
{
    setFlash($index, $message);
    return redirect($redirectTo);
}