<?php
$a = 123;

$doc = <<<"HEREDOC"

\$a = $a;

HEREDOC;

echo $doc;

$doc = <<<'NOWDOC'

\$a = $a;

NOWDOC;

echo $doc;
