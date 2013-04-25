<?php
namespace My;

use My\Profile\Builder;
use My\Script\Builder as SBuilder;

$builder = new Builder();
echo get_class($builder), "\n";

echo \My\Profile\PROFILE_PATH, "\n";
echo \My\Profile\getProfilePath('test'), "\n";

$builder = new Script\Builder();
echo get_class($builder), "\n";

$builder = new SBuilder();
echo get_class($builder), "\n";

$builder = new \Bob\Profile\Builder();
echo get_class($builder), "\n";

try {
    throw new \Exception('Exception testing.');
} catch (\Exception $e) {
    echo "{$e->getMessage()}\n";
}
