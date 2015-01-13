<?php

namespace Etki\Api\Common\Client\Exception;

use RuntimeException as SplRuntimeException;

/**
 * Base runtime exception.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Exception
 * @author  Etki <etki@etki.name>
 */
class RuntimeException extends SplRuntimeException implements
    ApiClientCommonExceptionInterface
{
}
