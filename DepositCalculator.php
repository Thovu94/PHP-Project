<?php
include 'Lab4Common/Header.php';
include 'Lab4Common/Footer.php';
include 'Lab4Common/Functions.php';
$amount = $_POST["pamount"];
$rate = $_POST["inrate"];
$year = $_POST["year"];
?>
<?php
session_start();
if (!isset($_SESSION["name"]) || !isset($_SESSION["name"]) || !isset($_SESSION["pcode"]) || !isset($_SESSION["phone"]) || !isset($_SESSION["contact_method"])) {
    header("Location: CustomerInfo.php");
    exit();
}

$_SESSION["amount"] = $amount;
$_SESSION["rate"] = $rate;
$_SESSION["year"] = $year;
?>
<html>
    <head>
        <title></title>  
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">  
            <div class="container">
                <div class="container-fluid">
                    <h3 class="">Enter principal amount, interest rate and select number of years to deposit </h3>
                    <div class="form-group">
                        <label>Principal Amount:</label>
                        <input class="form-control" type="number" step="any" name = "pamount" value="<?php echo $_POST["pamount"]; ?>"> <span class="text-danger"><?php if ($_POST) echo ValidatePrincipal($amount); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Interest Rate (%):</label>
                        <input class="form-control" type="number" step="any" name = "inrate" value="<?php echo $_POST["inrate"]; ?>"><span class="text-danger"><?php if ($_POST) echo ValidateRate($rate); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Years to deposit: </label>
                        <select class="form-control" name="year">
                            
                           <?php for ($i = 1; $i <=20; $i++) {?>
                            <option value="<?php echo $i ?>" <?php if($i == ($_POST["year"]))
                                echo 'selected="selected"';?> > <?php echo $i; ?> </option>                                
                            <?php ;} ?>
                        </select>
                    </div>


                    <input class="btn btn-primary text-white" type="submit" value="Calculate" name="submitbutton">
                    <input class="btn btn-primary text-white ml-3" type="reset" value="Clear" name="clear">

                </div>
            </div>
        </form>

        <div class="container">
            <div class="container-fluid">
                <div style="display: block" >
                    <?php
                    if (isset($_POST["submitbutton"])) {

                        if (ValidatePrincipal($amount) == "" && ValidateRate($rate) == "") {
                            $display = "block";
                            echo " <br>The following is the result of calculation: " . "<br> <br>";
                            print ("<table border=1 class='table'> <thead style='background-color: #99b3ff'> <tr><th scope='col' style='text-align: center'>Year \t </th><th scope='col' style='text-align: center'>Principle at year start \t </th><th scope='col' style='text-align: center'>Interest for the year \t </th></tr> </thead>");
 
                            for ($i = 1; $i < $year + 1; $i++) {
                                $amount = $amount + $rate_per_year;
                                $rate_per_year = $amount * $rate / 100;
                                printf("<tbody><tr><th scope='row' style='text-align: center'> $i \t </th><th scope='row' style='text-align: center'>%.2f </th><th scope='row' style='text-align: center'>%.2f</th></tr>", $amount, $rate_per_year);
                            }
                            print ("</tbody></table");
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
        
    </body>
</html>