<?php
abstract class Character
{
    public string $name;
    public int $health;
    public int $strength;
    public int $defence;
    public int $speed;
    public int $luck;
    public Skills $skill;

    public function __construct(
        string $name,
        int $minHealth,
        int $maxHealth,
        int $minStrength,
        int $maxStrength,
        int $minDefence,
        int $maxDefence,
        int $minSpeed,
        int $maxSpeed,
        int $minLuck,
        int $maxLuck
    ) {
        $this->name = $name;
        $this->health = rand($minHealth, $maxHealth);
        $this->strength = rand($minStrength, $maxStrength);
        $this->defence = rand($minDefence, $maxDefence);
        $this->speed = rand($minSpeed, $maxSpeed);
        $this->luck = rand($minLuck, $maxLuck);
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getDefence(): int
    {
        return $this->defence;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function getLuck(): int
    {
        return $this->luck;
    }

    public function setHealth($input): void
    {
        $this->health = $input;
    }

    public function setStrength($input): void
    {
        $this->strength = $input;
    }

    public function setDefence($input): void
    {
        $this->defence = $input;
    }

    public function setSpeed($input): void
    {
        $this->speed = $input;
    }

    public function setLuck($input): void
    {
        $this->luck = $input;
    }
//this is attacking defender if the defender isn't lucky
//this uses rapidStrike() if got the chance else basicAttack()
//displays the ability (if any was used), damage dealt and if the defender got lucky
    public function attack($defender): void
    {
        $damage = 0;
        $luck = rand(0, 100);
        if ($luck > $defender->getLuck()) {
            foreach ($this->skill->skillStats['attack'] as $skill) {
                $rnd = rand(0, 100);
                if ($rnd < $skill['chance']) {
                    echo "<h2 style='color: darkred'>" . $this->name . " used: " . $skill['name'] . "</h2>";
                    $damage = $this->skill->rapidStrike($this, $defender, $skill['numberOfStrikes']);
                    echo "<h2 style='color: red'>$defender->name took $damage damage</h2>";
                    return;
                }
            }
            $damage = $this->skill->basicAttack($this, $defender);
            echo "<h2 style='color: red'>$defender->name took $damage damage</h2>";
        } else {
            echo "<h2 style='color: gray'>$defender->name dodged</h2>";
        }
    }
}
