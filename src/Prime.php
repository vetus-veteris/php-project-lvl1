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
    $count = 0;
    for ($i = 0; $i < 3; $i++) {
        while ($count < 3) {
            $number = rand(1, 100);
            $flag = true;
            for ($i = $number - 1; $i > 1; $i--) {
                if ($number % $i === 0) {
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
            $divisorUser = prompt('Your answer');
            if ($divisorComp === $divisorUser && $count < 2) {
                line("Correct!");
                $count++;
                continue;
            } elseif ($divisorComp === $divisorUser && $count === 2) {
                line("Congratulations, %s!", $name);
                $flag = true;
                $count = 10;
            } else {
                line("'{$divisorUser}' is wrong answer ;(. Correct answer was '{$divisorComp}'.)");
                if ($i < 2) {
                    line("Let's try again, %s!", $name);
                }
                $flag = false;
                $count = 10;
            }
        }
        $count = 0;
        if ($flag) {
            break;
        }
    }
}
