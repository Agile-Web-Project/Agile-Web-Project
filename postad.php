<?php
include ('includes/config.php');
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/postad.css">

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
<!--
        <div class="search">
            <form action="postad.php" />
            <input type="text" name="search" placeholder="Job...">
            <input type="text" name="search" placeholder="Location...">
            <input type="submit" value="Find" />
-->
        </div>
        <!--END --search-->
        <!--Login -->
        <div class="login">
            <ul>
                <li><a href="#">Welcome Name</a></li>
                <li class="sign-out"><a href="#">Sign Out</a></li>
            </ul>
        </div>
        <!--END login-->
    </div>
    <!-- END wrap-nav -->
</div>
<!--END NAV -->



<div id="banner">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Lahti_harbour_panorama_2.jpg/1280px-Lahti_harbour_panorama_2.jpg">
</div>

<!----------
  CONTAINER
  ---------->

<div id="container">

    <!----------
  CONTAINER
  ---------->
    <div class="nav2">
        <!--nav2 -->
        <div>
            <?php
            if (!isset($_SESSION['username']) ||isset($_SESSION['student']) ){
                echo "Sorry You cannot access to this section. This is for employer only";
            }
            else if(isset($_SESSION['employer'])) {


                ?>

                <form action="ad.php" method="post">
                    <h1>POST A JOB</h1>
                    <br>
                    <br>
                    <br>
<!--

                    <label for="postDate"><h2>Publish date:</h2></label>
                    <input type="datetime-local" name="postDate">
-->

                    <label for="deadLine"><h2>Deadline:</h2></label>
                    <input type="date" name="deadLine">

                    <label for="title"><h2>Title:</h2></label>
                    <input type="text" name="title">

                    <label for="jobDescription"><h2>Job Description</h2></label>
                    <textarea id="" name="jobDescription" rows="20" cols="90"  placeholder="Your description...">
</textarea>

                    <label for="contact"><h2>Contact</h2></label>
<!--                    <input type="email" name="email">-->
<!--                    <input type="phone" name="phone">-->
                    <input type="text" name="contact">

                    <label for="numberOfVaccancies"><h2>Number of vaccancies (Optional)</h2></label>
                    <input type="number" name="numberOfVaccancies">

                    <label for="furtherInformation"><h2>Further information (Optional)</h2>
                        <p class="optional">Optional</p></label>
                    <textarea id="" name="furtherInformation" rows="20" cols="90"
                              placeholder="Further information...">
</textarea>

                    <button id="submitAPost" type="submit">Submit</button>
                </form>

                <?php
            }
            ?>



        </div>
    </div>
    <!--end nav2 -->



</div>
</div>

</div>
<!----------
  END CONTENT
---------->





</div>
<!----------
  CONTAINER
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
                About us
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
</body>



</html>
