<?php
class BookController
{
    private $con;
    public function __construct() {
        $conn = mysqli_connect('localhost','root','','online_book_store');
        $this->con = $conn;
    }
    public function index($id) {
        $sql = "SELECT * FROM books, category, author WHERE cat_id= $id ";
        $result = mysqli_query($this->con,$sql);
        $books = array();
        while($rows = mysqli_fetch_assoc($result)) {
            
            echo '
                <div class="card" style="width: 18rem;">
                    <img src="admin\book\\'.$rows['book_image'].'" height="200px" width="500px" class="card-img-top" style="border-radius:10px;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">'.$rows['book_name'].'</h5>

                        
                    </div>
                </div>
            ';
        }
    }

    public function show() {
        

    }

    public function create() {

    }

    public function destroy() {

    }
    
    
}
if ($_REQUEST['displayBook_id'] != null) {
     $obj = new BookController();
     $obj->index($_REQUEST['displayBook_id']); 
}

?>