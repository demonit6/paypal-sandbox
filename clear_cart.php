<?php
session_start();
session_destroy();
echo "<script>";
echo "alert('all items have been deleted');";
echo "window.location='index.php';";
echo "</script>";