<?php


    $mysqli = new mysqli("localhost","root","");
    if($mysqli->connect_error){
        echo "Cann't not connect database!";
    }else{
        $sql = "CREATE DATABASE IF NOT EXISTS `flowershop`";
        if($mysqli->query($sql)){
                if($mysqli->select_db("flowershop")){
                   if(!create_table($mysqli)){
                        echo "Can not create tables!";
                        die();
                   }
            
                }
            }
        }


    function create_table($mysqli){

        $sql = "CREATE TABLE IF NOT EXISTS `customer` (`customer_id` INT AUTO_INCREMENT ,`name` VARCHAR(45) NOT NULL,`email` VARCHAR(45) UNIQUE NOT NULL, `phone` INT NOT NULL,`address` VARCHAR(225) NOT NULL,`password` VARCHAR(45) NOT NULL,PRIMARY KEY(`customer_id`))";
        if(!$mysqli->query($sql)){
            return false;
        }
    
        $sql = "CREATE TABLE IF NOT EXISTS `flower`(`flower_id` INT AUTO_INCREMENT , `flower_name` VARCHAR(45) NOT NULL ,`color` VARCHAR(45) NOT NULL,PRIMARY KEY(`flower_id`))";
        if(!$mysqli->query($sql)){
            return false;
        }
    
        $sql = "CREATE TABLE IF NOT EXISTS `bouquet`(`bouquet_id` INT AUTO_INCREMENT,`bouquet_name` VARCHAR(45) NOT NULL, `price` INT NOT NULL,PRIMARY KEY(`bouquet_id`))";
        if(!$mysqli->query($sql)){
            return false;
        }
    
        $sql = "CREATE TABLE IF NOT EXISTS `plant_type`(`plant_type_id` INT AUTO_INCREMENT,`plant_type_name` VARCHAR(45) NOT NULL, `description` VARCHAR(225) NOT NULL,PRIMARY KEY(`plant_type_id`))";
        if(!$mysqli->query($sql)){
            return false;
        }
    
        $sql = "CREATE TABLE IF NOT EXISTS `plants`(`plant_id` INT AUTO_INCREMENT,`plant_name` VARCHAR(45) NOT NULL, `price` INT NOT NULL,`description` VARCHAR(225) NOT NULL,`image` VARCHAR(85),`size` INT NOT NULL ,PRIMARY KEY(`plant_id`))";
        if(!$mysqli->query($sql)){
            return false;
        }
    
        $sql = "CREATE TABLE IF NOT EXISTS `invoice`(`invoice_id` INT AUTO_INCREMENT,`total_amount` INT NOT NULL,PRIMARY KEY(`invoice_id`))";
        if(!$mysqli->query($sql)){
            return false;
        }
    
        $sql = "CREATE TABLE IF NOT EXISTS `bouquet_order` (`bouquet_order_id` INT AUTO_INCREMENT,PRIMARY KEY(`bouquet_order_id`))";
        if(!$mysqli->query($sql)){
            return false;
        }
        $sql = "CREATE TABLE IF NOT EXISTS `plant_order`(`plant_order_id` INT AUTO_INCREMENT,`total_amount` INT NOT NULL,`invoice_id` INT NOT NULL,PRIMARY KEY(`plant_order_id`),FOREIGN KEY(`invoice_id`) REFERENCES `invoice`(`invoice_id`))";
        if(!$mysqli->query($sql)){
            return false;
        }
        // $sql = "CREATE TABLE IF NOT EXISTS `plant_order_list` (
        //         `plant_order_list_id` INT AUTO_INCREMENT,
        //         `plant_order_id` INT NOT NULL,
        //         `plant_id` INT NOT NULL,
        //         PRIMARY KEY (`plant_order_list_id`),
        //         FOREIGN KEY (`plant_order_id`) REFERENCES `plant_order`(`plant_order_id`),
        //         FOREIGN KEY (`plant_id`) REFERENCES `plant`(`plant_id`))";
        // if(!$mysqli->query($sql)){
        //     return false;
        // }
        // $sql = "CREATE TABLE IF NOT EXISTS `flower_order_list`(`flower_order_list_id` INT AUTO_INCREMENT,`bouquet_id` INT NOT NULL,`order_id` INT NOT NULL,PRIMARY KEY(`flower_order_list_id`),FOREIGN KEY(`bouquet_id`) REFERENCES `bouquet`(`bouquet_id`),FOREIGN KEY(`order_id`) REFERENCES `order`(`order_id`))";
        // if(!$mysqli->query($sql)){
        //     return false;
        // }
        // $sql = "CREATE TABLE IF NOT EXISTS `bouquet_item`(`bouquet_item_id` INT AUTO_INCREMENT,`qty` INT NOT NULL,`bouquet_id` INT NOT NULL,`flower_id` INT NULL,PRIMARY KEY(`bouquet_item_id`),FOREIGN KEY(`bouquet_id`) REFERENCES `bouquet`(`bouquet_id`),FOREIGN KEY(`flower_id`) REFERENCES `flower`(`flower_id`))";
        // if(!$mysqli->query($sql)){
        //     return false;
        // }
        $sql = "CREATE TABLE IF NOT EXISTS `admin`(`id` INT AUTO_INCREMENT,`name` VARCHAR(45) NOT NULL,`email` VARCHAR(85) NOT NULL,`password` VARCHAR(225) NOT NULL,`role` INT NOT NULL,PRIMARY KEY(`admin_id`))";
        if(!$mysqli->query($sql)){
            return false;
        }
        return true;
    }