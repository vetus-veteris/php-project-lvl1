<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;

function gcd()
{
    line("Find the greatest common divisor of given numbers.");
    $count = 0;
    $divisorComp = 0;
    for ($i = 0; $i < 3; $i++) {
        while ($count < 3) {
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
