<?php

declare(strict_types=1);

namespace Application\Tests\Controller\Artist;

use Application\Controller\Api\Artist\DemographicsController;
use Application\Domain\Artist\Entity\Demographics;
use Application\Service\DemographicsService;
use Application\Tests\Helper\ControllerHelperTrait;
use Eureka\Kernel\Http\Exception\HttpBadRequestException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Log\AbstractLogger;
use Psr\Log\NullLogger;

class DemographicsControllerTest extends TestCase
{
    use ControllerHelperTrait;

    /**
     * @return void
     */
    public function testEndpointRetrievesArtistId(): void
    {
        $request = $this->getServerRequest('/artist/44545/demographics');
        $controller = $this->getController();

        /** @var MockObject $service */
        $service = $controller->getDemographicsService();
        $service->expects($this->once())
            ->method('getDemographicsByArtist')
            ->with($this->equalTo(44545));

        $controller->artistDemographics($request);
    }

    /**
     * @return void
     */
    public function testEndpointRetrievesInvalidArtistId(): void
    {
        $request = $this->getServerRequest('/artist/dddd/demographics');
        $controller = $this->getController();

        $this->expectException(HttpBadRequestException::class);
        $this->expectExceptionMessage('No valid ID provided.');
        $controller->artistDemographics($request);
    }

    /**
     * @return void
     */
    public function testEndpointReturnsDataWhenItsCalled(): void
    {
        $request = $this->getServerRequest('/artist/4/demographics');
        $demographic = new Demographics('2015-05-12', '2016-02-12', 80, 100);
        $controller = $this->getController();
        /** @var MockObject $service */
        $service = $controller->getDemographicsService();
        $service->method('getDemographicsByArtist')
            ->willReturn($demographic);

        $response = $controller->artistDemographics($request);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonEquals($response, [
            'totalStreams' => 180,
            'femalePercent' => 44,
            'malePercent' => 55,
        ]);
    }

    /**
     * @return void
     */
    public function testEndpointValidatesDateRangeValues(): void
    {
        $request = $this->getServerRequest('/artist/4/demographics', 'GET', [
            'start_date' => '454-45-544',
            'end_date' => 34355,
        ]);
        $controller = $this->getController();


        $this->expectException(HttpBadRequestException::class);
        $this->expectExceptionMessage('Invalid data: date values are invalid.');
        $controller->artistDemographics($request);
    }

    /**
     * @return void
     */
    public function testEndpointLogsItsActivity(): void
    {
        $logger = $this->createMock(AbstractLogger::class);
        $request = $this->getServerRequest('/artist/4/demographics');
        $controller = $this->getController();
        $controller->setLogger($logger);
        $logger->expects($this->once())
            ->method('info');

        $controller->artistDemographics($request);

    }

    /**
     * @return DemographicsService|MockObject
     */
    public function createServiceMock(): MockObject|DemographicsService
    {
        /** @var  DemographicsService|MockObject $service */
        $service = $this->createMock(DemographicsService::class);

        return $service;
    }

    /**
     * @return DemographicsController
     */
    public function getController(): DemographicsController
    {
        $service = $this->createServiceMock();
        /** @var DemographicsController $controller */
        $controller = $this->addFactoriesToController(new DemographicsController($service));
        $controller->setLogger(new NullLogger());

        return $controller;
    }
}
