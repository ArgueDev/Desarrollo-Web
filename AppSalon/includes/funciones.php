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

function esUtlimo(string $actual, string $proximo): bool {
    if ($actual !== $proximo) {
        return true;
    } else {
        return false;
    }
}

/** Funciones que revisa que el usuario este autenticado */
function isAuth() : void {
    if (!isset($_SESSION['login'])) {
        header('location: /');
    }
}

/** Funciones que revisa que el Admin este autenticado */
function isAdmin() : void {
    if (!isset($_SESSION['admin'])) {
        header('location: /');
    }
}