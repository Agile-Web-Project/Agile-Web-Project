<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 04/03/2017
 * Time: 16.29
 */
include ('includes/config.php');
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
$query= "SELECT * FROM `ADVERTISEMENT` WHERE DEADLINE > NOW()";

$result = mysqli_query($conn,$query);


while($row = mysqli_fetch_array($result))
{
    $value = $row['TITLE'];

    echo "<div class=\"advertisement\">

          <a href=\"#\">
            <h1>".$value."</h1>
          </a>

          <p>Location: Across all offices </p>
          <p>Application deadline: ". finnish_dateformat($row['DEADLINE'])."</p>
          <p>Requirement: ".$row['REQUIREMENT']."</p>
          <p>Futher Info : ".$row['FURTHER_INFO']."</p>


        </div>
      </div>";
}

