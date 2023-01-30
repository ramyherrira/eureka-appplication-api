<?php

declare(strict_types=1);

namespace Application\Tests\Domain\Artist\Entity;

use Application\Domain\Artist\Entity\Demographics;
use DateTime;
use PHPUnit\Framework\TestCase;

class DemographicsTest extends TestCase
{
    public function testItIsInstantiableWithRangeDatesAndCount(): void
    {
        $entity = new Demographics(
            '2016-08-12',
            '2016-08-16',
            6,
            3,
        );

        $this->assertEquals(
            '2016-08-12',
            $entity->getStartDate()->format('Y-m-d'),
        );
        $this->assertEquals(
            '2016-08-16',
            $entity->getEndDate()->format('Y-m-d')
        );
        $this->assertEquals(6, $entity->getFemaleCount());
        $this->assertEquals(3, $entity->getMaleCount());
    }

    /**
     * @return void
     */
    public function testItCalculatesTotalStreamCount(): void
    {
        $entity = new Demographics(
            '2016-08-12',
            '2016-08-12',
            10,
            5,
        );

        $this->assertEquals(15, $entity->getTotalStream());
    }

    public function testItReturnsFemaleStreamCountInPercent(): void
    {
        $entity = new Demographics(
            '2016-08-12',
            '2016-08-12',
            10,
            5,
        );

        $this->assertEquals(66, $entity->getFemalePercent());
    }

    public function testItReturnsMaleStreamCountInPercent(): void
    {
        $entity = new Demographics(
            '2016-08-12',
            '2016-08-12',
            65,
            35,
        );

        $this->assertEquals(35, $entity->getMalePercent());
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function testItCalculatesFemalePercentEventWhenZero(): void
    {
        $entity = new Demographics(
            '2016-08-12',
            '2016-08-12',
            0,
            0,
        );

        $this->assertEquals(0, $entity->getFemalePercent());
    }
}
