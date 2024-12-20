<?php

// ADMIN Loign Page (Test)

// function admin($mysqli,$name,$email,$password)
// {
//     $sql = "INSERT INTO `admin`(`name`,`email`,`password`) VALUE ('$name','$email','$password')";
//     return  $mysqli->query($sql);
// }

// function get_admin_with_id($mysqli,$id)
// {
//     $sql = "SELECT * FROM `admin` WHERE `id`=$id";
//     $admin = $mysqli->query($sql);
//     return $admin->fetch_assoc();
// }

// function get_admin($mysqli)
// {
//     $sql = "SELECT * FROM `admin`";
//     return  $mysqli->query($sql);
// }


function user_register($mysqli,$name,$email,$phone,$address,$password)
{
    $sql = "INSERT INTO `customer`(`name`,`email`,`phone`,`address`,`password`) VALUE ('$name','$email','$phone','$address','$password')";
    return mysqli->query($sql);
}

function get_all_customer($mysqli)
{
    $sql = "SELECT * FROM `customer`";
    return $mysqli->query($sql);
}

function login($mysqli,$email,$password)
{
    $sql = "SELECT * FROM `customer` WHERE email= '$email' AND password='$password'";
    return $mysqli->query($sql);
}

