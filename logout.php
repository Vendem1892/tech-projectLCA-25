<?php
session_start();
session_destroy();
echo "<h1>Thanks for using the system. You have been logged out.</h1>
<br>
<h3>Returning to login page in 10 seconds.</h3>";

header("refresh:10; url=index.php");

?>