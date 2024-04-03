<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function clean($html) : string {
    $clean = htmlspecialchars($html);
    return $clean;
}