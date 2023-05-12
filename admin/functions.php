<?php
function getAllCategoriesAdminTable()
{
    global $connection;

    $query = "SELECT * FROM post_categories ";
    $select_categories = mysqli_query($connection, $query);

    if (!$select_categories) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row["category_id"];
        $cat_name = $row["name"];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_name}</td>";
        echo "<td>
            <a role='button' href='categories.php?delete={$cat_id}' class='btn btn-inverse-danger waves-effect waves-light'>
                Delete
            </a>
        </td>";
        echo "<td>
            <a href='categories.php?edit={$cat_id}' role='button' class='btn btn-inverse-warning waves-effect waves-light'>
                Edit
            </a>
        </td>";
        echo "</tr>";
    }
}

function insertCategory()
{
    global $connection;
    global $insertNameErr;
    global $cat_name;
    // global $insertName;
    $insertNameErr = "";
    // $insertName = "";
    if (isset($_POST["submit"])) {
        if (empty($_POST["category"])) {
            $insertNameErr = "Value can't be empty";
        } else {
            $cat_name = trim($_POST["category"]);
            $query = "INSERT INTO post_categories(name) VALUES ('{$cat_name}'); ";
            $insert_category_query = mysqli_query($connection, $query);

            if (!$insert_category_query) {

                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
    }
}

function updateCategory()
{
    global $connection;
    global $updateNameErr;
    global $update_cat_name;
    global $update_cat_id;
    // echo $update_cat_id;
    $update_cat_name = "";
    $updateNameErr = "";
    if (isset($_POST['update'])) {
        if (empty($_POST['category'])) {
            $updateNameErr = "Value can't be empty";
            
        } else {
            $update_cat_name = trim($_POST['category']);
            $query = "UPDATE post_categories SET name = '{$update_cat_name}' WHERE category_id = {$update_cat_id}";
            echo $query;
            $update_category_query = mysqli_query($connection, $query);

            if (!$update_category_query) {

                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("Location: categories.php");
        }
    }
}

function deleteCategory()
{
    global $connection;
    if (isset($_GET["delete"])) {
        $delete_cat_id = $_GET["delete"];

        $query = "DELETE FROM post_categories WHERE category_id =  {$delete_cat_id};";
        $delete_cat_query = mysqli_query($connection, $query);

        if (!$delete_cat_id) {

            die("QUERY FAILED" . mysqli_error($connection));
        }
        header("Location: categories.php");
    }
}
