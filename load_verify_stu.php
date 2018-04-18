<?php 
session_start();
$ID = $_GET["Student_ID"];
$_SESSION["ID"]=$ID;

$servername = "localhost";
$username = "root";
$password = "s7378360S";
$dbname = "association";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    echo"<script>alert('数据库连接失败！')</script>";
}else {
    if (isset($_POST['submit'])){
        
        if($_POST['Permission'] =='Common_User'){
            $sql = "UPDATE student_data SET Permission =  'Common_User' 
             WHERE Student_ID = $ID and Permission = 'Waiting' ";
            $result = $conn->query( $sql);
            if ($result){
                echo"<script>alert('审核学生通过！');history.go(-1);</script>";
            }
            else{
                echo"<script>alert('发生错误：未完成审核');history.go(-1);</script>";
            }
        }
        else if($_POST['Permission'] =='Visitor'){
            $sql = "UPDATE student_data SET Permission =  'Visitor' ,Association_Name= '无社团'
            WHERE Student_ID = $ID and Permission = 'Waiting' ";
            $result = $conn->query( $sql);
            if ($result){
               echo"<script>alert('已拒绝该学生！');history.go(-1);</script>";
            }
            else{
               echo"<script>alert('发生错误：未完成审核');history.go(-1);</script>";
            }   
        }
        
       
    }

}
?>
