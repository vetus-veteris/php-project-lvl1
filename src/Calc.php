<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;

function calc()
{
    $question = "Enter your name";
    $userAnswer = "Enter your answer";
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What is the result of the expression?');
    for ($i = 0; $i < 3; $i++) {
        $firstNumber = rand(1, 50);
        $secondNumber = rand(1, 50);
        $operations = rand(1, 3);
        switch ($operations) {
            case 1:
                $question = "Question: $firstNumber + $secondNumber";
                $answer = $firstNumber + $secondNumber;
                break;
            case 2:
                $question = "Question: $firstNumber - $secondNumber";
                $answer = $firstNumber - $secondNumber;
                break;
            case 3:
                $question = "Question: $firstNumber * $secondNumber";
                $answer = $firstNumber * $secondNumber;
                break;
        }
        line($question);
        $userAnswer = (int)prompt('Your answer');
        if ($answer === $userAnswer && $i < 2) {
            line("Correct!");
            continue;
        } elseif ($answer === $userAnswer && $i === 2) {
            line("Correct!");
            line("Congratulations, %s!", $name);
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.)");
            line("Let's try again, %s!", $name);
            break;
        }
    }
}
