<?php

/*
 * Very simplistic version of PEAR.php
 */
class NoccException
{
    var $message = '';

    function isException($data) {
        return (bool)(is_object($data) &&
                      (get_class($data) == "noccexception"));
    }

    function NoccException($message = "unknown error")
    {
        $this->message = $message;
    }

    function getMessage ()
    {
        return ($this->message);
    }
}

?>
