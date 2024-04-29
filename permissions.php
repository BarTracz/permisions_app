<?php
function checkPermission($requiredRole) {
    if ($_SESSION['role'] != $requiredRole) {
        die("Insufficient permissions");
    }
}
?>