<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;

function progression()
{
    line("What number is missing in the progression?");
    $count = 0;

    for ($i = 0; $i < 3; $i++) {
        while ($count < 3) {
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

            if ($divisorComp === $divisorUser && $count < 2) {
                line("Correct!");
                $count++;
                $progression = [];
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