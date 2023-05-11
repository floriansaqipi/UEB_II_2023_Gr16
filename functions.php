<?php
function getFeedCategories()
{
    global $connection;
    $query = "SELECT * FROM post_categories LIMIT 5;";
    $select_all_categories_sidebar = mysqli_query($connection, $query);

    if (!$select_all_categories_sidebar) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($select_all_categories_sidebar)) {
        $name = $row["name"];
        echo "<li><a href='#'>{$name}</a></li>";
    }
}

