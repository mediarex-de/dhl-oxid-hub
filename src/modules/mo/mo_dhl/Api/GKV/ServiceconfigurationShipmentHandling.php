<?php

namespace Mediaopt\DHL\Api\GKV;

class ServiceconfigurationShipmentHandling
{

    /**
     * @var bool $active
     */
    protected $active = null;

    /**
     * @var string $type
     */
    protected $type = null;

    /**
     * @param bool   $active
     * @param string $type
     */
    public function __construct($active, $type)
    {
        $this->active = $active;
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return ServiceconfigurationShipmentHandling
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return ServiceconfigurationShipmentHandling
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

}