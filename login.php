<?php session_start();?>    <!--البدأ الجلسة في الموقع  -->

<?php include('header.php') ?>
            <div class="jumbotron text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>
                                    <!--  الانتقال الى الصفحة الرئيسية-->
                                <span><a href="index.php" class="btn btn-success " style="float: left;">العوده للرئيسيه</a></span>
                           تسجيل دخول المشرف
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="container">
   
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 jumbotron">
                            <form action="login.php" method="post">
                              <div class="form-group">
                                 الاسم:<input type="text" class="form-control" name="user" placeholder=" ادخل الاسم" required>
                              </div>
                            <div class="form-group">
                                 كلمه المرور:<input type="password" class="form-control" name="password" placeholder="ادخل كلمه المرور" required>
                            </div>
                              <div class="form-group">
                                  <input type="submit" name="login" value="دخول" class="btn btn-success btn-block text-center" > 
                              </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            ##الاتصال بدالة الاتصال قبل عمل الدخول 
    include ('dbcon.php');
##الاتصال بجدول الدخول 
    if (isset($_POST['login'])) {
##ارسال القيم
        $user = $_POST['user'];
        $password = $_POST['password'];
        ##التخقق ما اذا كان اسم المستخدم المدخل متساوي مع الموجود بقاعدة البيانات 
        $qry = "SELECT * FROM admin WHERE username='$user' AND password='$password'";
        
        $run  = mysqli_query($conn, $qry);

       $row = mysqli_num_rows($run);
#اذا كان متساوي يقوم أعادة صح اذا لم يكن صحيح يعيد خطاء 
        if($row > 0) {
         $data = mysqli_fetch_assoc($run);
                    $id= $data['id'];
                    $_SESSION['uid'] = $id;
                    header('location:admin/admindash.php');

           
        } else {
      ?>             
    <script>
        alert('username or passoword invalid');
        window.open('login.php','_self');
    </script>
    <?php
                   
                }

}
?>

<?php include('footer.php') ?>

