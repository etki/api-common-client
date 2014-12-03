<?php

namespace Etki\Api\Common\Client\Entity;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;

/**
 * This class represents variable-parameters entity
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Entity
 * @author  Etki <etki@etki.name>
 */
abstract class DataContainer extends AbstractEntity
{
    /**
     * List of parameter names.
     *
     * @type string[]
     * @since 0.1.0
     */
    protected $parameters = array();
    /**
     * The real container.
     *
     * @type array
     * @since 0.1.0
     */
    protected $data = array();

    /**
     * Sets data item.
     *
     * @param string $key   Item key.
     * @param mixed  $value Item value.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setDataItem($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    /**
     * Retrieves data item.
     *
     * @param string $key Item key.
     *
     * @return mixed
     * @since 0.1.0
     */
    public function getDataItem($key)
    {
        return $this->data[$key];
    }
}
