<?php

namespace Etki\Api\Common\Client\Level;


/**
 *
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Level
 * @author  Etki <etki@etki.name>
 */
interface ConverterInterface
{
    public function encode(RequestInterface $request);
    public function decode(ResponseInterface $response);
}
