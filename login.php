<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/style_login.css">
</head>

<body id="overlay">

    

  <div id="banner">
     <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Lahti_harbour_panorama_2.jpg/1280px-Lahti_harbour_panorama_2.jpg">
  </div>

<div class="container">
    <div class="student">
        <h1>Student </h1>
      <hr>
      <img class="btn-employer" src="https://cdn2.iconfinder.com/data/icons/employment-business-2/256/Businessman_and_globe-512.png" alt="Employer"> 
         <img class="btn-student active" src="https://image.freepik.com/freie-ikonen/graduierung_318-1944.jpg" alt="Student">
      
        <form  method="post" action="join.php">
<!--             <label for="stu_usn">Username:</label> -->
            <input type="text" id="username" name="stu_usn" placeholder="Username">
            <br>
            </br>
<!--             <label for="stu_pass">Password:</label> -->
            <input type="password" id="password" name="stu_pass" placeholder="Password">
            <br>
      
            <button class="btn-login" type="submit">Log in</button>
        
        </form>
    </div>
    <div class="employer">
        
      <h1>Employer </h1>
      <hr>
      <img class="btn-employer active" src="https://cdn2.iconfinder.com/data/icons/employment-business-2/256/Businessman_and_globe-512.png" alt="Employer"> 
         <img class="btn-student" src="https://image.freepik.com/freie-ikonen/graduierung_318-1944.jpg" alt="Student">
      
      
        <form method="post" action="join.php">
<!--             <label for="emp_usn">Username:</label> -->
            <input type="text" id="username" name="emp_usn" placeholder="UserName">
            <br>
            </br>
<!--             <label for="emp_pass">Password:</label> -->
            <input type="password" id="password" name="emp_pass" placeholder="Password">
            <br>
            <button class="btn-login" type="submit">Log in</a></button>
        </form>
    </div>
</div>
<p class="note">No account yet? <a href="register.php">Please Sign up!</a></p>
</div>    <!----------
      END CONTENT
  ---------->


  <!----------
      FOOTER
  ---------->
  <div id="footer">
    <div class="wrap-footer">
      
      <div class="icon-footer">
        <a href="http://twitter.com"><img src="https://scontent.fqlf1-1.fna.fbcdn.net/v/t31.0-8/16107559_1187504551298472_944696349571949426_o.jpg?oh=9ed56e3ae4bb0fe18ac3c822dc145489&oe=58D62496"></a>

        <a href="http://facebook.com"><img src="https://scontent.fqlf1-1.fna.fbcdn.net/v/t1.0-9/16174429_1187509204631340_6638727850405420560_n.jpg?oh=0777d1b25c6b166786e501b9e928b088&oe=5907F00D"></a>
      </div> <!--icon-footer -->
    
    
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
      </div><!-- For Job Seekers -->
      
    </div><!-- wrap footer -->
    
    
  </div>
<!----------
END FOOTER
---------->

<div class="mini-footer">
  Job Advertisement Project
</div>
  
  <script
  src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>
  <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/login.js" type="text/javascript" charset="utf-8"></script>
</body>
  


</html>