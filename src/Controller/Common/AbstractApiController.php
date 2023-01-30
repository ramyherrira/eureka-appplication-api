<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Application\Controller\Common;

use Application\Controller\Api\Artist\DemographicsController;
use DateTime;
use DateTimeInterface;
use Eureka\Kernel\Http\Controller\Controller;
use Eureka\Kernel\Http\Exception\HttpBadRequestException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class HomeController
 *
 * @author Romain Cottard
 */
abstract class AbstractApiController extends Controller
{
    /**
     * @param mixed $data
     * @param array<mixed>|null $meta
     * @param array<mixed>|null $errors
     * @return ResponseInterface
     */
    protected function getResponseJsonSuccess(
        mixed $data,
        ?array $meta = null,
        ?array $errors = null
    ): ResponseInterface {
        $content = [
            'data' => $data
        ];

        if (!empty($meta)) {
            $content['meta'] = $meta;
        }

        if (!empty($errors)) {
            $content['errors'] = $errors;
        }

        return $this->getResponseJson($content);
    }

    /**
     * @param int $httpCode
     * @param array<mixed> $errors
     * @param array<mixed>|null $meta
     * @param mixed $data
     * @return ResponseInterface
     */
    protected function getResponseJsonError(
        int $httpCode,
        array $errors,
        ?array $meta = null,
        mixed $data = null
    ): ResponseInterface {
        $content = [
            'data'   => null,
            'errors' => $errors
        ];

        if (!empty($meta)) {
            $content['meta'] = $meta;
        }

        //~ Can add "payload" data to the error response
        if (!empty($data)) {
            $content['data'] = $data;
        }

        return $this->getResponseJson($content, $httpCode);
    }

    /**
     * @param int $code
     * @param \Exception $exception
     * @return array{status: string, title: string, code: string, detail: string, trace?: string}
     * @codeCoverageIgnore
     */
    protected function getErrorItem(int $code, \Exception $exception): array
    {
        //~ Ajax response error - JsonApi.org error object format + trace
        $error = [
            'status' => (string) $code,
            'title'  => self::HTTP_CODE_MESSAGES[$code] ?? 'Unknown',
            'code'   => !empty($exception->getCode()) ? (string) $exception->getCode() : '99',
            'detail' => !empty($exception->getMessage()) ? $exception->getMessage() : 'Undefined message',
        ];

        if ($this->isDebug()) {
            $error['trace'] = $exception->getTraceAsString();
        }

        return $error;
    }

    /**
     * @param string $message
     * @param ServerRequestInterface $request
     * @return void
     */
    protected function log(string $message, ServerRequestInterface $request): void
    {
        $this->getLogger()->info($message, [
            'uri' => $request->getUri()->getPath(),
            'query' => $request->getQueryParams(),
            'body' => $request->getBody(),
        ]);
    }

    /**
     * @param ServerRequestInterface $request
     * @param string $param
     * @return DateTimeInterface|null
     * @throws HttpBadRequestException
     */
    protected function parseDateTime(ServerRequestInterface $request, string $param): ?DateTimeInterface
    {
        $date = $request->getQueryParams()[$param] ?? null;

        if (!$date) {
            return null;
        }

        if (!$dateTime = DateTime::createFromFormat('Y-m-d', $date)) {
            throw new HttpBadRequestException('Invalid data: date values are invalid.');
        }

        return $dateTime;
    }
}
