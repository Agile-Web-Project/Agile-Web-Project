<?php
include ('includes/config.php');
session_start();
if(isset ($_POST['stu_usn']) and isset($_POST['stu_pass'])){
    if ($_POST['stu_usn']=='' or $_POST['stu_pass'] =='' ){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Please fill your username and password!\")
        window.location.href='login.php'
        </SCRIPT>");
    }
    else{
        $query= "SELECT * FROM STUDENT WHERE STU_USERNAME = '".$_POST['stu_usn']."' AND STU_PASSWORD ='".md5($_POST['stu_pass'])."'";

//    echo $query;
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result)){
            $_SESSION['username']= $_POST['stu_usn'];
            $_SESSION['student']= $_POST['stu_usn'];

            echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Log in successfully!!! Hello ".$_POST['stu_usn']."!\")
        window.location.href='index.php'
        </SCRIPT>");
        }
        else{

            echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Wrong username or password. Please check again!\")
        window.location.href='login.php'
        </SCRIPT>");
        }
    }




}

elseif (isset($_POST['emp_usn']) and isset($_POST['emp_pass'])) {

    if ($_POST['emp_usn'] == '' or $_POST['emp_pass'] == '') {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Please fill your username and password!\")
        window.location.href='login.php'
        </SCRIPT>");
    }
    else {
        $query = "SELECT * FROM COMPANY WHERE COMP_USERNAME = '" . $_POST['emp_usn'] . "' AND COMP_PASSWORD ='" . md5($_POST['emp_pass']) . "'";

        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)) {
            $_SESSION['username']= $_POST['emp_usn'];
            $_SESSION['employer']= $_POST['emp_usn'];
            echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Log in as an employer successfully!!! Hello ".$_POST['emp_usn']."!\")
        window.location.href='index.php'
        </SCRIPT>");

        } else {

            echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Wrong username or password. Please check again!\")
        window.location.href='login.php'
        </SCRIPT>");
        }

    }
}