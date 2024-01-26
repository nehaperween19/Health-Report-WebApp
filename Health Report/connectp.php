<?php
$NAME=$_POST['NAME'];
$Date=$_POST['Date'];
$Month=$_POST['Month'];
$Year=$_POST['Year'];
$WEIGHT=$_POST['WEIGHT'];
$EMAIL=$_POST['EMAIL'];
$REPORT=$_POST['REPORT'];
if (isset($_POST['btn_img']))
{$con = mysqli_connect("localhost","root","","connectp");
 $filename=$_FILES["REPORT"]["name"];
 $tempfile=$_FILES["REPORT"]["tmp_name"];
 $folder="image/".$filename;
 $sql="INSERT INTO ('image') VALUES('$filename')";
 if($filename=="")
 {
    echo
    "
    <div class='alert alert-secondary' role='alert'>
        <h4 class='text-center'>Upload Report</h4>
    </div>";
 }else
 {
    $result= mysqli_query($con,$sql);
    move_uploaded_file($tempfile,$folder);
echo
" <div class='alert alert-success' role='alert'>
    <h4 class='text-center'>Uploaded</h4>
</div>
";}}
?>

<form action="connectp.php" class="form-control" enctype="multipart/form-data">
<input type="file" class="form-control" name="REPORT" id="">
<div class="col-6-m-auto">
<button type="submit" name="btn_img" class="btn btn-outline-success m-4">SUBMIT</button>
</div></form>
<table class="table">
    <tr>
        <th>id</th>
        <th>image</th>
        <th>button</th>
 </tr>

 <?php
 $conn=mysqli_connect("localhost","root","","connectp.php");
 $sql2="SELECT * FROM 'images' WHERE 1";
 $result2=mysqli_query($conn,$sql2);
 while($fetch=mysqli_fetch_assoc($result2))
 {
   echo
   "

   ";
   ?>
   <tr>
    <td><?php echo $fetch['id']?> </td>
    <td><img src="./image/<?php echo $fetch['image'] ?>" width=100px alt=""> </td>
    <td><a href="">Delete</a></td>
 </tr>
   <?php
 }

 ?>
 </table>
