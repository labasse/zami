<?php


namespace App\System;


class SystemClock implements ClockInterface
{
    function getNow(): \DateTimeInterface
    {
        return new \DateTime();
    }
}