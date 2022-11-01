<?php
session_start();
session_destroy();
echo "<script>alert('DO YOU WANT TO LOG OUT?');
      	window.location.href='index.php';</script>";
