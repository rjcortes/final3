<?php include '../view/header.php'; ?>

<?php

  require_once '../model/database.php';

  $query = 'SELECT * FROM my_tasks ORDER BY id';
  $statement = $db->prepare($query);
  $statement->execute();
  $results = $statement->fetchAll();
  $statement->closeCursor();


  $action = filter_input(INPUT_POST, 'action');
  if ($action == NULL) {
      $action = filter_input(INPUT_GET, 'action');
      if ($action == NULL) {
          $action = 'list_tasks';
      }
  }else if ($action == 'delete_product') {
      $product_id = filter_input(INPUT_POST, 'product_id', 
              FILTER_VALIDATE_INT);
      $category_id = filter_input(INPUT_POST, 'category_id', 
              FILTER_VALIDATE_INT);
      if ($category_id == NULL || $category_id == FALSE ||
              $product_id == NULL || $product_id == FALSE) {
          $error = "Missing or incorrect product id or category id.";
          include('../errors/error.php');
      } else { 
          delete_product($product_id);
          header("Location: .?category_id=$category_id");
      }
  } else if ($action == 'show_add_form') {
      $categories = get_categories();
      include('product_add.php');    
  } else if ($action == 'add_task') {
      $category_id = filter_input(INPUT_POST, 'category_id', 
              FILTER_VALIDATE_INT);
      $task = filter_input(INPUT_POST, 'task');
      $duedate = filter_input(INPUT_POST, 'duedate');
      if ($category_id == NULL || $category_id == FALSE || $code == NULL || 
              $name == NULL || $price == NULL || $price == FALSE) {
          $error = "Invalid product data. Check all fields and try again.";
          include('../errors/error.php');
      } else { 
          add_product($category_id, $code, $name, $price);
          header("Location: .?category_id=$category_id");
      }
  }    

    else if($action == "list_categories")
    {
      include('category_list.php');
    }
?>

