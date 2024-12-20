<?php 
    session_start(); 
    if(!isset($_SESSION['user_array'])){
        header('location:login.php');
    }

?>
<?php require_once("./layout/header.php") ?>
<?php require_once("./storage/register_crud.php") ?>
<?php require_once("./storage/db.php") ?>

<div class="card">
    <div class="card-body">
         <h2>Customer List</h2>
            <table class="table table-bordered table-md table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $customer_list = get_all_customer($mysqli); ?>
                    <tr>
                        <?php $i = 1;?>
                        <?php while($customer = $customer_list->fetch_assoc()){ ?>
                        <td><?= $i ?></td>
                        <td><?= $customer["name"] ?></td>
                        <td><?= $customer["email"] ?></td>
                        <td><?= $customer["phone"] ?></td>
                        <td><?= $customer["address"] ?></td>
                        <td><?= $customer["password"] ?></td>
                    </tr>
                    <?php $i++;
                } ?>

                </tbody>
            </table>
    </div>

</div>