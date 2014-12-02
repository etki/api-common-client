<?php

namespace Etki\Api\Common\Client\Api\Log;

/**
 * Common API logger interface.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Api\Log
 * @author  Etki <etki@etki.name>
 */
interface ApiLoggerInterface extends
    ApiRequestLoggerInterface,
    ApiResponseLoggerInterface
{
}
