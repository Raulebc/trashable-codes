<?php

class GuessStatistics
{
    private $number;
    private $verb;
    private $pluralModifier;

    public function make(string $candidate, $count)
    {
        $this->createPluralDependentMessageParts($count);

        return sprintf('There %s %s %s%s', $this->verb, $this->number, $candidate, $this->pluralModifier);
    }

    public function createPluralDependentMessageParts($count)
    {
        if ($count === 0) {
            $this->thereAreNoLetters();
        } elseif ($count === 1) {
            $this->thereIsOneLetter();
        } else {
            $this->thereAreManyLetters($count);
        }
    }

    public function thereAreNoLetters()
    {
        $this->number = 'no';
        $this->verb = 'are';
        $this->pluralModifier = 's';
    }

    public function thereIsOneLetter()
    {
        $this->number = '1';
        $this->verb = 'are';
        $this->pluralModifier = '';
    }

    public function thereAreManyLetters($count)
    {
        $this->number = $count;
        $this->verb = 'are';
        $this->pluralModifier = 's';
    }
}

$mesage = new GuessStatistics();
echo $mesage->make('human', 1);

class Printer
{
    public function printGuessStatistics($candidate = null, $count)
    {
        // $number = '';
        $verb = 'are';
        $count = '2';
        // $pluralModifier = '';

        // if ($count == 0) {
        //     // code...
        // } elseif ($count == 1) {
        //     // code...
        // } else {
        //     $number = '';
        // }

        return sprintf('There %s %s', $verb, $count);
    }
}

$printable = new Printer();

echo $printable->printGuessStatistics('', 1);
