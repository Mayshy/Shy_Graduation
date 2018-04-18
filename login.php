<?php 
$servername = "localhost";
$username = "root";
$password = "s7378360S";
$dbname = "association";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    echo"<script>alert('数据库连接失败！')</script>";
}else {
    if (isset($_POST['submit'])){

        $sql = "select * from student_data where Student_ID = '{$_POST['Student_ID']}' and Password = '{$_POST['Password']}'";
        $result = $conn->query( $sql);

        if ($result->num_rows == 1){
            header("Location:manage_association.php?Student_ID='{$_POST['Student_ID']}'");
        }
        else{
            echo"<script>alert('学号或密码错误！')</script>";
        }
    }
    else{
        echo"<script>alert('数据未提交！')</script>";
    }
}
?>
