<?php
$path = realpath(__DIR__ . '/../../../../');
echo $path, "\n";
$dirIterator = new RecursiveDirectoryIterator($path);
$riIterator = new RecursiveIteratorIterator($dirIterator);
$regexIterator = new RegexIterator($riIterator, '/(.*?)\.md/');

foreach ($regexIterator as $entry) {
    echo $entry->getFilename(), "\n";
}
