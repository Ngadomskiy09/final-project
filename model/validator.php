<?php
function validCreate()
{
    global $f3;
    $isValid = true;

    if (!validFname($f3->get('fname'))) {
        $isValid = false;
        $f3->set("errors['fname']", "*Please enter a first name");
    }

    if (!validLname($f3->get('lname'))) {
        $isValid = false;
        $f3->set("errors['lname']", "*Please enter a last name");
    }

    if (!validEmail($f3->get('email'))) {
        $isValid = false;
        $f3->set("errors['email']", "*Please enter a valid email");
    }

    if (!validPhone($f3->get('phone'))) {
        $isValid = false;
        $f3->set("errors['phone']",  "*Please enter a valid phone number");
    }

    return $isValid;
}

function validItem()
{
    global $f3;
    $isValid = true;

    if (!validItemName($f3->get('itemName'))) {
        $isValid = false;
        $f3->set("errors['itemName']", "*Please enter the Items name");
    }

    if (!validItemDescription($f3->get('itemDescription'))) {
        $isValid = false;
        $f3->set("errors['itemDescription]", "*Please enter the Items description");
    }

    if (!validItemPrice($f3->get('itemPrice'))) {
        $isValid = false;
        $f3->set("errors['itemPrice']", "*Please enter your Items price");
    }

    return $isValid;
}

function validFname($fname)
{
    return !empty($fname) && ctype_alpha($fname);
}

function validLname($lname)
{
    return !empty($lname) &&  ctype_alpha(($lname));
}

function validEmail($email)
{
    return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validPhone($phone)
{
    return !empty($phone) && ctype_digit($phone) && $phone > 1000000000 && $phone < 10000000000;
}

function validItemName($itemName)
{
    return !empty($itemName);
}

function validItemDescription($itemDescription)
{
    return !empty($itemDescription);
}

function validItemPrice($itemPrice)
{
    return !empty($itemPrice) && filter_var($itemPrice, FILTER_VALIDATE_FLOAT);
}

