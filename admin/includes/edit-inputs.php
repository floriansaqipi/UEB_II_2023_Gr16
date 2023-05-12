<?php
global $updateNameErr;
global $update_cat_name;
global $update_cat_id;
if (isset($_GET["edit"])) {
    $update_cat_id = $_GET["edit"];

    $query = "SELECT * FROM post_categories where category_id = {$update_cat_id};";

    $update_from_categories_query = mysqli_query($connection, $query);

    if (!$update_from_categories_query) {

        die("QUERY FAILED" . mysqli_error($connection));
    }

    updateCategory();

    while ($row = mysqli_fetch_assoc($update_from_categories_query)) {
        $update_cat_id = $row["category_id"];
        $update_cat_name = $row["name"];
?>
        <div class="form-group row <?php echo !empty($updateNameErr) ? "has-danger" : "" ?>">
            <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">Category</label>
            <div class="col-sm-10">

                <input class="form-control" type="text" name="category" value="<?php echo $update_cat_name; ?>" id="example-text-input" placeholder="Edit the category">
                <div class="form-control-feedback"><?php echo $updateNameErr; ?></div>
            </div>
        </div>
<?php
    }
}
?>