<?php


// required input fn
function requireInput($value) {
    if (empty($value)) {
        return true;
    }

    return false;
}

function length_of_input($value, $length) {
    if (strlen($value) < $length) {
        return true;
    } elseif (strlen($value) > $length) {
        return false;
    }
}

function is_valid_email($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }

    return false;
}