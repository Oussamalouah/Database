
<?php
include 'process.php';
error_reporting(0);
// INSERTING DATA INTO DATABASEe
if(isset($_POST['btn'])){
    $FirstName = $_POST['FirstName'];
    $LastName  = $_POST['LastName'];
    $date = $_POST['date'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];
    $function = $_POST['function'];
    $matricule = $_POST['matricule'];
    $target = "images/".basename($picture);
    $picture = $_FILES['picture']['name'];
    
    }
  if($_POST['FirstName']!="" and $_POST['LastName']!="" and $_POST['date']!="" and $_POST['department']!="" and $_POST['salary']!="" and $_POST['function']!="" and $_POST['matricule']!="" and $_FILES['picture']['name']!=""){
    $sql="insert into `data`(FirstName,LastName,date,department,salary,function,matricule,picture)values('$FirstName','$LastName','$date','$department','$salary','$function','$matricule','$picture')";
    $result= mysqli_query($mysqli,$sql);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div  id ="table" class="container my-5">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>registration number</th>
        <th>date</th>
        <th>department</th>
        <th>salary</th>
        <th>function</th>
        <th>Picture</th>
        <th>Actions</th>
      </tr>
    </thead>
    <!-- INSERTING DATA INTO TABLE -->
    <tbody>
      
      <?php
      $sql ="select * from `data`";
      $result = mysqli_query($mysqli,$sql);
      if ($result) {
       while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $FirstName = $row['FirstName'];
        $LastName  = $row['LastName'];
        $matricule = $row['matricule'];
        $date = $row['date'];
        $department = $row['department'];
        $salary = $row['salary'];
        $function = $row['function'];
        $picture = $row['picture'];
      	echo "<img src='images/".$row['picture']."' >";
        echo'
        <tr>
        <th scope="row">'.$id.'</th>
        <td>'.$FirstName.'</td>
        <td>'.$LastName.'</td>
        <td>'.$matricule.'</td>
        <td>'.$date.'</td>
        <td>'.$department.'</td>
        <td>'.$salary.'</td>
        <td>'.$function.'</td>
        <td>'.$picture.'</td>
        <td>
          <button type="button"  class ="upbtn"class="btn btn-primary"><a href="edit.php? editid='.$id.'"class="text-light"> 
            Edit
            </a></button> 
        
          <button type="button"  name ="delete"class="btn btn-danger"><a href="delete.php? deleteid='.$id.'"class ="text-light">
           Delete 
           </a></button>
        </td>
        </tr>';
       }
      }
     
      ?>

    </tbody>
  </table>

      </div>
      <form  class ='form'  method ="POST" action="php.php" enctype="multipart/form-data">
      <input type="text" name ="matricule" placeholder ="Enter your registration number">
      <input type="text" name ="FirstName" placeholder ="Enter your name">
      <input type="text" name ="LastName"placeholder ="Enter your LastName ">
      <input type="date" name ="date" placeholder="Enter you date of birth  ">
      <input type="text" name ="department"  placeholder ="Enter your department ">
      <input type="text" name ="salary" placeholder =" Enter your salary" >
      <input type="text" name ="function" placeholder =" Enter your function ">
      <input type="file" name ="picture" value =" ">
      <button type="submit" class ="button" name ="btn">Add</button>
      </form>
      </body>
      </html>