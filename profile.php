<?php
include ('includes/config.php');
session_start();
?>
<!--
	TO-DO:
	-send inputted information to database via another .php file. Currently forms have placeholder action
	-check if the new password is repeated correctly

-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Student Profile</title>
    <link rel="stylesheet" href="css/style_profile.css" />
</head>

<body id="overlay">
    <!----------
      NAVIGATION
      ---------->

    <div id="nav">

        <!-----------
wrap-nav
------------->
        <div class="wrap-nav">
            <!--search-->
            <div class="search">
<a class="linkbutton" href="index.php">Home page</a>
                <!--<form action="http://google.com" />-->
                <input type="text" name="search" placeholder="Job...">
                <input type="text" name="search" placeholder="Location...">
                <input type="submit" value="Find" />
                <!--          Display username-->
                <span> <?php
              if (!isset($_SESSION['username'])){
                  echo 'Username will be displayed here after login';
              }
              else{
                  echo $_SESSION['username'];
              }
              ?>
          </span>
                <!--          /Display username-->
            </div>

            <!--END --search-->


            <!--Login -->
            <div class="login">
                <ul>
                    <?php
		if (isset($_SESSION['employer'])){ ?>
                        <li><a class="linkbutton" href="postad.php">Post a Job</a></li>
                        <?php } ?>

                        <?php
		if (isset($_SESSION['student'])){ ?>
                            <li><a class="linkbutton" href="profile.php">Profile</a></li>
                            <?php } ?>
                            <li>
                                <li>
                                    <!--              log in log out-->
                                    <?php

              if (!isset($_SESSION['username'])){
                 echo '<a class="linkbutton" href="login.php">Login</a>';
              }
              else{
                  echo '<a class="linkbutton" href="logout.php">Logout</a>';
              }
              ?>




                                        <!--              /log in log out-->

                                </li>
                                <li><a class="linkbutton" href="register.php">Register</a></li>
                </ul>
            </div>
            <!--END login-->
        </div>
        <!-- END wrap-nav -->
    </div>
    <!--END NAV -->

    <!----------
      CONTAINER
      ---------->

    <div id="container" >

        <!----------
      CONTAINER
      ---------->
        <div class="nav2">
            <?php
            if (!isset($_SESSION['username']) ||isset($_SESSION['employer']) ){
                echo "This page is for students only.";
            }
            else if(isset($_SESSION['student'])) {


                ?>
                <div>
                    <ul>
                        <li><button onClick="editProfile()">Edit Profile</button></li>
                        <li><button onClick="editAccount()">Edit Account</button></li>
                    </ul>
                </div>
        </div>
        <!----------
      SIDE-NAV
  ---------->
        <div id="side-nav">



        </div>


        <!----------
      END SIDE-NAV
  ---------->

        <!----------
      CONTENT
  ---------->
        <div id="content">
            <div class="contentbox" id="profilebox">
                <form id="infoform" method="post" action="profileedit.php">
                    <h2>Edit profile information</h2>
                    <table class="profileinfo">
                        <tr>
                            <td>First name </td>
                            <td> <input type="text" name="fname" required="required" /></td>
                        </tr>
                        <tr>
                            <td>Last name </td>
                            <td> <input type="text" name="lname" required="required" /></td>
                        </tr>
                        <tr>
                            <td>Faculty </td>
                            <td><select name="faculty">
									<option value="Faculty of Business">Faculty of Business</option>
									<option value="Faculty of Technology">Faculty of Technology</option>
									<option value="Faculty of Healthcare">Faculty of Healthcare</option>
									<option value="Faculty of Arts">Faculty of Arts</option>
									<option value="Faculty of Humanities">Faculty of Humanities</option>
							</select></td>
                        </tr>
                        <tr>
                            <td>Degree </td>
                            <td> <input type="radio" name="degree" value="bachelor" required="required" /> Bachelor's degree </td>
                        </tr>
                        <tr>
                            <td rowspan="2"></td>
                            <td> <input type="radio" name="degree" value="master" required="required" /> Master's degree </td>
                        </tr>
                        <tr>
                            <td> <input type="radio" name="degree" value="doctorate" required="required" /> Doctorate </td>
                        </tr>
                        <tr>
                            <td rowspan="3">Language skills </td>
                            <td> <input type="checkbox" name="english" /> English </td>
                        </tr>
                        <tr>
                            <td> <input type="checkbox" name="finnish" /> Finnish </td>
                        </tr>
                        <tr>
                            <td> <input type="checkbox" name="swedish" /> Swedish </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> <button type="submit" value="Submit">Submit</button><button type="reset" value="Reset">Cancel</button </td>
				</tr>
			</table>
		</form>
	</div>

	<div class="contentbox" id="accountbox">
		<h2>Change password</h2>
		<form id="passwordform" method="post" action="profileedit.php">
			<table class="profileinfo">
				<tr>
						<td>Current password </td>	<td><input type="password" name="currentpasswd" required="required" /></td>
				</tr>
				<tr>
						<td>New password </td>	<td><input type="password" name="newpasswd" required="required" /></td>
				</tr>
				<tr>
						<td>Repeat new password </td>	<td><input type="password" name="newpasswdrepeat" required="required" /></td>
				</tr>
				<tr>
						<td></td> <td><button type="submit" value="Submit">Submit</button> <button type="reset" value="Reset">Cancel</button></td>
                        </tr>
                    </table>
                </form>

                <h2>Change email address</h2>
                <form id="emailform" method="post" action="profileedit.php">
                    <table class="profileinfo">
                        <tr>
                            <td>Current email address </td>
                            <td><input type="text" name="currentemail" required="required" /></td>
                        </tr>
                        <tr>
                            <td>New email address </td>
                            <td><input type="text" name="newemail" required="required" /></td>
                        </tr>
                        <tr>
                            <td>Current password </td>
                            <td><input type="password" name="passwd" required="required" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" value="Submit">Submit</button> <button type="reset" value="Reset">Cancel</button></td>
                        </tr>
                    </table>
                </form>
<button id="profiledelete" onClick="profileDelete()">Delete Profile</button>
            </div>
	<div class="contentbox" id="deletebox">
		<h2>Are you sure you want to delete your profile?</h2>
		<form id="deleteform" method="post" action="profileedit.php">
				<table class="profileinfo">
					<tr>
						<td>Password:</td>
						<td><input type="password" name="passwdDel" required="required" /></td>
					</tr>
						<td></td>
						<td><button type="submit" value="Delete">Delete Profile</button></td>
				</table>
		</form>
	</div>
            <?php
            }
            ?>
        </div>
        <!----------
      END CONTENT
  ---------->

    </div>
    <!----------
      END CONTAINER
  ---------->

    <!----------
      FOOTER
  ---------->
    <div id="footer">
        <div class="wrap-footer">

            <div class="icon-footer">
                <a href="http://twitter.com"><img src="https://scontent.fqlf1-1.fna.fbcdn.net/v/t31.0-8/16107559_1187504551298472_944696349571949426_o.jpg?oh=9ed56e3ae4bb0fe18ac3c822dc145489&oe=58D62496"></a>

                <a href="http://facebook.com"><img src="https://scontent.fqlf1-1.fna.fbcdn.net/v/t1.0-9/16174429_1187509204631340_6638727850405420560_n.jpg?oh=0777d1b25c6b166786e501b9e928b088&oe=5907F00D"></a>
            </div>
            <!--icon-footer -->


            <div class="About-us">
                <p>
                    <a href="aboutus.html">About us</a>
                </p>
                <hr>

                <ul>
                    <li><a href="http://codepen.io/vongmaianh170196/pen/apWWbq">What we do</a></li>
                    <li><a href="#">Team members</a></li>
                    <li><a href="#">What we do</a></li>
                </ul>
            </div>
            <!--About-us -->

            <div>
                <p>
                    For Companies
                </p>
                <hr>

                <ul>
                    <li><a href="#">What we do</a></li>
                    <li><a href="#">Team members</a></li>
                    <li><a href="#">What we do</a></li>
                </ul>
            </div>
            <!--  For Companies -->

            <div>
                <p>
                    For Job Seekers
                </p>
                <hr>

                <ul>
                    <li><a href="#">What we do</a></li>
                    <li><a href="#">Team members</a></li>
                    <li><a href="#">What we do</a></li>
                </ul>
            </div>
            <!-- For Job Seekers -->

        </div>
        <!-- wrap footer -->


    </div>
    <!----------
END FOOTER
---------->

    <div class="mini-footer">
        Job Advertisement Project
    </div>


    <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/app.js" type="text/javascript" charset="utf-8"></script>

    <script src="js/index.js"></script>
    <script src="js/profile.js"></script>

</body>

</html>