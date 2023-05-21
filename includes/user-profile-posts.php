<?php $sub_page = "posts" ?>
<div class="row">
  <div class="col-sm-12">
    <div class="main-header">
      <div class="col-12">

        <h4>Manage Posts</h4>
      </div>

    </div>
  </div>
  <div class="col-12">
    <div class="card table-padding">
      <table class="table table-hover categories-table table-responsive">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Status</th>
            <th scope="col">Image</th>
            <th scope="col">Tags</th>
            <th scope="col">Comments</th>
            <th scope="col">Date</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php getPostsData(); ?>
          <?php deletePostUser(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>