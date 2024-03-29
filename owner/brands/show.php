<?php require_once __DIR__ . "/../owner.php"; 
$user_id = $_SESSION['user_id'];
$user = find('users', $user_id);?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CR Owner - Brands</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="<?php echo $page_url; ?>vendor/fontawesome/css/all.min.css">
    <link href="<?php echo $page_url; ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top" style="color: #303130;">

    <!-- Page Wrapper -->
    <div id="wrapper">

<?php require "../header.php";

$id = request('id');
if (empty($id)) {
    die("Please provide ID!");
}

$category = find('owner_brand', $id);
if (empty($category )) {
    die("Brand Not Found!");
}

?>
<div class="d-flex justify-content-between mb-4">
    <h3>Brand Details</h3>
    <a href="index.php" class="btn btn-primary mx-2">Go Back</a>
</div>

<p>ID: <?php echo $category['id']; ?></p>
<p>User ID: <?php echo $category['user_id']; ?></p>
<p>Name: <?php echo $category['name']; ?></p>


<?php require "../footer.php"; ?>