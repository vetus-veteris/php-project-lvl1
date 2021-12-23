<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function even()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    $count = 0;
    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 20);
        if ($number % 2 === 0) {
            $divisorComp = "yes";
        } else {
            $divisorComp = "no";
        }
        $question = "Question: $number";
        line($question);
        $divisorUser = prompt('Your answer');
        if ($divisorUser === $divisorComp && $i < 2) {
                line("Correct!");
                continue;
        } elseif ($divisorComp === $divisorUser && $i === 2) {
            line("Correct!");
            line("Congratulations, %s!", $name);
        } else {
            line("'{$divisorUser}' is wrong answer ;(. Correct answer was '{$divisorComp}'.)");
            if ($i < 2) {
                line("Let's try again, %s!", $name);
                break;
            }
        }
    }
}

