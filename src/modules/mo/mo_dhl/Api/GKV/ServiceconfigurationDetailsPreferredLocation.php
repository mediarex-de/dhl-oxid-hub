<?php

namespace Mediaopt\DHL\Api\GKV;

class ServiceconfigurationDetailsPreferredLocation
{

    /**
     * @var bool $active
     */
    protected $active = null;

    /**
     * @var string $details
     */
    protected $details = null;

    /**
     * @param bool $active
     * @param string $details
     */
    public function __construct($active, $details)
    {
        $this->active = $active;
        $this->details = $details;
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
     * @return ServiceconfigurationDetailsPreferredLocation
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param string $details
     * @return ServiceconfigurationDetailsPreferredLocation
     */
    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

}
