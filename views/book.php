<?php 
  include ROOT.DS.'views'.DS."header.php";
  include ROOT.DS.'views'.DS."header-menu.php";
  $book = new Book_Model();
  $bookList = $book->getAll();
?>

<div class="container">
  <form>
    <div class="form-box">
      <div class="row">
        <div class="col-md-6"><h3>Books</h3></div>
        <div class="col-md-6 text-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-user"><i class="fas fa-plus"></i> Add Books</button></div>
      </div><!-- end of row -->
    <br>
      <div class="row"> 
       
      <div class="col-md-12">
      <table id="myTable" class="table table-bordered">
          <thead>
              <tr>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Publisher</th>
                  <th>Publication Place</th>
                  <th>ACTION</th>
              </tr> 
          </thead>
          <tbody>
          <?php if(!empty($bookList)) { foreach ($bookList as $key => $bookListing) { ?>
            <tr>
              <td><?php echo (!empty($bookListing->title)) ? $bookListing->title : ''; ?></td>
              <td><?php echo (!empty($bookListing->author)) ? $bookListing->author : ''; ?></td>
              <td><?php echo (!empty($bookListing->publisher)) ? $bookListing->publisher : ''; ?></td>
              <td><?php echo (!empty($bookListing->publicationplace)) ? $bookListing->publicationplace : ''; ?></td>
              <td>
                <button type="button" class="btn btn-info" data-tooltip="tooltip" data-placement="top" title="Edit" data-toggle="modal" data-target="#update-user<?php echo (!empty($bookListing->id)) ? $bookListing->id : ''; ?>"><i class="fas fa-pencil-alt"></i></button>&nbsp;
                <button type="submit" class="btn btn-danger btn-delete" id="btnDelete<?php echo (!empty($bookListing->id)) ? $bookListing->id : ''; ?>" value="<?php echo (!empty($bookListing->id)) ? $bookListing->id : ''; ?>" data-tooltip="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
              </td>
            </tr>
            
            <?php } } ?>
          </tbody>
      </table>
      </div>

      </div><!-- end of row -->
    </div><!-- end of form-box -->


    <!-- add user modal -->
    <div class="modal fade" id="add-user" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"><strong>Add Books</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="row">
        <div class="col-md-6">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title">
            </div><!-- end of form group -->

            <div class="form-group">
              <label for="author">Author</label>
              <input type="text" class="form-control" id="author">
            </div><!-- end of form group -->
        </div><!-- end of col-md-6 left-->

        <div class="col-md-6">
            <div class="form-group">
              <label for="publisher">Publisher</label>
              <input type="email" class="form-control" id="publisher">
            </div><!-- end of form group -->

            <div class="form-group">
              <label for="publicationplace">Publication Place</label>
              <input type="text" class="form-control" id="publicationplace">
            </div><!-- end of form group -->
        </div><!-- end of col-md-6 right -->
      </div><!-- end of row -->

      
          </div><!-- end of modal-body -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-add-book" >Add</button>
          </div><!-- end of modal-footer -->
        </div>
      </div>
    </div><!-- end add user modal -->
  </form>
</div><!-- end of container -->

<?php 
  include ROOT.DS.'views'.DS."footer.php";
?>