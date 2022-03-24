<?php
require_once('db.php');
$id = $_GET['id'];
if (!empty($database)) {
    $res = $database->read($id);
    $r = mysqli_fetch_assoc($res);
    //if (isset($_POST['update']) & !empty($_POST)) {
    if (isset($_POST['update']) & !empty($_FILES)) {
        $name = $database->sanitize($_POST['name']);
        $real_name = $database->sanitize($_POST['real_name']);
        $short_bio = $database->sanitize($_POST['short_bio']);
        $long_bio = $database->sanitize($_POST['long_bio']);
        $images = $database->sanitize($_FILES['image']['name']);
        // changed POST['images']
        //$images = $database->sanitize($_POST['image']);

        // trying smth out
        // if (isset($_POST['update']) & !empty($_FILES)) {
        //     $target = "images/" . basename($_FILES['image']['name']);

        //     $image = $_FILES['image']['name'];
        // } else {
        //     $image = $r['images'];
        // }


        // if (count($_FILES['image']) == 0) {
        //     $image = $r['images'];
        // }


        $res = $database->update($id, $name, $real_name, $short_bio, $long_bio, $images);
        if ($res) {
            move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $_FILES['image']['name']);
            header('location: view.php');
        } else {
            echo "testing";
            echo $res;
            header('location: view.php');
        }


        // if (move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $_FILES['image']['name'])) {
        //     $msg = "successful upload";
        // } else {
        //     $msg = "there was a problem";
        // }


    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Hero</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body class="updateBody">
    <div class="container">
        <div class="row">
            <form method="post" class="form-horizontal col-md-6 col-md-offset-3" enctype="multipart/form-data">
                <h2 class="addTitleUpdate">Update Operation in CRUD Application</h2>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" value="<?php echo $r['name'] ?>" placeholder="Name" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="real_name" class="col-sm-2 control-label">Real Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="real_name" class="form-control" id="real_name" value="<?php echo $r['real_name'] ?>" placeholder="Real Name" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="short_bio" class="col-sm-2 control-label">Short Bio</label>
                    <div class="col-sm-10">
                        <textarea name="short_bio" class="form-control" id="short_bio" placeholder="Short Bio"><?php echo $r['short_bio'] ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="long_bio" class="col-sm-2 control-label">Long Bio</label>
                    <div class="col-sm-10">
                        <textarea name="long_bio" class="form-control" id="long_bio" placeholder="Long Bio"><?php echo $r['long_bio'] ?></textarea>
                    </div>
                </div>

                <div class="form-group">

                    <input type="hidden" name="size" value="1000000">

                    <div>
                        <input type="file" name="image" placeholder="image"><?php echo $r['images'] ?></input>


                    </div>

                </div>

                <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Update" name="update" />
            </form>
        </div>
    </div>
</body>

</html>