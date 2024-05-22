<?php

require_once __DIR__ . '/Activity.php';
require_once __DIR__ . '/ActivityFetcher.php';
require_once __DIR__ . '/OutputMethod.php';
require_once __DIR__ . '/FileOutput.php';
require_once __DIR__ . '/ConsoleOutput.php';

if ($argc < 4) {
    echo "Usage: php main.php <participants> <type> <sender>\n";
    exit(1);
}

$participants = (int)$argv[1];
$type = $argv[2];
$sender = $argv[3];

try {
    $fetcher = new ActivityFetcher($participants, $type);
    $activity = $fetcher->fetch();

    if ($sender === 'file') {
        $output = new FileOutput();
    } elseif ($sender === 'console') {
        $output = new ConsoleOutput();
    } else {
        throw new Exception("Unknown sender: $sender");
    }

    $output->output($activity);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