<style>
  input[type=checkbox]:checked + label.strikethrough{
  text-decoration: line-through;
  }
  .todolist{
      background-color:#FFF;
      padding:20px 20px 10px 20px;
      margin-top:30px;
  }
  .todolist h1{
      margin:0;
      padding-bottom:20px;
      text-align:center;
  }
  .form-control{
      border-radius:0;
  }
  li.ui-state-default{
      background:#fff;
      border:none;
      border-bottom:1px solid #ddd;
  }

  li.ui-state-default:last-child{
      border-bottom:none;
  }

  .todo-footer{
      background-color:#F4FCE8;
      margin:0 -20px -10px -20px;
      padding: 10px 20px;
  }
  #done-items li{
      padding:10px 0;
      border-bottom:1px solid #ddd;
      text-decoration:line-through;
  }
  #done-items li:last-child{
      border-bottom:none;
  }
  #checkAll{
      margin-top:10px;
  }

  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #EEEEEE;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }  
  .jumbotron {
      background-color: #375c96;
      color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #375c96;
      font-size: 50px;
  }
  .logo {
      color: #375c96;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #375c96;
  }
  .carousel-indicators li {
      border-color: #375c96;
  }
  .carousel-indicators li.active {
      background-color: #375c96;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #375c96; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #375c96;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #375c96;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #375c96;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #375c96 !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #375c96;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
</style>

<html>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../account.php">ACCOUNT</a></li>
        <li><a href="#MyPage">MY TASKS</a></li>
      </ul>
    </div>
  </div>
</nav>

  <!-- Container (About Section) -->
  <div id="about" class="container-fluid">
    <div class="row">
      <div class="col-sm-8">
        <h1 style="color:black">Welcome
            <?php
              $servername = "sql2.njit.edu";
              $username = "rjc37";
              $password = "cosette2";
              $dbname = "rjc37";

              // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);
              // Check connection
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              } 

              $sql = "SELECT * FROM accounts where id='40'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {

              while($row = $result->fetch_assoc()) {
                echo $row["fname"]. " ". $row["lname"];
              }
              } else {
                echo "0 results";
              }

              $conn->close();
            ?>
        </h1>
      </div>
    </div>
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>My Tasks</h4>
          <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped" style="color:black;">
                <thead>
                  <th style="width:5%"><input type="checkbox" id="checkall" /></th>
                  <th style="width:65%">Task</th>
                  <th style="width:10%">Due Date</th>
                  <th style="width:10%">Edit</th>
                  <th style="width:10%">Delete</th>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="checkbox"  class="checkbox" name="packersOff" value="1" /></td>
                    <td>
                      <?php
                          $servername = "sql2.njit.edu";
                          $username = "rjc37";
                          $password = "cosette2";
                          $dbname = "rjc37"; 

                          // Create connection
                          $conn = new mysqli($servername, $username, $password, $dbname);
                          // Check connection
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          } 

                          $sql = "SELECT task FROM my_tasks WHERE taskid='1'";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo $row["task"];
                              }
                          } else {
                              echo "0 results";
                          }
                          $conn->close();
                        ?>
                    </td>
                    <td>
                      <?php
                          $servername = "sql2.njit.edu";
                          $username = "rjc37";
                          $password = "cosette2";
                          $dbname = "rjc37"; 

                          // Create connection
                          $conn = new mysqli($servername, $username, $password, $dbname);
                          // Check connection
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          } 

                          $sql = "SELECT duedate FROM my_tasks WHERE taskid='2'";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo $row["duedate"];
                              }
                          } else {
                              echo "0 results";
                          }
                          $conn->close();
                        ?>
                    </td>
                    <td><input type="submit" class="btn btn-danger" value="edit"/></td>
                    <td><input type="submit" class="btn btn-danger" value="delete"/></td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"  class="checkbox" name="packersOff" value="1" /></td>
                    <td>
                      <?php
                          $servername = "sql2.njit.edu";
                          $username = "rjc37";
                          $password = "cosette2";
                          $dbname = "rjc37"; 

                          // Create connection
                          $conn = new mysqli($servername, $username, $password, $dbname);
                          // Check connection
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          } 

                          $sql = "SELECT task FROM my_tasks WHERE taskid='2'";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo $row["task"];
                              }
                          } else {
                              echo "0 results";
                          }
                          $conn->close();
                        ?>
                    </td>
                    <td>
                      <?php
                          $servername = "sql2.njit.edu";
                          $username = "rjc37";
                          $password = "cosette2";
                          $dbname = "rjc37"; 

                          // Create connection
                          $conn = new mysqli($servername, $username, $password, $dbname);
                          // Check connection
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          } 

                          $sql = "SELECT duedate FROM my_tasks WHERE taskid='2'";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo $row["duedate"];
                              }
                          } else {
                              echo "0 results";
                          }
                          $conn->close();
                        ?>
                    </td>
                    <td><input type="submit" class="btn btn-danger" value="edit"/></td>
                    <td><input type="submit" class="btn btn-danger" value="delete"/></td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"  class="checkbox" name="packersOff" value="1" /></td>
                    <td>
                      <?php
                          $servername = "sql2.njit.edu";
                          $username = "rjc37";
                          $password = "cosette2";
                          $dbname = "rjc37"; 

                          // Create connection
                          $conn = new mysqli($servername, $username, $password, $dbname);
                          // Check connection
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          } 

                          $sql = "SELECT task FROM my_tasks WHERE taskid='3'";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo $row["task"];
                              }
                          } else {
                              echo "0 results";
                          }
                          $conn->close();
                        ?>
                    </td>
                    <td>
                      <?php
                          $servername = "sql2.njit.edu";
                          $username = "rjc37";
                          $password = "cosette2";
                          $dbname = "rjc37"; 

                          // Create connection
                          $conn = new mysqli($servername, $username, $password, $dbname);
                          // Check connection
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          } 

                          $sql = "SELECT duedate FROM my_tasks WHERE taskid='3'";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo $row["duedate"];
                              }
                          } else {
                              echo "0 results";
                          }
                          $conn->close();
                        ?>
                    </td>
                    <td><input type="submit" class="btn btn-danger" value="edit"/></td>
                    <td><input type="submit" class="btn btn-danger" value="delete"/></td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"  class="checkbox" name="packersOff" value="1" /></td>
                    <td>
                      <?php
                          $servername = "sql2.njit.edu";
                          $username = "rjc37";
                          $password = "cosette2";
                          $dbname = "rjc37"; 

                          // Create connection
                          $conn = new mysqli($servername, $username, $password, $dbname);
                          // Check connection
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          } 

                          $sql = "SELECT task FROM my_tasks WHERE taskid='4'";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo $row["task"];
                              }
                          } else {
                              echo "0 results";
                          }
                          $conn->close();
                        ?>
                    </td>
                    <td>
                      <?php
                          $servername = "sql2.njit.edu";
                          $username = "rjc37";
                          $password = "cosette2";
                          $dbname = "rjc37"; 

                          // Create connection
                          $conn = new mysqli($servername, $username, $password, $dbname);
                          // Check connection
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          } 

                          $sql = "SELECT duedate FROM my_tasks WHERE taskid='4'";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo $row["duedate"];
                              }
                          } else {
                              echo "0 results";
                          }
                          $conn->close();
                        ?>
                    </td>
                    <td><input type="submit" class="btn btn-danger" value="edit" action="" /></td>
                    <td><input type="submit" class="btn btn-danger" value="delete" action="addtask.php" /></td>
                  </tr>
                </tbody>
            </table>
            <form action="addtask.php">
            <input type="submit" value="Add New Task" class="btn btn-default" />
            </form>
          </div>
      </div>
    </div>
  </div>
