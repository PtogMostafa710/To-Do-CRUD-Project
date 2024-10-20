<?php

function sanitize($value) {
    // sanitize
    $value = trim(htmlentities(htmlspecialchars($value)));

    return $value;
}