<?php 
    include ROOT.DS.'models'.DS."publicModels.php";
    /*note to dev:  this is for overwriting browser CORS ROLE*/
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    /*end of overwriting browser CORS ROLE*/

    date_default_timezone_set('Asia/Manila');
    $book = new Book_Model();

	error_reporting( ~E_NOTICE );
	if (isset($_POST['add_book'])) {

        $created_on = date("Y-m-d H:i:s"); 

	    $data = [
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'publisher' => $_POST['publisher'],
        'publicationplace' => $_POST['publicationplace'],
        'created_on' => $created_on
      ]; 

      
      $book->insert($data);

        echo json_encode(array(
          "success" => true
      ));
      return false;
        
            
      
      
	}
?>
