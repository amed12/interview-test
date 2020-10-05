<?php
class komunal
{
   private $conn;
   function __construct()
   {
      session_start();
      $servername = "localhost";
      $dbname = "crud";
      $username = "root";
      $password = "";


      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      } else {
         $this->conn = $conn;
      }
   }



   public function komunal_list($page = 1, $search_input = '')
   {
      $perpage = 10;
      $page = ($page - 1) * $perpage;

      $search = '';
      if ($search_input != '') {
         $search = "WHERE ( nama LIKE '%$search_input%' OR idprev like '%$search_input%' OR id like '%$search_input%' )";
      }


      $sql = "SELECT * FROM komunal $search ORDER BY id desc LIMIT $page,$perpage";

      $query =  $this->conn->query($sql);
      $komunal = array();
      if ($query->num_rows > 0) {
         while ($row = $query->fetch_assoc()) {
            $komunal['komunal_data'][] = $row;
         }
      }
      

      $count_sql = "SELECT COUNT(*) FROM komunal $search";
      $query =  $this->conn->query($count_sql);
      $total = mysqli_fetch_row($query);
      $komunal['total'][] = $total;


      return $komunal;
   }

   public function view_komunal_by_komunal_id($id)
   {
      if (isset($id)) {
         $komunal_id = mysqli_real_escape_string($this->conn, trim($id));

         $sql = "Select * from komunal where id='$komunal_id'";

         $result =  $this->conn->query($sql);

         return $result->fetch_assoc();
      }
   }
   function __destruct()
   {
      mysqli_close($this->conn);
   }
}