</div>


<br><hr><br>

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>Completed Tasks</h4>
          <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped" style="color:black;">
                <thead>
                  <th style="width:5%"><input type="checkbox" id="checkall" /></th>
                  <th style="width:65%">Task</th>
                  <th style="width:20%">Due Date</th>
                  <th style="width:10%">Delete</th>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="checkbox"  class="checkbox" name="packersOff" value="1" /></td>
                    <td><span style='text-decoration:line-through; font-style: italic; color: #c1c1c1'>
                      <?php
                          $servername = "sql2.njit.edu";
                          $username = "rjc37";
                          $password = "cosette2";
                          $dbname = "rjc37"; 

                          // Create connection
                          $conn = new mysqli($servername, $username, $password, $dbname);
                          // Check connection
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          } 

                          $sql = "SELECT task FROM my_tasks WHERE taskid='4'";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo $row["task"];
                              }
                          } else {
                              echo "0 results";
                          }
                          $conn->close();
                        ?></span>
                    </td>
                    <td><span style='text-decoration:line-through; font-style: italic; color: #c1c1c1'>
                      <?php
                          $servername = "sql2.njit.edu";
                          $username = "rjc37";
                          $password = "cosette2";
                          $dbname = "rjc37"; 

                          // Create connection
                          $conn = new mysqli($servername, $username, $password, $dbname);
                          // Check connection
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          } 

                          $sql = "SELECT duedate FROM my_tasks WHERE taskid='4'";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo $row["duedate"];
                              }
                          } else {
                              echo "0 results";
                          }
                          $conn->close();
                        ?></span>
                    </td>
                    <td><input type="submit" class="btn btn-danger" value="edit" action="" /></td>
                    <td><input type="submit" class="btn btn-danger" value="delete" action="addtask.php" /></td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"  class="checkbox" name="packersOff" value="1" /></td>
                    <td><span style='text-decoration:line-through; font-style: italic; color: #c1c1c1'>
                      <?php
                          $servername = "sql2.njit.edu";
                          $username = "rjc37";
                          $password = "cosette2";
                          $dbname = "rjc37"; 

                          // Create connection
                          $conn = new mysqli($servername, $username, $password, $dbname);
                          // Check connection
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          } 

                          $sql = "SELECT task FROM my_tasks WHERE taskid='6'";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo $row["task"];
                              }
                          } else {
                              echo "0 results";
                          }
                          $conn->close();
                        ?></span>
                    </td>
                    <td><span style='text-decoration:line-through; font-style: italic; color: #c1c1c1'>
                      <?php
                          $servername = "sql2.njit.edu";
                          $username = "rjc37";
                          $password = "cosette2";
                          $dbname = "rjc37"; 

                          // Create connection
                          $conn = new mysqli($servername, $username, $password, $dbname);
                          // Check connection
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          } 

                          $sql = "SELECT duedate FROM my_tasks WHERE taskid='6'";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo $row["duedate"];
                              }
                          } else {
                              echo "0 results";
                          }
                          $conn->close();
                        ?></span>
                    </td>
                    <td><input type="submit" class="btn btn-danger" value="edit" action="" /></td>
                    <td><input type="submit" class="btn btn-danger" value="delete" action="addtask.php" /></td>
                  </tr>
                </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</div>




