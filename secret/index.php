<?php
if(!$_COOKIE["logged_in"]) {
    $location = "Location: /login/" . ($_COOKIE["random_param_protection"] ? "?rnd=" . rand() : "");
    header($location);
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Secret</title>
</head>

<body>
    <p>Secret page</p>
</body>
</html>
