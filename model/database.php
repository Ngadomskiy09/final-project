<?php

/**
 * This file helps us connect to the database and make a pdo.
 *
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
//require_once("/home/rdhaliwa/config-ls.php");
//PDO object

/**
 * Class DatabaseLs
 */
class DatabaseLs
{
    /**
     * @var PDO
     */
    private $_dbh;

    /**
     * DatabaseLs constructor.
     */
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

    /**
     * @return array
     */
    function getItems()
    {
        $sql = "SELECT * FROM letSell";

        $statement = $this->_dbh->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     *
     */
    function insertItem()
    {
        $itemObj = $_SESSION['item'];

        $sql = "INSERT INTO letSell VALUES (DEFAULT, :itemName, :itemDescription, :itemPrice, :itemPhone)";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(":itemName", $itemObj->getItemName());
        $statement->bindParam(":itemDescription", $itemObj->getItemDescription());
        $statement->bindParam(":itemPrice", $itemObj->getItemPrice());

        if($_SESSION['premium'] = $_POST['premium']) {
            $statement->bindParam(":itemPhone", $itemObj->getItemPhone());
        }
        else
        {
            $x = "0000000000";
            $statement->bindParam(":itemPhone", $x);
        }

        $statement->execute();
    }

    /**
     * @return array
     */
    function getMember()
    {
        $sql = "SELECT * FROM lsmember";

        $statement = $this->_dbh->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     *
     */
    function insertMember()
    {
        $memberObj = $_SESSION['member'];

        $sql = "INSERT INTO lsmember VALUES (DEFAULT, :fname, :lname, :email, :state, :premium)";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(":fname", $memberObj->getFname());
        $statement->bindParam(":lname", $memberObj->getLname());
        $statement->bindParam(":email", $memberObj->getEmail());
        $statement->bindParam(":state", $memberObj->getState());
        if($_SESSION['premium'] = $_POST['premium'])
        {
            $x = 1;
            $statement->bindParam(":premium", $x);
        } else {
            $x = 0;
            $statement->bindParam(":premium", $x);
        }

        $statement->execute();
    }
}
