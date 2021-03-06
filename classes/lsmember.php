<?php

/**
 * Class LSMember
 */
class LSMember
{
    /**
     * @var
     */
    private $_fname;
    /**
     * @var
     */
    private $_lname;
    /**
     * @var
     */
    private $_email;
    /**
     * @var
     */
    private $_state;

    /**
     * LSMember constructor.
     * @param $fname
     * @param $lname
     * @param $email
     * @param $state
     */
    function __construct($fname, $lname, $email, $state)
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_email = $email;
        $this->_state = $state;
    }

    /**
     * @return mixed
     */
    function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param mixed $fname
     */
    function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return mixed
     */
    function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param mixed $lname
     */
    function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @return mixed
     */
    function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    function getState()
    {
        return $this->_state;
    }

    /**
     * @param mixed $state
     */
    function setState($state)
    {
        $this->_state = $state;
    }
}