<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;

line('Welcome to the Brain Game!');
$name = prompt('May I have your name', false, '? ');
line("Hello, %s!", $name);
line('What is the result of the expression?');
$count = 0;
for ($i = 0; $i < 3; $i++) {
    while ($count < 3) {
        $firstNumber = rand(1, 50);
        $secondNumber = rand(1, 50);
        $operations = rand(1, 3);
        switch ($operations) {
            case 1:
                $question = "$firstNumber + $secondNumber";
                $answer = $firstNumber + $secondNumber;
                break;
            case 2:
                $question = "$firstNumber - $secondNumber";
                $answer = $firstNumber - $secondNumber;
                break;
            case 3:
                $question = "$firstNumber * $secondNumber";
                $answer = $firstNumber * $secondNumber;
                break;
        }
        line($question);
        $userAnswer = (int)prompt('Your answer');
        if ($answer === $userAnswer && $count < 2) {
            line("Correct!");
            $count++;
            continue;
        } elseif ($answer === $userAnswer && $count === 2) {
            line("Congratulations, %s!", $name);
            $flag = true;
            $count = 10;
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.)");
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
