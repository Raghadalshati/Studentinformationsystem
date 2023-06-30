
<?php 
//انشاء الاتصال
$conn = mysqli_connect('localhost','root','','st');

//التحقق من الاتصال

if (!$conn) {
    echo "connection failed: " . mysqli_connect_error()."<br>";
    echo "connection error no: " . mysqli_connect_errno();

} else {
  
}



 ?>