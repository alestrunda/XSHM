<?php
$cookie_login = "logged_in";
$cookie_random_param = "random_param_protection";

$is_logged_in = @!!$_COOKIE[$cookie_login];
$is_random_param_protection = @!!$_COOKIE[$cookie_random_param];

if(isset($_POST[$cookie_login])) {
  $cookie_duration = time() + 3600; //1hr
  $is_logged_in = $_POST[$cookie_login] === "true";
  $is_random_param_protection = !!$_POST[$cookie_random_param];
  setcookie($cookie_login, $is_logged_in ? 1 : 0, $cookie_duration, '/');
  setcookie($cookie_random_param, $is_random_param_protection ? 1 : 0, $cookie_duration, '/');
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Login</title>
</head>

<body class="container">
  <ul class="nav">
    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="/login/">Login page</a></li>
    <li class="nav-item"><a class="nav-link" href="/secret/">Secret page</a></li>
    <li class="nav-item"><a class="nav-link" href="/test1.html">Test 1</a></li>
    <li class="nav-item"><a class="nav-link" href="/test2.html">Test 2</a></li>
  </ul>

  <hr />

  <form method="post">
    <input type="hidden" name="logged_in" value="<?php echo $is_logged_in ? "false" : "true" ?>">

    <div class="form-check mb-2">
      <input
        id="random_param_protection"
        class="form-check-input"
        type="checkbox"
        name="random_param_protection"
        value="true"
        <?php echo $is_random_param_protection ? "checked" : ""; ?>
      >
      <label class="form-check-label" for="random_param_protection">
        Protection by adding random url parameter
      </label>
    </div>
    <button class="btn btn-<?php echo $is_logged_in ? "dark" : "primary" ?>" type="submit"><?php echo $is_logged_in ? "Log out" : "Log in" ?></button>
  </form>
</body>
</html>
