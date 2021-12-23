<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;

function gcd()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Find the greatest common divisor of given numbers.");
    $divisorComp = 0;
    for ($i = 0; $i < 3; $i++) {
        $firstNumber = rand(1, 50);
        $secondNumber = rand(1, 50);
        $minNumber = min($firstNumber, $secondNumber);
        for ($j = $minNumber; $j > 0; $j--) {
            $firstValue = $firstNumber % $j;
            $secondValue = $secondNumber % $j;
            if ($firstValue === 0 && $secondValue === 0) {
                $divisorComp = $j;
                break;
            }
        }
        $question = "Question: $firstNumber $secondNumber";
        line($question);
        $divisorUser = (int)prompt('Your answer');
        if ($divisorComp === $divisorUser && $i < 2) {
            line("Correct!");
            continue;
        } elseif ($divisorComp === $divisorUser && $i === 2) {
            line("Congratulations, %s!", $name);
        } else {
            line("'{$divisorUser}' is wrong answer ;(. Correct answer was '{$divisorComp}'.)");
            line("Let's try again, %s!", $name);
            break;
        }
    }
}
