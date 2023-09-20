<?php
try 
{
    if (session_status() == PHP_SESSION_NONE) 
    {
        session_start();
    }
} 
catch (Exception $e) 
{
    echo "An error occurred while starting the session: " . $e->getMessage();
}
