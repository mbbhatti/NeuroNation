<?php

namespace App\Repositories;

interface ScoreRepositoryInterface
{
    /**
     * Get's user history.
     *
     * @return object
     */
    public function getHistory(int $id): object;
}