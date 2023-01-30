<?php

declare(strict_types=1);

namespace Application\Domain\Artist\Repository;

use Application\Domain\Artist\Entity\Demographics;

interface StreamDemographyRepository
{

    /**
     * @param int $artistID
     * @param string $start
     * @param string $end
     * @return Demographics
     */
    public function getByArtist(
        int    $artistID,
        string $start,
        string $end
    ): Demographics;
}