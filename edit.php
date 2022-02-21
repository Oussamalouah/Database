<?php  
error_reporting(0);
 $FirstName =$_POST['FirstName'];
 $LastName  =$_POST['LastName'];
 $date = $_POST['date'];
 $department = $_POST['department'];
 $salary = $_POST['salary'];
 $function = $_POST['function'];
 $matricule = $_POST['matricule'];
//  $picture = $_FILES['picture']['name'];
    ?>
<?php
include 'process.php';
error_reporting(0);
// INSERTING DATA INTO DATABASE
$id =$_GET['editid'];
$sql = "select * from `data` where id=$id";
$result= mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($result);
$FirstName = $row['FirstName'];
 $LastName  = $row['LastName'];
 $matricule = $row['matricule'];
 $date = $row['date'];
 $department = $row['department'];
 $salary = $row['salary'];
 $function = $row['function'];
//  $picture = $row['picture']['name'];
if(isset($_POST['btn'])){
    $FirstName = $_POST['FirstName'];
    $LastName  = $_POST['LastName'];
    $matricule = $_POST['matricule'];
    $date = $_POST['date'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];
    $function = $_POST['function'];
    // $picture = $_FILES['picture']['name'];
    }
  
  if($_POST['FirstName']!="" and $_POST['LastName']!="" and $_POST['date']!="" and $_POST['department']!="" and $_POST['salary']!="" and $_POST['function']!="" and $_POST['matricule']!=""){
    $sql="update  `data` set id=$id,FirstName= '$FirstName',LastName='$LastName',date='$date',department= '$department',salary='$salary',function='$function',matricule='$matricule'";
    $result= mysqli_query($mysqli,$sql);
    if($result){
        header('location:php.php');
    }else{
        die(mysqli_error($mysqli));
    }
  }
  
?>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<form  class ='edit'  method ="post">
<input type="text" name ="matricule"  value =<?php echo $matricule;?>>
<input type="text" name ="FirstName" value =<?php echo $FirstName;?>>
<input type="text" name ="LastName"value =<?php echo $LastName;?>>
<input type="date" name ="date" value =<?php echo $date;?>>
<input type="text" name ="department"  value =<?php echo $department;?>>
<input type="text" name ="salary" value =<?php echo $salary;?>>
<input type="text" name ="function" value =<?php echo $function;?>>
<button type="submit" id ='update' name ="btn">Update</button>
