<?php

class Item
{
    private $_itemName;
    private $_itemDescription;
    private $_itemPrice;

    function __construct($itemName, $itemDescription, $itemPrice)
    {
        $this->_itemName = $itemName;
        $this->_itemDescription = $itemDescription;
        $this->_itemPrice = $itemPrice;
    }

    function getItemName()
    {
        return $this->_itemName;
    }

    function setItemName($itemName)
    {
        $this->_itemName = $itemName;
    }

    function getItemDescription()
    {
        return $this->_itemDescription;
    }

    function setItemDescription($itemDescription)
    {
        $this->_itemDescription = $itemDescription;
    }

    function getItemPrice()
    {
        return $this->_itemPrice;
    }

    function setItemPrice($itemPrice)
    {
        $this->_itemPrice = $itemPrice;
    }

}
