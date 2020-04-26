<?php
include 'db.php';
include 'header.php';
$flag=0;
$update=0;
if(isset($_POST['submit']))
{
	$date=date("Y-m-d");
	$records=mysqli_query($conn,"SELECT * FROM attendance_records WHERE date='$date'");
	$num=mysqli_num_rows($records);
	if($num)
	{
	foreach($_POST['attendance_status'] as $id=>$attendance_status)
	{
		$student_name=$_POST['student_name'][$id];
		$roll_number=$_POST['roll_number'][$id];
		 
		 $result=mysqli_query($conn,"UPDATE attendance_records SET student_name='$student_name',roll_number='$roll_number',attendance_status='$attendance_status',date='$date' WHERE date='$date'");
		if($result)
		{
			$update=1;
		}
	}
	}
	else
	{		
	foreach($_POST['attendance_status'] as $id=>$attendance_status)
	{
		$student_name=$_POST['student_name'][$id];
		$roll_number=$_POST['roll_number'][$id];
		$date=date("Y-m-d");
		$result=mysqli_query($conn,"INSERT INTO attendance_records(student_name,roll_number,attendance_status,date)VALUES('$student_name','$roll_number','$attendance_status','$date')");
		if($result)
		{
			$flag=1;
		}
	}

	}
}
?>
<div class="panel panel-default"> 
	<div class="panel panel-heading">
	<h2>
<a class="btn btn-success" href="add.php">Add Students</a>
<a class="btn btn-info pull-right" href="view_all.php">View All</a>
	</h2>
	<?php if($flag)
{
 ?>
	<div class="alert alert-success"> 
		Attendance Date inserted successfully.
	</div>
<?php } ?>
<?php if($update)
{
?> 
	<div class="alert alert-success"> 
	Student Attendance Updated successfully.
	</div>
<?php
}
?>
	<h3><div class="well text-center">Date : <?php echo date("Y-m-d");
	?>
	</div></h3>
<div class="panel panel-body"> 
<form action="front.php" method="POST"> 
<table class="table table-striped"> 
<tr>
<th>#serial Number</th><th>Student Name</th><th>Roll Number</th><th>Attendance Status</th>
</tr>
<?php 
$result=mysqli_query($conn,"SELECT * FROM attendance");
$serialnumber=0;
$counter=0;
while($row=mysqli_fetch_array($result))
{
	$serialnumber++;
?>
<tr>
<td><?php echo $serialnumber ?></td>
<td><?php echo $row['student_name'];?>
<input type="hidden" name="student_name[]" value="<?php echo $row['student_name'];?>">
</td>
<td><?php echo $row['roll_number']; ?>
<input type="hidden" name="roll_number[]" value="<?php echo $row['roll_number'];?>">
</td>
<td>

<input type="radio" name="attendance_status[<?php echo $counter;?>]" value="Present" <?php if(isset($_POST['attendance_status'][$counter]) && $_POST['attendance_status'][$counter]=="Present")
{ 
echo "checked=checked";
}
 ?> required>Present
<input type="radio" name="attendance_status[<?php echo $counter;?>]" value="Absent" <?php if(isset($_POST['attendance_status'][$counter]) && $_POST['attendance_status'][$counter]=="Absent")
{ 
echo "checked=checked";
 }
 ?> required>Absent
</td>
</tr>
<?php
$counter++;
}
?>
</table>
<input type="submit" name="submit" value="submit" class="btn btn-primary">
</form>
</div>
</div>
</div>







