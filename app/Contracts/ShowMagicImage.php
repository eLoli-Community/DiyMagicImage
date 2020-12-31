<?php


namespace App\Contracts;


interface ShowMagicImage
{
    public function make($script,$input);
    public function getOutputString();
}
