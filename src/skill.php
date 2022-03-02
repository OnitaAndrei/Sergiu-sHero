<?php
class Skills
{
    public array $skillStats;

    public function __construct(array $skillStats)
    {
        $this->skillStats = $skillStats;
    }

    /**
     * @param Character $attacker
     * @param Character $defender
     * @param int $numberOfStrikes
     * @return int (dealt damage)
     * calculate damage
     * run magic shield to check if the damage was reduced
     * deal damage as many times as numberOfStrikes
     */
    private function attack(Character $attacker, Character $defender, int $numberOfStrikes): int
    {
        $damage = $attacker->getStrength() - $defender->getDefence();
        $damage = $this->magicShield($defender, $damage);
        $strikes = $numberOfStrikes;
        while ($strikes > 0) {
            $defender->setHealth($defender->getHealth() - $damage);
            $strikes--;
        }
        return $damage * $numberOfStrikes;
    }

    public function basicAttack(Character $attacker, Character $defender): int
    {
        return $this->attack($attacker, $defender, 1);
    }

    public function rapidStrike(Character $attacker, Character $defender, int $numberOfStrikes): int
    {
        return $this->attack($attacker, $defender, $numberOfStrikes);
    }

    /**
     * @param Character $defender
     * @param int $damage
     * @return int
     * check if any defensive skill is used and apply damage reduction
     */
    public function magicShield(Character $defender, int $damage): int
    {
        foreach ($defender->skill->skillStats['defence'] as $skill) {
            $rnd = rand(0, 100);
            if ($rnd < $skill['chance']) {
                $damage = $damage - $damage * ($skill['reducedDamage'] / 100);
                echo "<h2 style='color: #0a53be'>" . $defender->name . " used: " . $skill['name'] . "</h2>";
                return round($damage);
            }
        }
        return $damage;
    }
}
