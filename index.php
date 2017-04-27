<?php include 'view/header.php'; ?>
<?php
require_once 'model/database.php';

$query = 'SELECT * FROM acounts ORDER BY id';
$statement = $db->prepare($query);
$statement->execute();
$results = $statement->fetchAll();
$statement->closeCursor();
?>



<html>
<body>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>Get Started</h2><br>
      <h4>To access your account, please enter your username and password and then click on the "Login" button. If you have not registered, enter your information and click on the "Sign Up" button to create an account.</h4>
      <br>
    </div>
  </div>
</div>
      

<hr>
<div class="container" style="color:black">
  <h2>Log In</h2>
  <form method="post" action="login_process.php" name="loginform" id="loginform">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
    <input type="submit" name="login" value="Login" class="btn btn-default">
  </form><br>
    </div>
  </div>
</div>

<div class="container">
  <h2>Create Account</h2>
  <form method="post" action="signup_process.php">
    <input type="submit" value="Create Account" class="btn btn-default">
  </form>
</div>


<!--
<div class="container">
  <h2>Sign Up</h2>
  <form method="post" action="signup_process.php">
    <div class="form-group">
      <label>Email:</label>
      <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label>Password:</label>
      <input type="text" name="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
    <input type="submit" value="Create Account" class="btn btn-default">
  </form>
</div> 
-->







<script>
  $(document).ready(function(){
    // Add smooth scrolling to all links in navbar + footer link
    $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 900, function(){
     
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
    
    $(window).scroll(function() {
      $(".slideanim").each(function(){
        var pos = $(this).offset().top;

        var winTop = $(window).scrollTop();
          if (pos < winTop + 600) {
            $(this).addClass("slide");
          }
      });
    });
  })
</script>


<?php include 'view/footer.php'; ?>

