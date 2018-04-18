<?php 
$servername = "localhost";
$username = "root";
$password = "s7378360S";
$dbname = "association";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    echo"<script>alert('数据库连接失败！')</script>";
}else {
    if(isset($_POST["submit"]) ) 
    { 
        $name = $_POST["Name"];
        $user = $_POST["Student_ID"]; 
        $psw = $_POST["Password"]; 
        $psw_confirm = $_POST["Confirm"]; 
        $asso=$_POST["Association_Name"];
        if($user == "" || $psw == "" || $psw_confirm == "" || $name == "" || $asso="") 
        { 
            echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>"; 
        } 
        else 
        { 
            if($psw == $psw_confirm) 
            { 
               
                $sql = "select Student_ID from student_data where Student_ID =  '$_POST[Student_ID]'"; //SQL语句 
                $result = $conn->query( $sql);               
                if($result->num_rows == 1)    //如果已经存在该用户 
                { 
                    echo "<script>alert('用户名已存在'); history.go(-1);</script>"; 
                } 
                else    //不存在当前注册用户名称 
                {                   
                    $sql_insert = "insert into student_data (Student_ID,Password,Name,Sex,Association_Name)
                     values('$_POST[Student_ID]','$_POST[Password]','$_POST[Name]','$_POST[Sex]','$_POST[Association_Name]')"; 
                    $res_insert = $conn->query($sql_insert); 
                    //$num_insert = mysql_num_rows($res_insert); 
                    if($res_insert) 
                    { 
                        echo "<script>alert('注册成功！');history.go(-1); </script>"; 
                        
                    } 
                    else 
                    { 
                        echo "<script>alert('系统繁忙，请稍候！');history.go(-1); </script>"; 
                    } 
                    
                } 
            } 
            else 
            { 
                echo "<script>alert('密码不一致！'); history.go(-1);</script>"; 
            } 
        } 
    } 
    else 
    { 
        echo "<script>alert('提交未成功！'); history.go(-1);</script>"; 
    } 
}
?>
<!--
    为数据库添加信息
    需要验证：
    1重复密码
    2性别预选
    3Permission隐藏且默认
    4 Key:社团无法输入？
-->