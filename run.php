#!/usr/bin/env php8.0
<?php
/**
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license proprietary
 * @version 17.08.21 20:43:32
 */

declare(strict_types = 1);

use dicr\StringHelper;

require_once __DIR__ . '/vendor/autoload.php';

/** @var string[] $strs исходные строки */
$strs = [
    'Привет! Давно не виделись.',
    'When I wrote this code, only God and I understood what I did. Now only God knows',
    'У каждого языка  есть время жизни. За исключением \'Кобола\', конечно'
];

foreach ($strs as $str) {
    echo 'IN => ' . $str . "\n";
    echo 'OU => ' . StringHelper::reverseWords($str) . "\n\n";
}

echo "Done.\n";
