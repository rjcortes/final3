<?php include '../view/header.php'; ?>
<?php
require_once '../model/database.php';

$query = 'SELECT * FROM my_tasks ORDER BY id';
$statement = $db->prepare($query);
$statement->execute();
$results = $statement->fetchAll();
$statement->closeCursor();
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
      <h2>
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
      </h2>
      <h4>To access your account, please enter your username and password and then click on the "Login" button. If you have not registered, enter your information and click on the "Sign Up" button to create an account.</h4>
      <br>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<div class="container">
  <div class="row">
    
        
        <div class="col-md-12">
        <h4>Bootstrap Snipp for Datatable</h4>
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
    <td><input type="checkbox"  class="checkbox" name="packersOff" value="1" /></div></td>
    <td><div class="strikethrough">
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

        $sql = "SELECT * FROM my_tasks WHERE id='1'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          echo $row["task"]. "<br>";
        }
        } else {
          echo "0 results";
        }

        $conn->close();
        ?>
        </div>
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

        $sql = "SELECT * FROM my_tasks WHERE id='1'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          echo $row["duedate"]. "<br>";
        }
        } else {
          echo "0 results";
        }

        $conn->close();
        ?>
    </td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
 <tr>
    <td><input type="checkbox" class="checkthis" /></td>
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

        $sql = "SELECT * FROM my_tasks WHERE id='2'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          echo $row["task"]. "<br>";
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

        $sql = "SELECT * FROM my_tasks WHERE id='2'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          echo $row["duedate"]. "<br>";
        }
        } else {
          echo "0 results";
        }

        $conn->close();
        ?>
    </td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
    
 <tr>
    <td><input type="checkbox" class="checkthis" /></td>
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

        $sql = "SELECT * FROM my_tasks WHERE id='3'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          echo $row["task"]. "<br>";
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

        $sql = "SELECT * FROM my_tasks WHERE id='3'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          echo $row["duedate"]. "<br>";
        }
        } else {
          echo "0 results";
        }

        $conn->close();
        ?>
    </td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
    
    
 <tr>
    <td><input type="checkbox" class="checkthis" /></td>
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

        $sql = "SELECT * FROM my_tasks WHERE id='4'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          echo $row["task"]. "<br>";
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

        $sql = "SELECT * FROM my_tasks WHERE id='4'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          echo $row["duedate"]. "<br>";
        }
        } else {
          echo "0 results";
        }

        $conn->close();
        ?>
    </td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
    
 <tr>
    <td><input type="checkbox" class="checkthis" /></td>
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

        $sql = "SELECT * FROM my_tasks WHERE id='5'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          echo $row["task"]. "<br>";
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

        $sql = "SELECT * FROM my_tasks WHERE id='5'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          echo $row["duedate"]. "<br>";
        }
        } else {
          echo "0 results";
        }

        $conn->close();
        ?>
    </td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
   
    
   
    
    </tbody>
        
</table>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog" style="margin-top:20%;">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog" style="margin-top:20%;">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>



<form method="post" class="add-new-task" action="addtask.php" autocomplete="off">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Add New Task" required/>
      <div class="input-group-btn">
        <input type="submit" name="new-task" value="Add New Task" class="btn btn-danger"/>
      </div>
    </div>
  </form>








<script>
  $
  ("#sortable").sortable();
  $("#sortable").disableSelection();

  countTodos();

  // all done btn
  $("#checkAll").click(function(){
      AllDone();
  });

  //create todo
  $('.add-todo').on('keypress',function (e) {
        e.preventDefault
        if (e.which == 13) {
             if($(this).val() != ''){
             var todo = $(this).val();
              createTodo(todo); 
              countTodos();
             }else{
                 // some validation
             }
        }
  });
  // mark task as done
  $('.todolist').on('change','#sortable li input[type="checkbox"]',function(){
      if($(this).prop('checked')){
          var doneItem = $(this).parent().parent().find('label').text();
          $(this).parent().parent().parent().addClass('remove');
          done(doneItem);
          countTodos();
      }
  });

  //delete done task from "already done"
  $('.todolist').on('click','.remove-item',function(){
      removeItem(this);
  });

  // count tasks
  function countTodos(){
      var count = $("#sortable li").length;
      $('.count-todos').html(count);
  }

  //create task
  function createTodo(text){
      var markup = '<li class="ui-state-default"><div class="checkbox"><label><input type="checkbox" value="" />'+ text +'</label></div></li>';
      $('#sortable').append(markup);
      $('.add-todo').val('');
  }

  //mark task as done
  function done(doneItem){
      var done = doneItem;
      var markup = '<li>'+ done +'<button class="btn btn-default btn-xs pull-right  remove-item"><span class="glyphicon glyphicon-remove"></span></button></li>';
      $('#done-items').append(markup);
      $('.remove').remove();
  }

  //mark all tasks as done
  function AllDone(){
      var myArray = [];

      $('#sortable li').each( function() {
           myArray.push($(this).text());   
      });
      
      // add to done
      for (i = 0; i < myArray.length; i++) {
          $('#done-items').append('<li>' + myArray[i] + '<button class="btn btn-default btn-xs pull-right  remove-item"><span class="glyphicon glyphicon-remove"></span></button></li>');
      }
      
      // myArray
      $('#sortable li').remove();
      countTodos();
  }

  //remove done task from list
  function removeItem(element){
      $(element).parent().remove();
  }
</script>

<?php include '../view/footer.php'; ?>



