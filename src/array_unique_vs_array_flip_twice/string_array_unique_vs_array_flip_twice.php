<?php

declare(strict_types=1);

echo " string[] のケース\n\n";

$a = [];
for ($i = 0; $i < 400000; $i++) {
    $a[] = "{$i}";
}

$b = [];
for ($i = 0; $i < 100000; $i++) {
    $b[] = "{$i}";
}

$c = array_merge($a, $b);

// array_unique
$array_unique_start = hrtime(true);
$array_unique = array_unique($c);
$array_unique_end = hrtime(true);

$array_unique_time = number_format($array_unique_end - $array_unique_start);
echo "{$array_unique_time} ナノ秒 <= array_unique \n";

// array_flip2回
$start = hrtime(true);
$array_flip = array_unique($c);
$end = hrtime(true);
$array_flip_time = number_format($end - $start);
echo "{$array_flip_time} ナノ秒 <= array_flip 2回 \n\n";

if ($array_unique !== $array_flip) {
    echo 'array_unique !== array_flip';
    exit;
}

if ($array_unique_time > $array_flip_time) {
    echo "👉";
} else {
    echo "👈🏽";
}