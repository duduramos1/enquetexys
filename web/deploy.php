<?php

$key = isset($_GET['k']) ? $_GET['k'] : null;

chdir(__DIR__.'/..');

exec('php deploy.php '.$key.' > deploy.log &');