<?php


namespace App\System;


interface ClockInterface
{
    function getNow() : \DateTimeInterface;
}