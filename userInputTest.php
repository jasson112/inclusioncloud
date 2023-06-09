<?php
require_once __DIR__ . '/vendor/autoload.php';
use Ubuntu\Inclusioncloud\Test;

$test = Test::fromUserInput();
print($test->getResult());
?>