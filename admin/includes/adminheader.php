<?php include('connection.php');
session_start()

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - <?php echo $_SESSION['username']; ?></title>
    <link rel="icon" type="image/png" href="../img/vimeo.png">

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/sb-admin-rtl.css">
	<link href="../assets/css/sb-admin.css" rel="stylesheet">

</head>

<body>
