<?php

require_once("/home2/ngadomsk/config-ls.php");

//PDO object
class DatabaseLs
{
    private $_dbh;

    function __construct()
    {
        /*try {
            //Create a new PDO connection
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            echo "Connected!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }*/
        $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    }

    function getItems()
    {
        $sql = "SELECT * FROM letSell";

        $statement = $this->_dbh->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function insertItem()
    {
        $itemObj = $_SESSION['item'];

        $sql = "INSERT INTO letSell VALUES (DEFAULT, :itemName, :itemDescription, :itemPrice)";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(":itemName", $itemObj->getItemName());
        $statement->bindParam(":itemDescription", $itemObj->getItemDescription());
        $statement->bindParam(":itemPrice", $itemObj->getItemPrice());

        $statement->execute();
    }

    function getMember()
    {
        $sql = "SELECT * FROM lsmember";

        $statement = $this->_dbh->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function insertMember()
    {
        $memberObj = $_SESSION['member'];

        $sql = "INSERT INTO lsmember VALUES (DEFAULT, :fname, :lname, :email, :state, :phone)";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(":fname", $memberObj->getFname());
        $statement->bindParam(":lname", $memberObj->getLname());
        $statement->bindParam(":email", $memberObj->getEmail());
        $statement->bindParam(":state", $memberObj->getState());
        $statement->bindParam(":phone", $memberObj->getPhone());
        //$statement->bindParam(":premium", $memberObj->getItemPrice());

        $statement->execute();
    }
}
