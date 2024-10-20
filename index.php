<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <form method="post" action="">
        <input type="text" name="bName" placeholder="Enter Name" />
        <br>
        <br>
        <textarea name="bDesc" placeholder="Enter Description"></textarea>
        <br>
        <br>
        Select Category :
        <select name="bCategory">
            <option value="PHP">PHP</option>
            <option value="LARAVEL">LARAVEL</option>
            <option value="FLUTTER">FLUTTER</option>
            <option value="MERN">MERN</option>
            <option value="HTML">HTML</option>
        </select>
        <br><br>
        <input type="text" name="bAuthor" placeholder="Enter Author" />
        <br>
        <br>
        <input type="submit" name="submit" value="Submit">
        <br><br>
    </form>
</body>

</html>

<?php
include("conn.php");

if (isset($_POST['submit'])) {
    $bName = $_POST['bName'];
    $bDesc = $_POST['bDesc'];
    $bCategory = $_POST['bCategory'];
    $bAuthor = $_POST['bAuthor'];

    // $filename = $_FILES["imgUpload"]['name'];
    // $tmpname = $_FILES["imgUpload"]["tmp_name"];
    // $folder = "img/" . $filename;
    // move_uploaded_file($tmpname, $folder);

    $query = "insert into blog(bName,bDesc,bCategory,bAuthor) 
        values ('$bName','$bDesc','$bCategory','$bAuthor')";

    $data = mysqli_query($conn, $query);

    if ($data) {
?>
        <script>
            alert("Record Inserted")
        </script>
    <?php
        header('location:view.php');
    } else {
    ?>
        <script>
            alert("Error: Record Not Inserted ======> ")
        </script>
<?php
    }
}
?>