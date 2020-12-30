<?php

namespace App\Http\Controllers\Task1;
class Ledder {

    private int $steps;

    /**
     * Ledder constructor.
     * @param int $steps
     */
    public function __construct(int $steps)
    {
        $this->steps = $steps;
    }

    /**
     * @return int
     */
    public function getSteps(): int
    {
        return $this->steps;
    }

    /**
     * @param int $steps
     */
    public function setSteps(int $steps): void
    {
        $this->steps = $steps;
    }
}
