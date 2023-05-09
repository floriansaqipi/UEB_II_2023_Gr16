<div class="col-lg-12">
    <div class="sidebar-item categories">
        <div class="sidebar-heading">
            <h2>Categories</h2>
        </div>
        <div class="content">
            <ul>
                <?php
                $query = "SELECT * FROM post_categories LIMIT 5;";
                $select_all_categories_sidebar = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_categories_sidebar)) {
                    $name = $row["name"];
                    echo "<li><a href='#'>{$name}</a></li>";
                }   
                ?>
            </ul>
        </div>
    </div>
</div>