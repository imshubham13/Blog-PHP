<?php
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>

<body>
    <h1>Display Data</h1>
    <a href="./index.php">Add Data</a>
    <br>
    <br>
    <form method="GET" action="">
        Select Category:
        <select name="bCategory" onchange="this.form.submit()">
            <option value="">All</option>
            <option value="PHP" <?php if (isset($_GET['bCategory']) && $_GET['bCategory'] == 'PHP') echo 'selected'; ?>>PHP</option>
            <option value="LARAVEL" <?php if (isset($_GET['bCategory']) && $_GET['bCategory'] == 'LARAVEL') echo 'selected'; ?>>LARAVEL</option>
            <option value="FLUTTER" <?php if (isset($_GET['bCategory']) && $_GET['bCategory'] == 'FLUTTER') echo 'selected'; ?>>FLUTTER</option>
            <option value="MERN" <?php if (isset($_GET['bCategory']) && $_GET['bCategory'] == 'MERN') echo 'selected'; ?>>MERN</option>
            <option value="HTML" <?php if (isset($_GET['bCategory']) && $_GET['bCategory'] == 'HTML') echo 'selected'; ?>>HTML</option>
        </select>
    </form>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Author</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
        // Get the selected category from the dropdown, if available
        $selectedCategory = isset($_GET['bCategory']) ? $_GET['bCategory'] : '';

        // Modify the query to filter by category if a specific category is selected
        if (!empty($selectedCategory)) {
            $query = "SELECT * FROM blog WHERE bCategory = '$selectedCategory'";
        } else {
            $query = "SELECT * FROM blog";
        }

        $data = mysqli_query($conn, $query);

        if ($data) {
            while ($row = mysqli_fetch_array($data)) {
                echo "<tr>";
                echo "<td>" . $row['bName'] . "</td>";
                echo "<td>" . $row['bDesc'] . "</td>";
                echo "<td>" . $row['bCategory'] . "</td>";
                echo "<td>" . $row['bAuthor'] . "</td>";

                echo
                "<td> 
                        <a href=''>Edit</a> | 
                         <a href=''>Delete</a>
                </td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>

</html>