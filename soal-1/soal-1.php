<?php
$size = 7;

for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
        if (
            $i == 0 || $i == $size - 1 ||       // baris pertama/terakhir
            $j == 0 || $j == $size - 1 ||       // kolom pertama/terakhir
            $i == $j ||                         // diagonal utama
            $i + $j == $size - 1                // diagonal sekunder
        ) {
            echo "X ";
        } else {
            echo "O ";
        }
    }
    echo PHP_EOL;
}
