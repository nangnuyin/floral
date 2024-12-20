<?php require_once ("./storage/db.php")?>
<?php require_once("./storage/register_crud.php")?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Active Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Active
  * Template URL: https://bootstrapmade.com/active-bootstrap-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script src="./assets/js/jquery.js"></script>
</head>

<div class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->

      </a>
      </div>
  </header>
 
      <?php
          $name = "";
          $email = "";
          $phone = "";
          $address = "";
          $password = "";
          $confirm_password = "";        
          $name_err = "";
          $email_err = "";
          $phone_err = "";
          $address_err = "";
          $password_err = "";       
          $confirm_password_err = "";

        if(isset($_POST['signup'])){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $password = $_POST['password'];
          $confirm_password = $_POST['confirm_password'];

          if(empty($name)){
            $name_err = "The name field is required";
          }
          if(empty($email)){
            $email_err = "The email field is required";
          }
          if(empty($phone)){
            $phone_err = "Phone number is required";
          }else{
            if(!preg_match('/^[1-9][0-9]*$/',$phone)){
              $phone_err = "Does not match with phone number format ";
            }
          }
          
          if(empty($address)){
            $address_err = "The address field is required";
          }
          if(empty($password)){
            $password_err = "The password field is required";
          }
          if($confirm_password != $password){
            $confirm_password_err = "The password does not match";
          }
          if(empty($name_err) && empty($email_err) && empty($phone_err) && empty($address_err) && empty($password_err) && empty($confirm_password_err) && ($confirm_password == $password)){

            $encrptPassword = password_hash($password,PASSWORD_BCRYPT);
            $query = "INSERT INTO `customer`(`name`,`email`,`phone`,`address`,`password`) VALUE ('$name','$email','$phone','$address','$encrptPassword')";
            $result = mysqli_query($mysqli,$query);
            if($result == true){
              echo "<script> alert('Registration Successfull');</script>";
            }else{
              die('Error: '.mysqli_error($sql));
            }
        }     
      }
              
      ?>
    
  <body>
    <section class="vh-100">
      <div class="card m-3 p-3 " style="border:none;">
        <div class="row">
          <div class="card col-sm-5 ">
            <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-3 pt-xl-0 mt-xl-n5">

              <form style="width: 25rem;" method="post">

                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register to <span
                    class="sitename">Flora</span></h3>

                <div data-mdb-input-init class="form-outline mb-2 form-floating">
                  <input type="text" name="name" class="form-control <?php if($name_err != ""){ ?>
                    is-invalid <?php } ?>" value = "<?= $name ?>" />
                  <label class="form-label" for="name">Name</label>
                  <i class="text-danger"><?= $name_err ?></i>
                </div>


                <div data-mdb-input-init class="form-outline mb-2 form-floating">
                  <input type="email" name="email" class="form-control <?php if($email_err != ""){ ?>
                    is-invalid <?php } ?>" value = "<?= $email ?>" />
                  <label class="form-label" for="email">Email</label>
                  <i class="text-danger"><?= $email_err ?></i>
                </div>

                <div data-mdb-input-init class="form-outline mb-2 form-floating">
                  <input type="tel" name="phone" class="form-control <?php if($phone_err != ""){ ?>
                    is-invalid <?php } ?>" value = "<?= $phone ?>" />
                  <label class="form-label" for="phone">Phone Number</label>
                  <i class="text-danger"><?= $phone_err ?></i>
                </div>

                <div data-mdb-input-init class="form-outline mb-2 form-floating">
                  <textarea class="form-control <?php if($address_err != ""){?> is-invalid <?php } ?>" name="address" rows="3"> <?= $address ?></textarea>
                  <label class="form-label" for="address"> Address</label>
                  <i class="text-danger"><?= $address_err ?></i>
                </div>

                <div>
                  <div data-mdb-input-init class="form-outline mb-2 form-floating">
                    <input type="password" id="password" name="password" class="form-control <?php if($password_err != ""){ ?> is-invalid <?php } ?>" value = "<?= $password ?>" />
                    <label class="form-label" for="form2Example28">Password</label>
                    <i class="text-danger"><?= $password_err ?></i>
                  </div>
                  <div data-mdb-input-init class="form-outline mb-2 form-floating">
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control <?php if($confirm_password_err != ""){ ?> is-invalid <?php } ?>"value = "<?= $confirm_password ?>"  />
                    <label class="form-label" for="form2Example28">Confirm Password</label>
                    <i class="text-danger"><?= $confirm_password_err ?></i>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" id="show" class="form-check-input" >
                    <label class="form-check-label " style="font-size:13px;" for="show">
                      Show Password
                    </label>
                  </div>
                </div>
                <div class="pt-1 mt-2 mb-4">
                  <button class="btn " name ="signup"
                    style="background-color: var(--accent-color);color: var(--contrast-color);border-radius: 30px;padding: 8px 30px;border: 2px solid transparent;transition: 0.3s all ease-in-out;font-size: 14px;">Sign
                    up</button>
                </div>
              </form>

            </div>

          </div>
          <div class="col-sm-7 px-0 " style="background-image:url(images/sunflower.png)">
            
          </div>
        </div>
      </div>
    </section>
    <script>
        let show = $("#show");
        let password = $("#password");
        let confrim_password = $("#confirm_password");
        show.on("click",()=>{
            if(show.is(":checked")){
                password.get(0).type = "text";
                confrim_password.get(0).type = "text";
            }else{
                password.get(0).type = "password";
                confrim_password.get(0).type = "password";
            }
        })
    </script> 
  </body>
      </html>