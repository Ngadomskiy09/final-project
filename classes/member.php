<?php

/**
 * Class MemberLs
 */
class MemberLs
{
    /**
     * @var
     */
    private $_first;
    /**
     * @var
     */
    private $_last;
    /**
     * @var
     */
    private $_phone;
    /**
     * @var
     */
    private $_email;
    /**
     * @var
     */
    private $_username;
    /**
     * @var
     */
    private $_password;
    /**
     * @var
     */
    private $_premium;

    /**
     * MemberLs constructor.
     * @param $_first
     * @param $_last
     * @param $_phone
     * @param $_email
     * @param $_username
     * @param $_password
     * @param $_premium
     */
    public function __construct($_first, $_last, $_phone, $_email, $_username, $_password, $_premium)
    {
        $this->_first = $_first;
        $this->_last = $_last;
        $this->_phone = $_phone;
        $this->_email = $_email;
        $this->_username = $_username;
        $this->_password = $_password;
        $this->_premium = $_premium;
    }

    /**
     * @return mixed
     */
    public function getFirst()
    {
        return $this->_first;
    }

    /**
     * @param mixed $first
     */
    public function setFirst($first)
    {
        $this->_first = $first;
    }

    /**
     * @return mixed
     */
    public function getLast()
    {
        return $this->_last;
    }

    /**
     * @param mixed $last
     */
    public function setLast($last)
    {
        $this->_last = $last;
    }

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

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->_username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->_password = $password;
    }

    /**
     * @return mixed
     */
    public function getPremium()
    {
        return $this->_premium;
    }

    /**
     * @param mixed $premium
     */
    public function setPremium($premium)
    {
        $this->_premium = $premium;
    }


}
