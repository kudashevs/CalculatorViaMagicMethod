<?php

namespace CalculatorViaMagicMethod;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $calc = new Calculator();
    echo $calc->add(22, 42, 0) . PHP_EOL; // 64
    echo $calc->multiply(5, 6, 8) . PHP_EOL; // 240
} catch (\Exception $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine() . '', 0);
    echo $e->getMessage() . PHP_EOL;
}

