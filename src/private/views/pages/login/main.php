
    
<main class="form-signin">
  <form action="login" method="POST">
    <h1 class="h3 mb-3 fw-normal">Please Log in</h1>

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
    </div>
    <div class="form-floating">
     <?php echo isset($_SESSION['message'])?$_SESSION['message']:""; ?>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Log in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>
