<?php
/**
* User: momomo
* Date: 17/01/2018
*/

class Digit {
    private $digitalDisplay;
    private $digitalNumber;

    /**
     * Digit constructor.
     */
    public function __construct($digitalDisplay = null) {
        if($digitalDisplay === null) {
            $this->digitalDisplay = array();
        } else {
            $this->setDigitalDisplay($digitalDisplay);
        }
        $this->digitalNumber = array();
    }

    /**
     * @return mixed
     */
    public function getDigitalNumber()
    {
        return $this->digitalNumber;
    }

    /**
     * @param mixed $digitalNumber
     */
    public function setDigitalNumber($digitalNumber)
    {
        $this->digitalNumber = $digitalNumber;
    }

    /**
     * @return array
     */
    public function getDigitalDisplay()
    {
        return $this->digitalDisplay;
    }

    /**
     * @param array $digitalDisplay
     */
    public function setDigitalDisplay($digitalDisplay)
    {
        $this->digitalDisplay = $digitalDisplay;
    }
}