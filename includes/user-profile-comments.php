<?php $sub_page = "comments" ?>
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<div class="row">
  <div class="col-sm-12">
    <div class="main-header">
      <div class="col-12">

        <h4>Manage Comments</h4>
      </div>

    </div>
  </div>
  <div class="col-12">
    <div class="card table-padding">
      <table class="table table-hover categories-table table-responsive">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Post</th>
            <th scope="col">Content</th>
            <th scope="col">Published</th>
            <th scope="col">Date</th>
            <th scope="col">Publish</th>
            <th scope="col">Draft</th>
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>

          </tr>
        </thead>
        <tbody>
          <?php getCommentsData(); ?>
          <?php approveCommentUser(); ?>
          <?php disapproveCommentUser(); ?>
          <?php deleteCommentUser(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- <div id="add_data_Modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Comment</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="insert_form">
          <label>Enter Employee Name</label>
          <input type="text" name="content" id="comment_content" class="form-control" />
          <br />
          <input type="hidden" name="employee_id" id="employee_id" />
          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</html>

<script>
    $(document).ready(function() {
      $('input[name=editData]').click(function() {
        var comment_id = $(this).data("bodytext");
        console.log(comment_id);
        $.ajax({
          url: "fetch-comments.php",
          method: "GET",
          data: {
            comment_id: comment_id
          },
          dataType: "json",
          success: function(data) {
            $('#comment_content').val(data.content);
            $('#comment_id').val(data.comment_id);
            $('#insert').val("Update");
            $('#add_data_Modal').modal('show');
          }
        });
        console.log($.ajax.url);
      });
    });
  </script> -->