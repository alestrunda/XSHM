<?php
if(!isset($_COOKIE["logged_in"]) || $_COOKIE["logged_in"] === false) {
  $location = "Location: /login/" . (isset($_COOKIE["random_param_protection"]) ? "?rnd=" . rand() : "");
  header($location);
  die();
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Secret</title>
</head>

<body class="container">
  <p>Secret page available only after login. If not logged in, it redirects to login page.</p>
</body>
</html>
