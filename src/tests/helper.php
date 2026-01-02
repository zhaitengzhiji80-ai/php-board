<?php
function assertTrue($condition, string $message): void
{
    if ($condition == FALSE) {
        echo "FAILED: {$message}\n";
        exit(1);
    }
}

function assertFalse($condition, string $message): void
{
    if ($condition == TRUE) {
        echo "FAILED: {$message}\n";
        exit(1);
    }
}

function assertSame($expected, $actual, string $message): void
{
    if ($expected !== $actual) {
        echo "FAILED: {$message}\n";
        var_dump($expected, $actual);
        exit(1);
    }
}
