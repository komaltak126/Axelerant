<?php
if(isset($_POST['submit']))
{
  $con = mysqli_connect("localhost","root","","db1") or die(mysql_error());
  $Author=$_POST["Author"];
  if($Author=='')
  {
  	echo "<script> alert('you havenot selected any Author') </script>";
  }
  else 
  {
  $querry="INSERT INTO axel VALUES ('$Author')";
  mysqli_query($con,$querry);
  }
 }
?>




<!DOCTYPE html>
<html>
<body>
<style> body { background-color: lightgreen } </style>

<h2>User's Input Record:-</h2>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db1";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  }
$sql = "SELECT authors FROM axel";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        echo  $row["authors"] ;
        echo "<br>";
    }
} 
else {echo "0 results";}
echo "<br>";
?>





<h2>Count of Individual Author:-</h2>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
  {
    die("Connection failed:- " . $conn->connect_error);
  }

$sql="SELECT * FROM axel where authors='Miguel de Cervantes'  ";

 if ($result=mysqli_query($conn,$sql))
   {
    // Return the number of rows in result set
    $rowcount1=mysqli_num_rows($result);
    printf("Miguel de Cervantes has been choosen- <b>[%d]</b> times.\n",$rowcount1);
    // Free result set
    mysqli_free_result($result);
   }echo"<br>";

$sql="SELECT * FROM axel where authors='Charles Dickens'  ";
  if ($result=mysqli_query($conn,$sql))
     {
      $rowcount2=mysqli_num_rows($result);
      printf("Charles Dickens has been choosen-  <b>[%d]</b> times.\n",$rowcount2);
      mysqli_free_result($result);
     }echo"<br>";

$sql="SELECT * FROM axel where authors='Antoine de Saint-Exuper'  ";
   if ($result=mysqli_query($conn,$sql))
    {
     $rowcount3=mysqli_num_rows($result);
     printf("Antoine de Saint-Exuper has been choosen- <b>[%d]</b> times.\n",$rowcount3);
     mysqli_free_result($result);
    }echo"<br>";

$sql="SELECT * FROM axel where authors='J.R.R. Tolkien'  ";
  if ($result=mysqli_query($conn,$sql))
    {
      $rowcount4=mysqli_num_rows($result);
      printf("J.R.R. Tolkien has been choosen- <b>[%d]</b> times.\n",$rowcount4);
      mysqli_free_result($result);
    }
mysqli_close($conn);
?><br><br>





<h2> Most selected Author:-</h2>
<?php 
$array = array($rowcount1,$rowcount2,$rowcount3,$rowcount4); 
if((max($array)==$rowcount1))
echo("Miguel de Cervantes = ". $rowcount1. " times");echo "<br>";

if((max($array)==$rowcount2))
echo("Charles Dickens = ". $rowcount2. " times");echo "<br>";

if((max($array)==$rowcount3))
echo("Antoine de Saint-Exuper = ". $rowcount3. " times");echo "<br>";

if((max($array)==$rowcount4))
echo("J.R.R. Tolkien = ". $rowcount4. " times");echo "<br>";
?><br><br><br><br><br>



</body>
</html>
