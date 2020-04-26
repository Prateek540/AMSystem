<?php
include 'header.php';
include 'db.php';
?>
<div class="panel panel-default"> 
	<div class="panel panel-heading">
	<h2>
<a class="btn btn-success" href="add.php">Add Students</a>
<a class="btn btn-info pull-right" href="front.php">Back</a>
	</h2>
<div class="panel panel-body"> 
<table class="table table-striped"> 
<tr>
<th>#Serial No.</th><th>Dates</th><th>Show Attendance</th>
</tr>
<?php 
$result=mysqli_query($conn,"SELECT DISTINCT date FROM attendance_records");
$serialnumber=0;
while($row=mysqli_fetch_array($result))
{
	$serialnumber++;
?>
<tr>
<td><?php echo $serialnumber ?></td>
<td><?php echo $row['date'];?></td>
<td> 
<form action="show_attendance.php" method="POST"> 
<input type="hidden" name="date" value="<?php echo $row['date']?>">
<input type="submit" name="" class="btn btn-primary" value="Show Attendance">
</form>
</td>
<input type="hidden" name="student_name[]" value="<?php echo $row['student_name'];?>">
</tr>
<?php
}
?>
</table>
</form>
</div>
</div>
</div>