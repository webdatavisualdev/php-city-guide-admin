<?php

include '../../admin/config.php';

$db = new mysqli($database['host'], $database['user'], $database['pass'], $database['db']);

if ($db->connect_errno) {
    printf("Connect failed: %s\n", $db->connect_error);
    exit();
}
?>
