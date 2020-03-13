<?php

/**
 * CREATE TABLE lsmember (
 * lsmember_id int NOT NULL AUTO_INCREMENT,
 * first_name VARCHAR(255) NOT NULL,
 * last_name VARCHAR(255) NOT NULL,
 * email VARCHAR(255) NOT NULL,
 * state CHAR(2),
 * phone VARCHAR(20) NOT NULL,
 * premium TINYINT(1) NOT NULL,
 *
 * PRIMARY KEY (lsmember_id)
 * )
 *
 * CREATE TABLE letSell (
 * item_id int NOT NULL AUTO_INCREMENT,
 * item_name VARCHAR(255) NOT NULL,
 * item_desc VARCHAR(1000) NOT NULL,
 * item_price int(10) NOT NULL,
 *
 * PRIMARY_KEY (item_id)
 * )
 */

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
