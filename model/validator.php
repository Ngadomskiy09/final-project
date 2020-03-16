<?php
/**
 * This file does the validation.
 * Creates a function to validate info.
 * @return bool
 */
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
        $f3->set("errors['phone']", "*Please enter a valid phone number");
    }

    return $isValid;
}

/**
 * This function validates the item being posted.
 * @return bool
 */
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

/**
 * validates first name.
 * @param $fname
 * @return bool
 */
function validFname($fname)
{
    return !empty($fname) && ctype_alpha($fname);
}

/**
 * validates last name.
 * @param $lname
 * @return bool
 */
function validLname($lname)
{
    return !empty($lname) && ctype_alpha(($lname));
}

/**
 * validates email.
 * @param $email
 * @return bool
 */
function validEmail($email)
{
    return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * validate phone.
 * @param $phone
 * @return bool
 */
function validPhone($phone)
{
    return !empty($phone) && ctype_digit($phone) && $phone > 1000000000 && $phone < 10000000000;
}

/**
 * validates item, name
 * @param $itemName
 * @return bool
 */
function validItemName($itemName)
{
    return !empty($itemName);
}

/**
 * validats item description.
 * @param $itemDescription
 * @return bool
 */
function validItemDescription($itemDescription)
{
    return !empty($itemDescription);
}

/**
 * validates item price.
 * @param $itemPrice
 * @return bool
 */
function validItemPrice($itemPrice)
{
    return !empty($itemPrice) && filter_var($itemPrice, FILTER_VALIDATE_FLOAT);
}

