<?php

namespace Etki\Api\Common\Client\Transport;

/**
 * This interface specifies combined logger that mya log both HttpRequest and
 * HttpResponse.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport
 * @author  Etki <etki@etki.name>
 */
interface HttpLoggerInterface extends
    HttpRequestLoggerInterface,
    HttpResponseLoggerInterface
{
}
