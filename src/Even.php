<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

line('Welcome to the Brain Game!');
$name = prompt('May I have your name?');
line("Hello, %s!", $name);
line("Answer \"yes\" if the number is even, otherwise answer \"no\".");

for ($i = 0; $i < 3; $i++) {
    $number = rand(1, 20);
    line('Question: %d', $number);
    $firstAnswer = prompt('Your answer');
    if (($number % 2) == 0) {
        $solution = true;
    } else {
        $solution = false;
    }
    if ($solution === false) {
        if ($firstAnswer === "no") {
            line("Correct!");
        } else {
            line("'yes' is wrong answer ;(. Correct answer was 'no'.)");
            break;
        }
    } else {
        if ($firstAnswer === "yes") {
            line("Correct!");
        } else {
            line("'no' is wrong answer ;(. Correct answer was 'yes').");
            break;
        }
    }
    if ($i === 2) {
        line("Congratulations, Sam!");
    }
}
