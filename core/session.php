<?php
function session_set($key, $value)
{
    $_SESSION[$key] = $value;
}

function session_get($key)
{
    return $_SESSION[$key] ?? [];
}

function alert_message($session_value, $status)
{

    $message = '';
    if (isset($_SESSION[$session_value])) {

        $message = session_get($session_value);

        $alert = <<<ALERT
                <div class='alert text-white bg-$status text-center'>
                    $message
                </div>
            ALERT;
        return $alert;
    }
    return '';
}
