<?php

  global $settings;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin · Blog</title>
    

    <!-- Bootstrap core CSS -->
    <link 
    href="<?php echo $settings['siteurl']; ?>/node_modules/bootstrap/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?php echo $settings['siteurl']; ?>/assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <main class="form-signin">
  <form action="" method="POST">
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

    <div class="form-floating">
      <input type="name" name="firstname" class="form-control" id="floatingInput" placeholder="name">
      <label for="floatingInput">firstname</label>
    </div>
    <div class="form-floating">
      <input type="name" name="lastname" class="form-control" id="floatingInput" placeholder="name">
      <label for="floatingInput">lastname</label>
    </div>
    
    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
      <div class="form-floating">
      <?php echo isset($_SESSION['message'])?$_SESSION['message']:''; ?>
    </div>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign up</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>
</body>
</html>