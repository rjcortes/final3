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

            $sql = "SELECT * FROM accounts";
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
            !
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
                  <th><input type="checkbox" id="checkall" /></th>
                  <th>Task</th>
                  <th>Due Date</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="checkbox"  class="checkbox" name="packersOff" value="1" /></td>
                    <td><?php echo $task['task']; ?></td>
                    <td><?php echo $duedate['duedate']; ?></td>
                    <td><form action="update_product"><input type="submit" value="edit"/></td>
                    <td><form action="delete_product"><input type="submit" value="delete"/></td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"  class="checkbox" name="packersOff" value="1" /></td>
                    <td><?php echo $task['task']; ?></td>
                    <td><?php echo $duedate['duedate']; ?></td>
                    <td><form action="update_product"><input type="submit" value="edit"/></td>
                    <td><form action="delete_product"><input type="submit" value="delete"/></td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"  class="checkbox" name="packersOff" value="1" /></td>
                    <td><?php echo $task['task']; ?></td>
                    <td><?php echo $duedate['duedate']; ?></td>
                    <td><form action="update_product"><input type="submit" value="edit"/></td>
                    <td><form action="delete_product"><input type="submit" value="delete"/></td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"  class="checkbox" name="packersOff" value="1" /></td>
                    <td><?php echo $task['task']; ?></td>
                    <td><?php echo $duedate['duedate']; ?></td>
                    <td><form action="update_product"><input type="submit" value="edit"/></td>
                    <td><form action="delete_product"><input type="submit" value="delete"/></td>
                  </tr>
                </tbody>
            </table>
            <form method="post" class="add-new-task" action="add_task" autocomplete="off">
              <div class="input-group">
                <div class="input-group-btn">
                  <input type="submit" name="new-task" value="Add New Task" class="btn btn-danger"/>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>


<?php include '../view/footer.php'; ?>



