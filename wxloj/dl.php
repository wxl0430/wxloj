<html>
<head><title>wxloj | 登录</title></head><?php include "head.php";?>
    
    <body class="jb">
        <form action="dljg.php" method="post">
            <div class="card7">
                
                <div style="width: 100%; height: 2%"></div>
                <h2>登录</h2>
                <div style="width: 100%; height: 12%"></div>
                <div style="width: 100%; height: 10%">
                    账号：
                    <input style="width: 80%; height: 100%"  data-v-66fcc50b="" type="text" placeholder="" name="name"><br>
                </div>
                <div style="width: 100%; height: 5%"></div>
                <div style="width: 100%; height: 10%">
                    密码：
                    <input style="width: 80%; height: 100%"  data-v-66fcc50b="" type="password" placeholder="" name="password"><br>
                </div>
                <div style="width: 100%; height: 5%;"></div>
                <div style="width: 100%; height: 10%">
                    有效期：
                    <select style="width: 75%; height: 100%" name="keep">
                    <option value="1min">1分钟(临时登录)</option>
                    <option value="5min">5分钟(临时登录)</option>
                    <option value="30min">30分钟</option>
                    <option value="1h">1小时(推荐)</option>
                    <option value="2h" selected>2小时(推荐)</option>
                    <option value="3h">3小时(推荐)</option>
                    <option value="5h">5小时(推荐)</option>
                    <option value="12h">12小时</option>
                    <option value="18h">18小时</option>
                    <option value="1d">1天</option>
                    <option value="2d">2天</option>
                    <option value="5d">5天</option>
                    <option value="7d">7天(长期登录)</option>
                    <option value="14d">14天(长期登录)</option>
                    <option value="21d">21天(长期登录)</option>
                    <option value="30d">30天(长期登录)</option>
                    </select>
                </div>
                <div style="width: 100%; height: 5%;"></div>
                <div style="width: 100%; height: 10%;text-align: left;">
                    没有账号?
                    <a style="text-align: left;" href="\zc.php">注册</a>
                    一个
                </div>
                <!-- <input data-v-66fcc50b="" type="password" placeholder="请输入密码" name="password"><br> -->
                <div class="zj1"> <input type="submit" class="ebutton" value="登录"></div></div>
            </div>
        </form>
    </body>
</html> 