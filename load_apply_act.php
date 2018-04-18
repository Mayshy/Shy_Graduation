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
        $Year = date("Y");
        $Month = date("m");
        $Day = date("d");
        
        $sql = "SELECT Association_ID FROM associations as X, student_data as Y
        WHERE X.Association_Name = Y.Association_Name and Student_ID = $ID ";
        $result = $conn->query($sql);
        $row1=$result->fetch_assoc();
        $Association_ID=$row1['Association_ID'];
        $sql = "INSERT INTO actions (Association_ID,Association_Action_Content,State,Year,Month,Day)
        values('$Association_ID','{$_POST["Association_Action_Content"]}','Waiting','$Year','$Month','$Day')  ";
        $result = $conn->query( $sql);
        if ($result){
            echo"<script>alert('成功申请！请等待审核');history.go(-1);</script>";
        }
        else{
            echo"<script>alert('申请失败！详情请咨询管理员');history.go(-1);</script>";
        }
       
    }

}
?>
