
<?php
include 'Lab4Common/Header.php';
include 'Lab4Common/Footer.php';
include 'Lab4Common/Functions.php';
$valid = true;
$name = $_POST["Fname"];
$postalcode = $_POST["pcode"];
$postalCodeRegex = "/[a-zA-Z][0-9][a-zA-Z]\s*[0-9][a-zA-Z][0-9]/i";
$phone = $_POST["phoneNumber"];
$phoneRegex = "/[2-9][0-9][0-9]\s*[2-9][0-9][0-9]\s*[0-9][0-9][0-9][0-9]/i";

$email = $_POST["email_user"];
$emailRegex = "\b[a-zA-Z0-9._%+-]+@(([a-zA-Z0-9-]+)\.)+[a-zA-Z]{2,4}\b";
$contact = $_POST["contact_method"];
$timearray = $_POST["time"];
$NameError = $PcodeError = $phoneError = $emailError = $contactError = "";
$_SESSION["name"] = $name;
$_SESSION["pcode"] = $postalcode;
$_SESSION["phone"] = $phone;
$_SESSION["email"] = $email;
$_SESSION["contact_method"] = $contact;
$_SESSION["time"] = $timearray;

//=====================================================================================//

?>
<?php
session_start();
extract($_GET); // start PHP session! 
header('Cache-Control: no-cache');
header('Pragma: no-cache');  // start PHP session! 

if (!isset($_SESSION["checkbox"])) {
    header("Location:Disclaimer.php");
    exit();
}

if (ValidateName($name) == "" && ValidatePostalCode($postalcode) == "" && ValidatePhone($phone) == "" && ValidateEmail($email) == "" && ValidateContact($contact) == "") {
    $_SESSION["name"] = $name;
    $_SESSION["pcode"] = $postalcode;
    $_SESSION["phone"] = $phone;
    $_SESSION["email"] = $email;
    $_SESSION["contact_method"] = $contact;
    $_SESSION["time"] = $timearray;
    header("Location: DepositCalculator.php");
    exit();
}
if (isset($_POST['time']))
    {
        foreach ($_POST['time'] as $time)
            $selected[$time] = "checked";
    }
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <form action="CustomerInfo.php" method="POST">  
            <div class="container">
                <div class="container-fluid">
                    <h1 class="">Customer Information</h1>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="Fname" value="<?php echo $_POST["Fname"]; ?>"><span class="text-danger"><?php if ($_POST) echo ValidateName($name) ?></span>
                    </div>
                    <div class="form-group">
                        <label>Postal Code:</label>
                        <input type="text" class="form-control" name="pcode" value="<?php echo $_POST["pcode"]; ?>"><span class="text-danger"> <?php if ($_POST) echo ValidatePostalCode($postalcode) ?></span>
                    </div>
                    <div class="form-group">
                        <label>Phone Number: (nnn-nnn-nnnn)</label>
                        <input type="tel" class="form-control" name="phoneNumber" value="<?php echo $_POST["phoneNumber"]; ?>"><span class="text-danger"> <?php if ($_POST) echo ValidatePhone($phone) ?></span>
                    </div>
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="email" class="form-control" name="email_user" value="<?php echo $_POST["email_user"]; ?>"><span class="text-danger"><?php if ($_POST) echo ValidateEmail($email) ?></span>
                    </div>
                    <div class="form-inline">
                        <label>Preferred contact Method:</label>
                        <input type="radio" class="form-control ml-5 mr-1" name="contact_method" value="phone"<?php if (isset($_POST["contact_method"]) && $_POST["contact_method"] == "phone") echo 
                            "checked = checked"; ?>checked="checked" /> Phone
                        <input type="radio" class="form-control ml-5 mr-1" name="contact_method" value="email" <?php if (isset($_POST["contact_method"]) && $_POST["contact_method"] == "email") echo 
                            "checked = checked"; ?> /> Email
                    </div>
                    <div class="form-group">
                        <label>If phone is selected, when can we contact you? 
                            (check all applicable)</label>
                        <div class="form-inline">
                            <input type="checkbox" class="form-control mr-1" name="time[]" value="morning" <?php echo $selected['morning'] ?>/>Morning
                            <input type="checkbox" class="form-control ml-5 mr-1" name="time[]" value="afternoon" <?php echo $selected['afternoon'] ?>/>Afternoon
                            <input type="checkbox" class="form-control ml-5 mr-1" name="time[]" value="evening" <?php echo $selected['evening'] ?>/>Evening <span class="text-danger"><?php if ($_POST) echo ValidateContact($contact) ?></span>
                        </div>
                    </div>

                    <input class="btn btn-primary text-white" type="submit" value="Calculate" name="submitbutton">
                    <input class="btn btn-primary text-white ml-3" type="reset" value="Clear" name="clear">

                </div>
            </div>
        </form>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

