<?php
include ('includes/config.php');
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);



/////// Edit profile information (AT THIS POINT: ONLY first name, last name, faculty, AND degree GET UPDATED) ///////
if(isset($_POST['fname']) and isset($_POST['lname']) and isset($_POST['faculty']) and isset($_POST['degree'])) // ETC
{
	if ($_POST['fname']=='' or $_POST['lname']=='')
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Please fill in the details\")
        window.location.href='profile.php'
        </SCRIPT>");
	}
	else
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$faculty = $_POST['faculty'];
		$degree = $_POST['degree'];
		$stu_username = $_SESSION['username'];
		
		$stmt = $conn->prepare("INSERT INTO STUDENT_INFO (FIRSTNAME, LASTNAME, FACULTY, DEGREE, REF_STUDENT) SELECT ?, ?, ?, ?, ID FROM STUDENT WHERE STU_USERNAME = ?");
		$stmt->bind_param("sssss", $fname, $lname, $faculty, $degree, $stu_username);
		
		if($stmt->execute()) // Creates new line in STUDENT_INFO for this user's details
		{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"Profile info added successfully!\")
			window.location.href='index.php'
			</SCRIPT>");
		}
		else // If new profile info doesn't get created, tries updating because an existing one might exist.
		{
			$stmt = $conn->prepare("UPDATE STUDENT_INFO SET FIRSTNAME = ?, LASTNAME = ?, FACULTY = ?, DEGREE = ? WHERE REF_STUDENT IN (SELECT ID FROM STUDENT WHERE STU_USERNAME = ?)");
			$stmt->bind_param("sssss", $fname, $lname, $faculty, $degree, $stu_username);
			
			if($stmt->execute())
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert(\"Profile edited successfully!\")
				window.location.href='index.php'
				</SCRIPT>");
			}
			else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert(\"Something went wrong!\")
				window.location.href='register.php'
				</SCRIPT>");
			}
			$stmt->close();
		}
	}
}

/////// Change password ///////
else if(isset($_POST['currentpasswd']) and isset($_POST['newpasswd']) and isset($_POST['newpasswdrepeat']))
{
	if ($_POST['currentpasswd']=='' or $_POST['newpasswd']=='' or $_POST['newpasswdrepeat']=='')
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Please fill in the details\")
        window.location.href='profile.php'
        </SCRIPT>");
	}
	else
	{
		if ($_POST['newpasswd'] != $_POST['newpasswdrepeat'])
		{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"New password not repeated correctly!\")
			window.location.href='profile.php'
			</SCRIPT>");
		}
		else
		{
			$currentpasswd = md5($_POST['currentpasswd']);
			$newpasswd = md5($_POST['newpasswd']);
			$stu_username = $_SESSION['username'];
			
			// Below: if 'currentpasswd' matches the current password in db, then change it into 'newpasswd'
			// If 'currentpasswd' doesn't match the one in db, the old one remains
			// PROBLEM: Javascript still says "Password changed!" even in that case
			$stmt = $conn->prepare("UPDATE STUDENT SET STU_PASSWORD = CASE 
				WHEN STU_PASSWORD = ? THEN ?
				ELSE STU_PASSWORD
				END WHERE STU_USERNAME = ?");
			$stmt->bind_param("sss", $currentpasswd, $newpasswd, $stu_username);
			// Possibly to add: get the password from db now. If it's still the same as $currentpasswd, say "password not changed"?
			if($stmt->execute())
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert(\"Password changed!\")
				window.location.href='index.php'
				</SCRIPT>");
			}
			else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert(\"Password couldn't be changed!\")
				window.location.href='register.php'
				</SCRIPT>");
			}
			$stmt->close();
		}
	}
}


/////// Change email address /////// unfinished
/*if(isset($_POST['currentemail']) and isset($_POST['newemail']) and isset($_POST['passwd']))
{
	if ($_POST['currentemail']=='' or $_POST['newemail']=='' or $_POST['passwd']=='')
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Please fill in the details\")
        window.location.href='profile.php'
        </SCRIPT>");
	}
	else
	{
		$currentemail = $_POST['currentemail'];
		$newemail = $_POST['newemail'];
		$passwd = md5($_POST['passwd']);
		$stu_username = $_SESSION['username'];
		
		$stmt = $conn->prepare("");
		$stmt->bind_param("sssss", $fname, $lname, $faculty, $degree, $stu_username);
		
		if($stmt->execute())
		{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"Email address changed!\")
			window.location.href='index.php'
			</SCRIPT>");
		}
		else
		{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"Email address couldn't be changed!\")
			window.location.href='profile.php'
			</SCRIPT>");
		}
		$stmt->close();
	}
}*/

/////// Delete profile /////// not finished
if (isset($_POST['passwdDel']))
{
	$passwdDel = md5($_POST['passwdDel']);
	$stu_username = $_SESSION['username'];
	
	$stmt = $conn->prepare("SELECT COUNT(*) as total FROM STUDENT WHERE STU_USERNAME = ? AND STU_PASSWORD = ?");
	$stmt->bind_param("ss", $stu_username, $passwdDel);
	$stmt->execute();
	
	$count = null;
	$stmt->bind_result($count);
	while ($stmt->fetch())
	{
		echo '<p style="display:none;">Found {$count} </p>';
	}
	if ($count == 1) // One username&password match found
	{
		$stmt = $conn->prepare("DELETE FROM STUDENT WHERE STU_USERNAME = ? AND STU_PASSWORD = ?");
		$stmt->bind_param("ss", $stu_username, $passwdDel);
		$stmt->execute();
		
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"Account deleted! Goodbye!\")
			window.location.href='index.php'
			</SCRIPT>");
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"Wrong password!\")
			window.location.href='profile.php'
			</SCRIPT>");
	}
}

?>