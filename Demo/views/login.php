<?php
session_start();
include('includes/header.php');
include('../config/dbcon.php');

  if(isset($_COOKIE['email'])&& isset($_COOKIE['password'])){
    $email = $_COOKIE['email'];
 	  $password = $_COOKIE['password'];
}


if (isset($_SESSION['auth'])) {
  header('Location: ../views/home/index.php');
}
?> 


<html>

  <body>

<section class="vh-100" style="background-image: url(../assets/dist/img/wallpaperflare.com_wallpaper\ \(30\).jpg); background-repeat: no-repeat; height: 100%; background-size: cover">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="../assets/dist/img/login.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;width: 100%; height: 100%; "/>
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="../functions/authcode.php" method="post" >
                  <div class="col-md-12">
                    <?php 
                      include('../functions/message.php');
                    ?>
                  </div>

                  <div class=" text-center mb-4 pb-1">
                    <span class="h1 fw-bold mb-0" style="color: #744CA4;;">SIGN IN</span>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example17" style="font-weight: 100; color:#744CA4;">Email address</label>
                    <input type="email" id="form2Example17" 
                      name="email" class="form-control form-control-lg" placeholder="user email" value="<?php
                       if(isset($email)) {echo $email; } ?>" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example27" style="font-weight: 100; color:#744CA4;">Password</label>
                    <input type="password" id="form2Example27" value="<?php if(isset($password)) {echo $password; }  else {echo "";} ?>" name="password" class="form-control form-control-lg" placeholder="password"/>
                  </div>
                <label for="remember_me">
                  <input type="checkbox" id="remember_me" name="remember_me"> Remember Me
                </label>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit" style="background-color:#744CA4;; border:#744CA4;">LOGIN</button>
                  </div>

                  <a class="small text-muted" href="#!" style="color:#744CA4;">Forgot password?</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </body>
</html>