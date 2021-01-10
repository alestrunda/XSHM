<?php
$cookie_login = "logged_in";
$cookie_random_param = "random_param_protection";

$is_logged_in = !!$_COOKIE[$cookie_login];
$is_random_param_protection = !!$_COOKIE[$cookie_random_param];

if(isset($_POST[$cookie_login])) {
  $cookie_duration = time() + 3600; //1hr
  $is_logged_in = $_POST[$cookie_login] === "true";
  $is_random_param_protection = $_POST[$cookie_random_param] === "true";
  setcookie($cookie_login, $is_logged_in ? 1 : 0, $cookie_duration, '/');
  setcookie($cookie_random_param, $is_random_param_protection ? 1 : 0, $cookie_duration, '/');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>

<body>
  <ul>
    <li><a href="/">home</a></li>
    <li><a href="/login/">login</a></li>
    <li><a href="/secret/">secret</a></li>
    <li><a href="/test1.html">test 1</a></li>
    <li><a href="/test2.html">test 2</a></li>
  </ul>
  <form method="post">
    <input type="hidden" name="logged_in" value="<?php echo $is_logged_in ? "false" : "true" ?>">
    <input
      type="checkbox"
      name="random_param_protection"
      value="true"
      <?php echo $is_random_param_protection ? "checked" : ""; ?>
    > Random param protection
    <br />
    <button type="submit"><?php echo $is_logged_in ? "Log out" : "Log in" ?></button>
  </form>
</body>
</html>
