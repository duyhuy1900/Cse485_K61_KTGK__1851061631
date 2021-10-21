<?php include('../config/connect.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Drug</h1>

        <br><br>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td> Name: </td>
                    <td>
                        <input type="text" name="name" placeholder="Drug Name">
                    </td>
                </tr>

                <tr>
                    <td> Type: </td>
                    <td>
                        <input type="text" name="type" placeholder="Type">
                    </td>
                </tr>

                <tr>
                    <td>Bar Code: </td>
                    <td>
                        <input type="text" name="barcode" placeholder="Barcode">
                    </td>
                </tr>
                <tr>
                    <td>Dose: </td>
                    <td>
                        <input type="text" name="dose" placeholder="Dose">
                    </td>
                </tr>
                <tr>
                    <td>Code</td>
                    <td>
                        <input type="text" name="code" placeholder="Code">
                    </td>
                </tr>
                <tr>
                    <td>Cost Price: </td>
                    <td>
                        <input type="text" name="cost_price" placeholder="Cost_price">
                    </td>
                </tr>
                <tr>
                    <td>Selling Price: </td>
                    <td>
                        <input type="text" name="selling_price" placeholder="selling_price">
                    </td>
                </tr>

                <tr>
                    <td>Expiry: </td>
                    <td>
                        <input type="text" name="expiry" placeholder="Expiry">
                    </td>
                </tr>
  
                <tr>
                    <td>Company name: </td>
                    <td>
                        <input type="text" name="company_name" placeholder="Company name">
                    </td>
                </tr>
                <tr>
                    <td>Production Date: </td>
                    <td>
                        <input type="date" name="production_date" placeholder="date">
                    </td>
                </tr>
                <tr>
                    <td>Expiration Date: </td>
                    <td>
                        <input type="date" name="expiration_date" placeholder="date">
                    </td>
                </tr>
                <tr>
                    <td>Place: </td>
                    <td>
                        <input type="text" name="place" placeholder="place">
                    </td>
                </tr>
                <tr>
                    <td>Quantiy: </td>
                    <td>
                        <input type="text" name="quantiy" placeholder="quantiy">
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Drug" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>



<?php


if (isset($_POST['submit'])) {



    $name = $_POST['name'];
    $type = $_POST['type'];
    $barcode = $_POST['barcode'];
    $dose = $_POST['dose'];
    $code = $_POST['code'];


    $cost_price = $_POST['cost_price'];
    $selling_price = $_POST['selling_price'];
    $expiry = $_POST['expiry'];
    $company_name = $_POST['company_name'];
    $production_date = $_POST['production_date'];
    $expiration_date = $_POST['expiration_date'];
    $place = $_POST['place'];
    $quantiy = $_POST['quantiy'];

    //2. SQL Query to Save the data into database
    $sql = "INSERT INTO drugs SET 
        name='$name',
        type='$type',
        barcode='$barcode',
        dose='$dose',
        code='$code',
        cost_price='$cost_price' ,
        selling_price='$selling_price',
        expiry='$expiry',
        company_name='$company_name',
        production_date='$production_date',
        expiration_date='$expiration_date',
        place='$place',
        quantiy='$quantiy'
        ";


    $res = mysqli_query($conn, $sql);

  
    if ($res == TRUE) {
    
        $_SESSION['add'] = "<div class='success'>Ofice Added Successfully.</div>";

        header("location:" . SITEURL . 'src/manage-drug.php');
    } else {
   
        $_SESSION['add'] = "<div class='error'>Failed to Add Employee.</div>";
 
        header("location:" . SITEURL . 'src/add-drug.php');
    }
}

?>