<!-- Imports
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>

Application
<div class="todo-container">
  <h1>Bootstrap Todo App</h1>
  <div class="add-todo-container row">
    <div class="col-xs-10">
      <input class="form-control" type="text" placeholder="new todo">
    </div>
    <div class="col-xs-2">
      <button class="btn btn-primary">Add</button>
    </div>
  </div>
  <ul class="list-group"></ul>
</div>
<div class="too-small"> This site does not support mobile. </div>

<style>
  .todo-container {
  width: 500px;
  margin: 5px auto;
  margin-top: 20px;
  }
  .add-todo-container {
    margin-bottom: 10px;
  }
  .add-todo-container .col-md-10 {
    padding: 0;
  }
  .add-todo-container .col-md-2 {
    padding-right: 0;
    text-align: right;
  }

  .too-small {
    display: none;
  }

  @media (max-width: 500px) {
    .todo-container {  
      display: none;
    }
    .too-small {
      display: block;
    }
  }
</style>


<script type="text/x-template">
  <li class="list-group-item row {{#if completed}}disabled{{/if}}">
    <div class="col-xs-1">
      <input type="checkbox" {{#if completed}}checked{{/if}}>
    </div>
    <div class="col-xs-10">{{title}}</div>
    <div class="col-xs-1">
      <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </li>
</script>

<script>
  // on document load
  $(function(){
  
  // Data Model
  var todos = [];
  
  // Application
  var template;
  var app = {
    init: function(){
      app.compileTemplates();
      app.render();
    },
    render: function(){
      // render the todos
      var todoHtml = _.map(todos, function(todo){
        return template(todo);
      });
      app.unbindEvents();
      $('ul.list-group').html(todoHtml.join(""));
      app.bindEvents();
    },
    compileTemplates: function(){
      template = $('[type="text/x-template"]');
      template = Handlebars.compile(template.first().html());
    },
    unbindEvents: function(){
      $('.list-group-item').off();
      $('.add-todo-container button').off();
      $('input[type="checkbox"]').off();
      $('.list-group-item button').off();
    },
    bindEvents: function(){
      app.bindHoverEvents();
      app.bindCheckboxEvents();
      app.bindAddTodoEvents();
      app.bindRemoveTodoEvents();
    },
    bindHoverEvents: function(){
      var $items = $('.list-group-item');
      $items.on('mouseover', function(event){
        $(this).addClass('list-group-item-success');
      });
      $items.on('mouseout', function(){
        $(this).removeClass('list-group-item-success');
      });
    },
    bindCheckboxEvents: function(){
      var $checkboxes = $('input[type="checkbox"]');
      $checkboxes.on('change', function(){
        var wasChecked = $(this).is(':checked');
        if (!wasChecked) {
          $(this).parent().parent().removeClass("disabled");
        } else {
          $(this).parent().parent().addClass("disabled");
        }
      });
    },
    bindAddTodoEvents: function(){
      var $container = $('.add-todo-container');
      $container.find('button').on('click', function(){
        var newTodoTitle = $container.find('input').val();
        if (_.isString(newTodoTitle) && newTodoTitle.length > 2) {
          var newTodoObject = { title: newTodoTitle, completed: false };
          todos.push(newTodoObject);
          $container.find('input').val("");
          app.render(); 
        }
      });
    },
    bindRemoveTodoEvents: function(){
      $('.list-group-item button').on('click', function(){
        var index = $(this).parent().parent().index();
        todos.splice(index, 1);
        app.render();
      });
    }
  };
  
  app.init();
  
  });
</script>  -->


<?php include '../view/footer.php'; ?>



