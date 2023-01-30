<?php

namespace Application\Service;

use Application\Domain\Artist\Entity\Demographics;
use Application\Domain\Artist\Repository\StreamDemographyRepository;
use DateTimeInterface;
use DateTime;
use DateInterval;

class DemographicsService
{
    /**
     * @param StreamDemographyRepository $repository
     */
    public function __construct(protected StreamDemographyRepository $repository) {}

    /**
     * @param int $artistID
     * @param DateTimeInterface|null $startDate
     * @param DateTimeInterface|null $endDate
     * @return Demographics
     */
    public function getDemographicsByArtist(
        int                $artistID,
        ?DateTimeInterface $startDate = null,
        ?DateTimeInterface $endDate = null
    ): Demographics
    {
        if (is_null($startDate) || is_null($endDate)) {
            $interval = DateInterval::createFromDateString('3 days');
            $startDate = (new DateTime())->sub($interval);
            $endDate = (new DateTime());
        }

        if ($startDate > $endDate) {
            throw new \InvalidArgumentException('Start date should be before the end date.');
        }

        return $this->repository->getByArtist(
            $artistID,
            $startDate->format('Y-m-d'),
            $endDate->format('Y-m-d')
        );
    }
}
