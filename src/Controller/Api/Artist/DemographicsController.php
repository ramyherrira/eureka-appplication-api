<?php

declare(strict_types=1);

namespace Application\Controller\Api\Artist;

use Application\Controller\Common\AbstractApiController;
use Application\Service\DemographicsService;
use DateTime;
use DateTimeInterface;
use Eureka\Kernel\Http\Exception\HttpBadRequestException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DemographicsController extends AbstractApiController
{

    public function __construct(protected DemographicsService $demographicsService)
    {
    }

    /**
     * Provide demographics for a particular artist over 3 days.
     *
     * @return ResponseInterface
     * @throws HttpBadRequestException
     */
    public function artistDemographics(ServerRequestInterface $request): ResponseInterface
    {
        $this->log("Request artist's demographics", $request);

        $artistID = $this->getPathParam($request);
        $startDate = $this->parseDateTime($request, 'start_date');
        $endDate = $this->parseDateTime($request, 'end_date');

        $demographics = $this->demographicsService
            ->getDemographicsByArtist($artistID, $startDate, $endDate);

        return $this->getResponseJsonSuccess([
            'totalStreams' => $demographics->getTotalStream(),
            'femalePercent' => $demographics->getFemalePercent(),
            'malePercent' => $demographics->getMalePercent(),
        ]);
    }

    /**
     * @param ServerRequestInterface $request
     * @return int
     * @throws HttpBadRequestException
     */
    protected function getPathParam(ServerRequestInterface $request): int
    {
        $matches = [];
        if (!preg_match('/(\d+)/', $request->getUri()->getPath(), $matches)) {
            throw new HttpBadRequestException('No valid ID provided.');
        }

        return (int) $matches[0];
    }

    /**
     * @return DemographicsService
     */
    public function getDemographicsService(): DemographicsService
    {
        return $this->demographicsService;
    }
}
