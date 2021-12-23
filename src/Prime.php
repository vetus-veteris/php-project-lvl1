<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;

function prime()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");
    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 100);
        $flag = true;
        for ($j = $number - 1; $j > 1; $j--) {
            if ($number % $j === 0) {
                $flag = false;
                break;
            }
        }
        if ($flag) {
            $divisorComp = "yes";
        } else {
            $divisorComp = "no";
        }
        $question = "Question: $number";
        line($question);
        $divisorUser = (string) prompt('Your answer');
        if ($divisorComp === $divisorUser && $i < 2) {
            line("Correct!");
            continue;
        } elseif ($divisorComp === $divisorUser && $i === 2) {
            line("Correct!");
            line("Congratulations, %s!", $name);
        } else {
            line("\"%s\" is wrong answer ;(. Correct answer was \"%s\".", $divisorUser, $divisorComp);
            line("Let's try again, %s!", $name);
            break;
        }
    }
}
