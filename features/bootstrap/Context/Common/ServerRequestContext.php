<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Application\Behat\Context\Common;

use Behat\Behat\Context\Context;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ServerRequestInterface;
use Safe\Exceptions\JsonException;
use function Safe\json_encode;

/**
 * Trait RequestAwareTrait
 *
 * @author Romain Cottard
 */
class ServerRequestContext implements Context
{
    /** @var array $requestHeaders */
    private static array $requestHeaders = [];

    /** @var array $requestCookie */
    private static array $requestCookie = [];

    /** @var array $requestQueryParams */
    private static array $requestQueryParams = [];

    /** @var array $requestBodyFields */
    private static array $requestBodyFields = [];

    /**
     * @BeforeScenario
     *
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        $this->resetServerRequest();

        //~ Always required
        $this->iSetRequestHeaderNameWithValue('Accept', 'application/json');
        $this->iSetRequestHeaderNameWithValue('Content-Type', 'application/json');
    }

    /**
     * @return void
     */
    public function resetServerRequest(): void
    {
        self::$requestHeaders     = [];
        self::$requestCookie      = [];
        self::$requestQueryParams = [];
        self::$requestBodyFields  = [];
    }

    /**
     * @Given I set request header name :arg1 with value :arg2
     *
     * @param string $name
     * @param mixed $value
     */
    public function iSetRequestHeaderNameWithValue(string $name, mixed $value): void
    {
        self::$requestHeaders[$name] = $value;
    }

    /**
     * @Given I set request cookie name :arg1 with value :arg2
     *
     * @param string $name
     * @param mixed $value
     */
    public function iSetRequestCookieNameWithValue(string $name, mixed $value): void
    {
        self::$requestCookie[$name] = $value;
    }

    /**
     * @Given I set request query parameter field :arg1 with value :arg2
     *
     * @param string $field
     * @param mixed $value
     */
    public function iSetRequestQueryParameterFieldWithValue(string $field, mixed $value): void
    {
        self::$requestQueryParams[$field] = $value;
    }

    /**
     * @Given I set request query parameter field :arg1 with empty value
     *
     * @param string $field
     */
    public function iSetRequestQueryParameterFieldWithEmptyValue(string $field): void
    {
        self::iSetRequestQueryParameterFieldWithValue($field, '');
    }

    /**
     * @Given I omit to set request query parameter field :arg1
     *
     * @param string $field
     */
    public function iOmitToSetRequestQueryParameterField(string $field): void
    {
        if (isset(self::$requestQueryParams[$field])) {
            unset(self::$requestQueryParams[$field]);
        }
    }

    /**
     * @Given I set request body field :arg1 with value :arg2
     *
     * @param string $field
     * @param mixed $value
     */
    public function iSetRequestBodyFieldWithValue(string $field, mixed $value): void
    {
        self::$requestBodyFields[$field] = $value;
    }

    /**
     * @Given I set request body field :arg1 with empty value
     *
     * @param string $field
     */
    public function iSetRequestBodyFieldWithEmptyValue(string $field): void
    {
        $this->iSetRequestBodyFieldWithValue($field, '');
    }

    /**
     * @Given I omit to set request body field :arg1
     *
     * @param string $field
     */
    public function iOmitToSetRequestBodyField(string $field): void
    {
        if (isset(self::$requestBodyFields[$field])) {
            unset(self::$requestBodyFields[$field]);
        }
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $serverParams
     * @return ServerRequestInterface
     * @throws JsonException
     */
    public static function createServerRequest(
        string $method,
        string $path,
        array $serverParams = []
    ): ServerRequestInterface {
        $factory = new Psr17Factory();

        //~ Build uri string with query parameters
        $uriPath = $path . (!empty(static::$requestQueryParams) ? '?' . http_build_query(self::$requestQueryParams) : '');

        $uri           = $factory->createUri($uriPath);
        $serverRequest = $factory->createServerRequest($method, $uri, $serverParams);

        //~ Add query params
        if (!empty(static::$requestQueryParams)) {
            $serverRequest = $serverRequest->withQueryParams(static::$requestQueryParams);
        }

        //~ Add body content
        if (!empty(static::$requestBodyFields)) {
            $body          = $factory->createStream(json_encode(self::$requestBodyFields));
            $serverRequest = $serverRequest->withBody($body)->withParsedBody(self::$requestBodyFields);
        }

        //~ Add headers
        foreach (static::$requestHeaders as $name => $header) {
            $serverRequest = $serverRequest->withAddedHeader($name, $header);
        }

        //~ Add Cookie
        if (!empty(static::$requestCookie)) {
            $serverRequest = $serverRequest->withCookieParams(static::$requestCookie);
        }

        return $serverRequest;
    }
}
