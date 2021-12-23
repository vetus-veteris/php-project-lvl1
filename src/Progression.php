<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;

function progression()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("What number is missing in the progression?");
    for ($i = 0; $i < 3; $i++) {
        $firstElement = rand(1, 10);
        $hiddenElement = rand(0, 9);
        $difference = rand(1, 10);
        $progression = [];
        $progression[] = $firstElement;
        $nextElement = 0;
        if ($hiddenElement === 0) {
            $progression[0] = '..';
            $divisorComp = $firstElement;
            $nextElement = $firstElement;
        } else {
            $nextElement = $firstElement;
            $progression[0] = $nextElement;
        }
        for ($j = 1; $j < 10; $j++) {
            $nextElement = $nextElement + $difference;
            if ($j === $hiddenElement) {
                $progression[$j] = '..';
                $divisorComp = $nextElement;
            } else {
                $progression[$j] = $nextElement;
            }
        }
        $str = implode(" ", $progression);
        $question = "Question: $str";
        line($question);
        $divisorUser = (int)prompt('Your answer');
        if ($divisorComp === $divisorUser && $i < 2) {
            line("Correct!");
            continue;
        } elseif ($divisorComp === $divisorUser && $i === 2) {
            line("Correct!");
            line("Congratulations, %s!", $name);
        } else {
            line("'{$divisorUser}' is wrong answer ;(. Correct answer was '{$divisorComp}'.)");
            line("Let's try again, %s!", $name);
            break;
        }
    }
}
