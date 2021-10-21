<?php include('../config/connect.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Drug</h1>

        <br><br>

        <?php

        $id = $_GET['id'];


        $sql = "SELECT * FROM drugs WHERE id=$id";

        $res = mysqli_query($conn, $sql);


        if ($res == true) {

            $count = mysqli_num_rows($res);

            if ($count == 1) {

                $row = mysqli_fetch_assoc($res);
                $name = $row['name'];
                $type = $row['type'];
                $barcode = $row['barcode'];
                $dose = $row['dose'];
                $code = $row['code'];
                $cost_price = $row['cost_price'];
                $selling_price = $row['selling_price'];
                $expiry = $row['expiry'];
                $company_name = $row['company_name'];
                $production_date = $row['production_date'];
                $expiration_date = $row['expiration_date'];
                $place = $row['place'];
                $quantiy = $row['quantiy'];
            } else {
                
                header('location:' . SITEURL . 'src/manage-drug.php');
            }
        }

        ?>


        <form action="" method="POST">

            <table class="tbl-30">

                <tr>
                    <td>Drug name: </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Type: </td>
                    <td>
                        <input type="text" name="type" value="<?php echo $type; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Barcode: </td>
                    <td>
                        <input type="text" name="barcode" value="<?php echo $barcode; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Dose: </td>
                    <td>
                        <input type="text" name="dose" value="<?php echo $dose; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Code: </td>
                    <td>
                        <input type="text" name="code" value="<?php echo $code; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Cost Price: </td>
                    <td>
                        <input type="int" name="cost_price" value="<?php echo $cost_price; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Selling Price: </td>
                    <td>
                        <input type="int" name="selling_price" value="<?php echo $selling_price; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Expiry: </td>
                    <td>
                        <input type="text" name="expiry" value="<?php echo $expiry; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Company Name: </td>
                    <td>
                        <input type="text" name="company_name" value="<?php echo $company_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Production Date: </td>
                    <td>
                        <input type="date" name="production_date" value="<?php echo $production_date; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Expiration Date: </td>
                    <td>
                        <input type="date" name="expiration_date" value="<?php echo $expiration_date; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Place: </td>
                    <td>
                        <input type="text" name="place" value="<?php echo $place; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Quantiy: </td>
                    <td>
                        <input type="text" name="quantiy" value="<?php echo $quantiy; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Drug" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php


if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $barcode = $_POST['barcode'];
    $dose = $_POST['dose'];
    $code = $_POST['code'];


    $cost_price = $_POST['cost_price'];
    $selling_price = $_POST['selling_price'];
    $expiry = $_POST['expiry'];
    $company_name = $_POST['company_name'];
    $production_date= $_POST['production_date'];
    $expiration_date = $_POST['expiration_date'];
    $place= $_POST['place'];
    $quantiy = $_POST['quantiy'];


    //Create a SQL Query to Update Admin
    $sql = "UPDATE drugs SET
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
        WHERE id='$id'
        ";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {
    
        $_SESSION['update'] = "<div class='success'>Office Updated Successfully.</div>";
     
        header('location:' . SITEURL . 'src/manage-drug.php');
    } else {
    
        $_SESSION['update'] = "<div class='error'>Failed to Upadate Office.</div>";
     
        header('location:' . SITEURL . 'src/manage-drug.php');
    }
}

?>