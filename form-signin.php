<form class="form-signin" method = "POST" action="login.php">
            <h2 class="form-signin-heading">请登录或注册！</h2>
            <label for="exampleInputName" class="sr-only" >学号</label>
            <input type="text" id="Student_ID" name="Student_ID" class="form-control"  placeholder="学号"  required autofocus>  
            <label for="inputPassword" class="sr-only">密码</label>
            <input type="password" id="Password" name ="Password" class="form-control" placeholder="密码" required>
            <div class="checkbox">
            <label>
            <input type="checkbox" value="remember-me" name="remember me"> 请记住我
            </label>
            </div>
            <botton class="btn btn-lg btn-primary btn-block" type="submit" name="submit">登录</button>
            </form>