<?php

declare(strict_types=1);

namespace Application\Tests\Service;

use Application\Domain\Artist\Repository\StreamDemographyRepository;
use Application\Service\DemographicsService;
use PHPUnit\Framework\TestCase;

class DemographicsServiceTest extends TestCase
{
    public function testItDefaultsToThreeDaysIfNoDateWereProvided(): void
    {
        $repository = $this->createMock(StreamDemographyRepository::class);
        $service = new DemographicsService($repository);
        $interval = \DateInterval::createFromDateString('3 days');

        $repository->expects($this->once())
            ->method('getByArtist')
            ->with(
                1,
                (new \DateTime())->sub($interval)->format('Y-m-d'),
                (new \DateTime())->format('Y-m-d')
            );

        $service->getDemographicsByArtist(1, null, null);
    }

    public function testItFailsWhenStartDateIsMoreRecentThanEndDate(): void
    {
        $repository = $this->createMock(StreamDemographyRepository::class);
        $service = new DemographicsService($repository);

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Start date should be before the end date.');
        $service->getDemographicsByArtist(
            1,
            new \DateTime( '2012-12-25'),
            new \DateTime( '2012-12-12'),
        );
    }
}
