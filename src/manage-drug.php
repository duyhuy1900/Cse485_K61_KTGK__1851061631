<?php include('../config/connect.php'); ?>
<?php include('../config/head.php'); ?>



    <div class="container">
                 <div class="wrapper">
                <h1>Manage Drug</h1>

                <br />

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; 
                        unset($_SESSION['add']); 
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['drugs-not-found']))
                    {
                        echo $_SESSION['drugs-not-found'];
                        unset($_SESSION['drugs-not-found']);
                    }

             
                ?>
                <br><br>

             
                <a href="add-blood.php"  class="fas fa-user-edit fa-2x">Add New Drug</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.N.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Bar Code</th>
                    <th scope="col">Dose</th>
                    <th scope="col">Code</th>
                    <th scope="col">Cost Price</th>
                    <th scope="col">Selling Price</th>
                    <th scope="col">Expiry</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Production Date</th>
                    <th scope="col">Expiration Date</th>
                    <th scope="col">Place</th>
                    <th scope="col">Quantiy</th>
                    <th scope="col"></th>
              
                </tr>
            </thead>
            <tbody>
                <?php
               
                $sql = "SELECT * FROM drugs";
               
                $res = mysqli_query($conn, $sql);

              
                if ($res == TRUE) {
                    
                    $count = mysqli_num_rows($res); 

                    $sn = 1; 

                  
                    if ($count > 0) {
                  
                        while ($rows = mysqli_fetch_assoc($res)) {
                         

                            $id = $rows['id'];
                            $name = $rows['name'];
                            $type = $rows['type'];
                            $barcode = $rows['barcode'];
                            $dose = $rows['dose'];
                            $code = $rows['code'];
                            $cost_price = $rows['cost_price'];
                            $selling_price = $rows['selling_price'];
                            $expiry = $rows['expiry'];
                            $company_name= $rows['company_name'];
                            $production_date = $rows['production_date'];
                            $expiration_date = $rows['expiration_date'];
                            $place = $rows['place'];
                            $quantiy= $rows['quantiy'];

                          
                ?>

                            <tr>
                                <td><?php echo $sn++; ?>. </td>
                                <td><?php echo  $name; ?></td>
                                <td><?php echo $type; ?></td>
                                <td><?php echo  $barcode; ?></td>
                                <td><?php echo $dose; ?></td>
                                <td><?php echo $code; ?></td>
                                <td><?php echo $cost_price; ?></td>
                                <td><?php echo $selling_price; ?></td>
                                <td><?php echo $expiry; ?></td>
                                <td><?php echo $company_name; ?></td>
                                <td><?php echo  $production_date; ?></td>
                                <td><?php echo $expiration_date; ?></td>
                                <td><?php echo  $place; ?></td>
                                <td><?php echo $quantiy; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>src/update-drug.php?id=<?php echo $id; ?>" class="fas fa-user-edit fa-2x">Chi Tiết</a>
                                    <a href="<?php echo SITEURL; ?>src/delete-drug.php?id=<?php echo $id; ?>" class="fas fa-user-times fa-2x">Delete </a>
                                </td>
                            </tr>

                <?php

                        }
                    } else {
                        
                    }
                }

                ?>

            </tbody>
        </table>
    </div>



   

