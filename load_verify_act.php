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
        
        if($_POST['State'] =='Active'){
            $sql = "UPDATE actions SET State =  'Active' 
             WHERE Association_Action_ID = {$_POST['Association_Action_ID']}   ";
            $result = $conn->query( $sql);
            if ($result){
                echo"<script>alert('审核活动通过！');history.go(-1);</script>";
            }
            else{
                echo"<script>alert('发生错误：未完成审核');history.go(-1);</script>";
            }
        }
        else if($_POST['State'] =='Refuse'){
            $sql = "UPDATE actions SET State =  'Refuse' 
            WHERE Association_Action_ID = {$_POST['Association_Action_ID']}   ";
            $result = $conn->query( $sql);
            if ($result){
               echo"<script>alert('已拒绝该活动！');history.go(-1);</script>";
            }
            else{
               echo"<script>alert('发生错误：未完成审核');history.go(-1);</script>";
            }   
        }
        
       
    }

}
?>
