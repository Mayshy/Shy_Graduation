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
        $sql = "SELECT * FROM student_data
        WHERE Student_ID = $ID  ";
        $result = $conn->query( $sql);
        $row = $result->fetch_assoc();
        if($row["Permission"] != 'Visitor')
            echo"<script>alert('您已发出申请或已有社团!');history.go(-1);</script>";
        else{
            $sql = "UPDATE student_data SET Permission =  'Waiting' ,Association_Name= '{$_POST['Association_Name']}'
            WHERE Student_ID = $ID and Permission = 'Visitor' ";
            $result = $conn->query( $sql);
            if ($result){
                echo"<script>alert('成功申请！请等待审核');history.go(-1);</script>";
            }
            else{
                echo"<script>alert('申请失败！详情请咨询管理员');history.go(-1);</script>";
            }
        }
       
    }

}
?>
