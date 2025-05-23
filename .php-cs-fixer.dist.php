<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;
use PHPyh\CodingStandard\PhpCsFixerCodingStandard;

$finder = (new Finder())
    ->in([
        'src',
        'tests',
        'bin',
    ])
    ->append([
        __FILE__,
        __DIR__ . '/check-top-packagist.php',
        __DIR__ . '/export-ignore.php',
    ]);

$config = (new Config())
    ->setCacheFile(__DIR__ . '/var/.php-cs-fixer.cache')
    ->setFinder($finder);

(new PhpCsFixerCodingStandard())->applyTo($config, [
    'global_namespace_import' => [
        'import_constants' => true,
        'import_functions' => true,
        'import_classes' => true,
    ],
    'php_unit_test_case_static_method_calls' => ['call_type' => 'self'],
    'blank_line_between_import_groups' => true,
]);

return $config;
