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
</style>

<html>
<body>

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

                          $sql = "SELECT task FROM my_tasks WHERE taskid='7'";
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

                          $sql = "SELECT duedate FROM my_tasks WHERE taskid='7'";
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
                    <td>
                    <form action="index.php">
                    <input type="submit" class="btn btn-danger" value="delete" /></td>
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




<?php include '../view/footer.php'; ?>



