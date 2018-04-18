<?php
session_start();
$ID = $_GET["Student_ID"];
$_SESSION["ID"]=$ID;
?>
<html lang="zh-cmn-Hans"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>学生信息</title>

   <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/dashboard.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="../../assets/js/ie-emulation-modes-warning.js"></script><style></style>

    <style id="style-1-cropbar-clipper">
       
        .en-markup-crop-options {
            top: 18px !important;
            left: 50% !important;
            margin-left: -100px !important;
            width: 200px !important;
            border: 2px rgba(255,255,255,.38) solid !important;
            border-radius: 4px !important;
        }

        .en-markup-crop-options div div:first-of-type {
            margin-left: 0px !important;
        }
</style></head>

  <body>
 
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a herf="#" class="navbar-brand">大学生社团管理系统</a>    
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
                    <li ><a href="student_data.php?Student_ID=<?php echo $_SESSION["ID"] ?>">个人信息</a></li>
                    <li class="active"><a href="manage_association.php?Student_ID=<?php echo $_SESSION["ID"] ?>">社团运营</a></li>
                    <li ><a href="search_actions.php?Student_ID=<?php echo $_SESSION["ID"] ?>">活动查询</a></li>
                    <li><a href="items.php?<?php echo $_SESSION["ID"] ?>">物品管理</a></li>
                    <li><a href="finance.php?<?php echo $_SESSION["ID"] ?>">财务公开</a></li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                      <li><a href="withdraw.php">注销</a></li> 
                </ul>
            </div>
           
                    
                   
                  </div>
                
            </div>
        </div>
    </nav>
        
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li ><a href="verify_stu.php?Student_ID=<?php echo $_SESSION["ID"] ?>">成员审核</a></li>
            <li class="active"><a href="verify_act.php?Student_ID=<?php echo $_SESSION["ID"] ?>">活动审核/发送通知</a></li>
            <li><a href="stu_table.php?Student_ID=<?php echo $_SESSION["ID"] ?>">学生表</a></li>
            <li ><a href=""></a></li>
            <li ><a href=""></a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="apply_asso.php?Student_ID=<?php echo $_SESSION["ID"] ?>">社团申请</a></li>
            <li><a href="apply_act.php?Student_ID=<?php echo $_SESSION["ID"] ?>">社团活动申请</a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
          </ul>
        </div>
    </div>
    
    
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="container">
              <form class="form-inline" action="load_verify_act.php?Student_ID=<?php echo $_SESSION["ID"] ?>" method="POST"> 
             <div class="input-group">       
             <label for="exampleInputName" class="sr-only">社团名</label>
                 <input type="text" name="Association_Action_ID" id="inputEmail" class="form-control" placeholder="社团活动编号" required="" autofocus="">
         </div>
         <label  >
                <input  type="radio" name="State" id="optionsRadios1" value="Active" checked>
                通过 </label>      
              <label  >
                <input  type="radio" name="State" id="optionsRadios2" value="Refuse">
                拒绝</label>
         <div class="input-group">
                 <button class="btn  btn-primary btn-block" type="submit" name="submit">审核</button> 
             </div>
             </form>
         </div>

    <h2 class="sub-header">社团活动通知</h2>
    <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>社团活动编号</th>
                  <th>社团名</th>
                  <th>社团活动内容</th>
                  <th>发布时间</th>
                  <th>状态</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                     $conn = new mysqli('localhost', 'root', 's7378360S', 'association');
                     if ($conn->connect_error){
                         echo "<script>alert('数据库连接失败！')</script>";
                     }
                     
                     $sql = "SELECT * FROM associations ,actions 
                     WHERE associations.Association_ID = actions.Association_ID ";
                     $result = $conn->query($sql);
                     while($row = $result->fetch_assoc()) {
                        echo "<td>".$row["Association_Action_ID"]."</td><td>".$row["Association_Name"]."</td><td>".$row["Association_Action_Content"]."</td><td>".$row["Year"]."/".$row["Month"]."/".$row["Day"]."</td><td>".$row["State"]."</td></tr>";                        
                    }
                     
                ?>
                
              </tbody>
            </table>
          </div>



  
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  

</body></html>

<!-- 
   注册登录/个人信息模块：
    缺少功能：注册、个人评论、消息通知
    业务逻辑疑问：消息是何种消息？
    mysqli_fetch_array() : 加上参数MYSQLI_NUM可以变成数字数组，即支持直接用数字下标操作
     if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $row["Comment_Content"];
                        }
                    } else {
                        echo "暂无消息！";
                    }    
-->