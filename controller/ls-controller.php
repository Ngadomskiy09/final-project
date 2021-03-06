<?php
/**
 * Class LsController
 * This controls the different views.
 */
class LsController
{
    /**
     * @var
     */
    private $_f3;
    /**
     * @var DatabaseLs
     */
    private $_dbh;

    /**
     * LsController constructor.
     * @param $f3
     */
    public function __construct($f3)
    {
        $this->_f3 = $f3;
        $this->_dbh = new DatabaseLs();
    }

    /**
     * readers home
     */
    public function home()
    {
        $template = new Template();
        echo $template->render('views/home.html');
    }

    /**
     * readers login
     */
    public function login()
    {
        $template = new Template();
        echo $template->render('views/login.html');
    }

    /**
     * readers signup
     */
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Get Data from form
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $state = $_POST['state'];
            $premium = $_POST['premium'];

            // Add data to hive
            $this->_f3->set('fname', $fname);
            $this->_f3->set('lname', $lname);
            $this->_f3->set('email', $email);
            $this->_f3->set('state', $state);
            $this->_f3->set('premium', $premium);

            if (validCreate()) {
                // Write data to SESSION
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['email'] = $email;
                $_SESSION['state'] = $state;
                $_SESSION['premium'] = $_POST['premium'];
                $_SESSION['member'] = new LSMember($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['state']);


                $_SESSION['user'] = true;
                $this->_f3->reroute('/addItem');

            }

        }
        $template = new Template();
        echo $template->render('views/create.html');
    }

    /**
     * readers new post
     */
    public function add()
    {
        //var_dump($_SESSION['member']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get data from form
            $itemName = $_POST['itemName'];
            $itemDescription = $_POST['itemDescription'];
            $itemPrice = $_POST['itemPrice'];
            $itemPhone = $_POST['phone'];

            // Add data to hive
            $this->_f3->set('itemName', $itemName);
            $this->_f3->set('itemDescription', $itemDescription);
            $this->_f3->set('itemPrice', $itemPrice);
            $this->_f3->set('itemPhone', $itemPhone);

            if (validItem()) {
                //Write data to session
                $_SESSION['itemName'] = $itemName;
                $_SESSION['itemDescription'] = $itemDescription;
                $_SESSION['itemPrice'] = $itemPrice;
                $_SESSION['itemPhone'] = $_POST['phone'];
                if($_SESSION['premium'] == 'premium') {
                    $_SESSION['item'] = new LSPM ($_POST['itemName'], $_POST['itemDescription'], $_POST['itemPrice']);
                    $_SESSION['item']->setPhone($_POST['phone']);
                } else {
                    $_SESSION['item'] = new Item ($_POST['itemName'], $_POST['itemDescription'], $_POST['itemPrice']);
                }
                $this->_f3->reroute('/summary');

            }

        }

        $this->_dbh->insertMember();
        $template = new Template();
        echo $template->render('views/addItem.html');
    }

    /**
     * readers post summary
     */
    public function summary()
    {
        //var_dump($_SESSION['item']);
        $this->_dbh->insertItem();
        $views = new Template();
        echo $views->render("views/summary.html");
    }

    /**
     * readers selling list
     */
    public function selling()
    {
        $this->_f3->set('itemInfo', $this->_dbh->getItems());

        $template = new Template();
        echo $template->render('views/sellingDB.html');
    }

    /**
     * readers admin page
     */
    public function admin()
    {
        $this->_f3->set('memberInfo', $this->_dbh->getMember());

        $template = new Template();
        echo $template->render('views/admin.html');
    }

    /**
     * logout's use and return's to home.
     */
    public function logout()
    {
        $_SESSION["user"] = false;
        $_SESSION['premium'] = false;
        $template = new Template();
        echo $template->render('views/home.html');
    }

    /**
     * login's user and redirects to postings.
     */
    public function success()
    {
        $_SESSION["user"] = true;
        $template = new Template();
        echo $template->render('views/sellingDB.html');
    }
}