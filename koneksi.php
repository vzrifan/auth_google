<?php
$conn = mysqli_connect("localhost", "root", "", "auth_google");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>