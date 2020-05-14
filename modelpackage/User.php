<?php

declare(strict_types=1);

class User {

    protected $id;
    protected $name;
    protected $level;
    protected $points;

    public function __construct(int $id, string $name, int $level = 1, int $points = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
        $this->points = $points;
    }

    public function id(): int {
        return $this->id;
    }

    public function name(): string {
        return $this->name;
    }

    public function level(): int {
        return $this->level;
    }

    public function points(): int {
        return $this->points;
    }

    public function upLevel(int $increment): int {
        $this->level += $increment;
        return $this->level;
    }

    public function downLevel(int $decrement): int {
        $this->level -= $decrement;
        if ($this->level < 1) {
            $this->level = 1;
        }
        return $this->level;
    }

    public function upPoints(int $increment): int {
        $this->points += $increment;
        return $this->points;
    }

    public function downPoints(int $decrement): int {
        $this->points -= $decrement;
        if ($this->points < 0) {
            $this->points = 0;
        }
        return $this->points;
    }

}
