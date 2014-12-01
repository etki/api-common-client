<?php

namespace Etki\Api\Common\Client\Transport;

/**
 * An interface for HTTP request implementation.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport
 * @author  Etki <etki@etki.name>
 */
interface HttpRequestInterface
{
    const HTTP_METHOD_GET = 'GET';
    const HTTP_METHOD_POST = 'POST';
    const HTTP_METHOD_PUT = 'PUT';
    const HTTP_METHOD_DELETE = 'DELETE';
    const HTTP_METHOD_PATCH = 'PATCH';
    const HTTP_METHOD_HEAD = 'HEAD';
    const HTTP_METHOD_OPTIONS = 'OPTIONS';
    const HTTP_METHOD_TRACE = 'TRACE';
    const HTTP_METHOD_CONNECT = 'CONNECT';
    const HTTP_VERSION_1_0 = 'HTTP/1.0';
    const HTTP_VERSION_1_1 = 'HTTP/1.1';
    const HTTP_VERSION_2_0 = 'HTTP/2.0';
    public function getUrl();
    public function getHttpMethod();
    public function getHttpHeaders();
    public function getQueryParameters();
    public function getBody();

    /**
     * Sets URL request should go to. URL should contain host as well.
     *
     * @param string $url URL that will be requested.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setUrl($url);

    /**
     * Sets HTTP method for current request.
     *
     * @param string $method ONe of HTTP_METHOD_*` constants
     *
     * @return $this
     * @since 0.1.0
     */
    public function setHttpMethod($method);

    /**
     * Sets HTTP header, overwrites previously set value (if any). Use list of
     * strings to set multiple values.
     *
     * @param string          $header Header name.
     * @param string|string[] $value  Header value.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setHttpHeader($header, $value);

    /**
     * Sets HTTP headers in batch. Any previously existing headers will be
     * overwritten.
     *
     * @param string[]|array $headers Headers in [header => [values]] form.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setHttpHeaders(array $headers);

    /**
     * Sets query parameter. Overwrites current value (if any).
     *
     * @param string          $parameter Parameter name.
     * @param string|string[] $value     Value as string. Array of strings may
     *                                   be used to force query parameter to
     *                                   appear several times in query string.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setQueryParameter($parameter, $value);

    /**
     * Sets request body.
     *
     * @param string $body Request body.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setBody($body);
}
