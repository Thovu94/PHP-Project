<?php
include 'Lab4Common/Header.php';
include 'Lab4Common/Footer.php';
?>
<?php
session_start();
extract($_GET);
$error = "";
if (isset($_POST["submit"])) {
    if (isset($_POST["checkbox"])) {
        $_SESSION["checkbox"] = $_POST["checkbox"];
        header("Location: CustomerInfo.php");
        exit();
    } else {
        $error = "You must agree the terms and conditions!";
    }
}
?>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h1 class="text-center">Terms and Conditions</h1>
        <form action="Disclaimer.php" method="POST">  
            <div class="container">
                <div class="container-fluid">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td scope="row">I agree to abide by the Bank's Terms and Conditions
                                    and rules in force and the changes thereto in Terms and Conditions from time to time relating to my account 
                                    as communicated and made available on the Bank's website</td> 
                            </tr>
                            <tr><td scope="row">I agree that the bank before opening any deposit 
                                    account, will carry out a due diligence as required Under Know Your Customer guidelines of the bank. 
                                    I would be required to submit necessary documents or proofs, such as identity, address, 
                                    photograph and any such information, I agree to submit the above documents again at periodic intervals, as may be required by the Bank.</td>    
                            </tr>
                            <tr>
                                <td scope="row">I agree that the Bank can at its sole discretion', amend any of the services/facilities given in any account either
                                    wholly or partially at any time by giving me at least 30 days notice and/or provide an option to me
                                    to switch to other services/facilities.</td> 
                            </tr>
                        </tbody>
                    </table>
                    <span class="text-danger"><?php echo $error; ?></span><br>
                    <input type="checkbox" name="checkbox" value="Yes"> I have read and agree with the terms and conditions <br><br>
                    <input class="btn btn-primary pt-1" type="submit" value="Start" name="submit">
                </div>
            </div>
        </form>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
