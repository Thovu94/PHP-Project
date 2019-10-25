<?php

 function ValidatePrincipal($amount) {
            if (empty($amount)) {
                $valid = true;
                return "Pricincipal amount field can not be blank.<br/><br/>";
            } elseif (!is_numeric($amount)) {
                $valid = true;
                return "Pricincipal amount must be a numeric number.<br/><br/>";
            } elseif ($amount <= 0) {
                $valid = true;
                return "Pricincipal amount must be greater than 0.<br/><br/>";
            } else {
                return "";
            }
        }

//=====================================================================================//
        function ValidateRate($rate) {
            if (empty($rate)) {
                $valid = true;
                return "Interest rate field can not be blank.<br/><br/>";
            } elseif ($rate < 0) {
                $valid = true;
                return "Interest rate can not be negative.<br/><br/>";
            } else {
                return "";
            }
        }

//=====================================================================================//
function ValidateName($name) {
    if (empty($name)) {
        $valid = true;
        return "Name is required";
    } else {
        return "";
    }
}

//=====================================================================================//
function ValidatePostalCode($postalcode) {
    $postalCodeRegex = "/[a-zA-Z][0-9][a-zA-Z]\s*[0-9][a-zA-Z][0-9]/i";
    if (preg_match($postalCodeRegex, $postalcode, $postal_code_op)) {
        return "";
    } else {
        return "Incorrect Postal Code";
    }
    var_dump($postal_code_op);
}

//=====================================================================================//
function ValidatePhone($phone) {
    $phoneRegex = "/^\d{3}-\d{3}-\d{4}$/i";
    if (preg_match($phoneRegex, $phone, $phone_op)) {
        return "";
    } else {
        return "Incorrect phone number";
    }
    var_dump($phone_op);
}

//=====================================================================================//
function ValidateEmail($email) {
    $emailRegex = "/[a-zA-Z0-9._%+-]+@(([a-zA-Z0-9-]+)\.)+[a-zA-Z]{2,4}/i";
    if (preg_match($emailRegex, $email, $email_op)) {
        return "";
    } else {
        return "Incorrect email";
    }
    var_dump($email_op);
}

//=====================================================================================//
function ValidateContact($contact) {
    if ($contact == "phone" && count($_POST["time"]) == 0) {
        return "When preferred contact method is phone, you have to select contact time";
    } else {
        return "";
    }
}