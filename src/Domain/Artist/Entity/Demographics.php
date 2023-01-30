<?php

namespace Application\Domain\Artist\Entity;

use DateTimeInterface;
use DateTime;

class Demographics
{
    /** @var DateTimeInterface */
    protected DateTimeInterface $startDate;

    /** @var DateTimeInterface */
    protected DateTimeInterface $endDate;

    /** @var int */
    protected int $femaleCount;

    /** @var int */
    protected int $maleCount;

    /**
     * @param string $startDate
     * @param string $endDate
     * @param int $femaleCount
     * @param int $maleCount
     * @throws \Exception
     */
    public function __construct(
        string $startDate,
        string $endDate,
        int $femaleCount,
        int $maleCount
    ) {
        $this->startDate = new DateTime($startDate);
        $this->endDate = new DateTime($endDate);
        $this->femaleCount = $femaleCount;
        $this->maleCount = $maleCount;
    }

    /**
     * @return DateTimeInterface
     */
    public function getStartDate(): DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @return DateTimeInterface
     */
    public function getEndDate(): DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * @return int
     */
    public function getFemaleCount(): int
    {
        return $this->femaleCount;
    }

    /**
     * @return int
     */
    public function getMaleCount(): int
    {
        return $this->maleCount;
    }

    /**
     * @return int
     */
    public function getTotalStream(): int
    {
        return $this->getFemaleCount() + $this->getMaleCount();
    }

    /**
     * @return int
     */
    public function getFemalePercent(): int
    {
        return $this->calculatePercent($this->getFemaleCount());
    }

    /**
     * @return int
     */
    public function getMalePercent(): int
    {
        return $this->calculatePercent($this->getMaleCount());
    }

    /**
     * @param int $count
     * @return int
     */
    protected function calculatePercent(int $count): int
    {
        if ($this->getTotalStream() === 0) {
            return 0;
        }

        return $count / $this->getTotalStream() * 100;
    }
}
