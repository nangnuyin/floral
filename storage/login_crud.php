<?php

function login($mysqli)
{
    $sql = "SELECT * FROM `customer` WHERE customer_id = 1";
    return $mysqli->query($sql);

}

