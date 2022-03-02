<?php

class Hero extends Character
{
    public function __construct(
        string $name,
        int    $minHealth,
        int    $maxHealth,
        int    $minStrength,
        int    $maxStrength,
        int    $minDefence,
        int    $maxDefence,
        int    $minSpeed,
        int    $maxSpeed,
        int    $minLuck,
        int    $maxLuck
    ) {
        parent::__construct(
            $name,
            $minHealth,
            $maxHealth,
            $minStrength,
            $maxStrength,
            $minDefence,
            $maxDefence,
            $minSpeed,
            $maxSpeed,
            $minLuck,
            $maxLuck
        );
        $stats = include "../config/skillStats.php";
        $this->skill = new Skills($stats['hero']);
    }
}
