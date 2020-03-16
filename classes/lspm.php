<?php

/**
 * This is the premium user class.
 * Class LSPM
 */
class LSPM extends Item {
    /**
     * This will hold the image path.
     * @var
     */
    private $_phone;

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

}