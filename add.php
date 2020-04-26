<?php
include 'header.php';
include 'db.php';
$flag=0;
if(isset($_POST['submit']))
{
	$result=mysqli_query($conn,"INSERT INTO attendance(student_name,roll_number)VALUES('$_POST[name]','$_POST[roll]')");
if ($result)
 {
	$flag=1;	
}
}
?>
<div class="panel panel-default"> 
<?php if($flag) {
  ?>
	<div class="alert alert-success"><strong>Success</strong>Attendance data inserted</div>
<?php } ?>
<div class="panel-heading"> 
	<h2>
<a href="add.php" class="btn btn-success">Add Student</a>
<a href="front.php" class="btn btn-info pull-right">Back</a>
</h2>
</div>
<div class="panel-body"> 
<form action="add.php" method="POST"> 
 <div class="form-group"> 
<label for="name">Student Name</label>
<input type="text" name="name" id="name" class="form-control" required>
 </div>
 <div class="form-group"> 
<label for="roll">Roll No.</label>
<input type="text" name="roll" id="roll" class="form-control" required>
 </div>
  <div class="form-group">
  	<input type="submit" name="submit" value="submit" class="btn btn-primary" required>
 </div>
</form>
</div>
</div>