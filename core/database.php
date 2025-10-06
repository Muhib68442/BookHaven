<?php 
require_once 'config.php'; 

class database{
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_name = DB_NAME;
    private $mysqli = "";
    private $result = array();
    private $conn = false;

    // CONSTRUCT
    public function __construct(){
        if(!$this->conn){

            // SETUP CONNECTION 
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            // $this->conn = $this->mysqli->connect_error ? false : true;
            
            if($this->mysqli->connect_error){
                array_push($this->result, $this->mysqli->connect_error);
                return false;
            }else{
                $this->conn = true;
                // echo "Connection Established";
            }

        }else{
            // echo "Already Connected";
            return true;
        }
    }

    // INSERT
    public function insert($table,  $params=array()){

        if($this->tableExists($table)){
            // print_r($params);
            $table_columns = implode(',', array_keys($params));
            $table_values = implode("','", array_values($params));
            $sql = "INSERT INTO $table ($table_columns) VALUES ('$table_values')";
            // echo $sql;
            if($this->mysqli->query($sql)){
                array_push($this->result, $this->mysqli->insert_id);
                return true;
            }else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }else{
            return false;
        }

    }
    
    // UPDATE
    public function update($table, $params=array(), $where=null){
        if($this->tableExists($table)){
            $args = array();
            foreach ($params as $key => $value){
                $args[] = "$key = '$value'";
            }

            $sql = "UPDATE $table SET ".implode(', ', $args);
            if($where!=null){
                $sql .=" WHERE $where";
            }
            // echo $sql;

            if($this->mysqli->query($sql)){
                array_push($this->result, $this->mysqli->affected_rows." Rows Affected");
            }else{
                array_push($this->result, $this->mysqli->error);
            }
        }
    }
    
    // DELETE
    public function delete($table, $where = null){
        if($this->tableExists($table)){
            $sql = "DELETE FROM $table";

            if($where!=null){
                $sql .=" WHERE $where";
            }

            if($this->mysqli->query($sql)){
                array_push($this->result, $this->mysqli->affected_rows." Rows Affected");
            }else{
                array_push($this->result, $this->mysqli->error);
            }
        }
    }
    
    // SELECT
    public function select($table, $rows='*', $join=null, $where=null, $order=null, $limit=null ){
        if($this->tableExists($table)){
            $sql = "SELECT $rows FROM $table";
            if($join!=null){
                $sql .= " $join";
            }
            if($where!=null){
                $sql .= " WHERE $where";
            }
            if($order!=null){
                $sql .= " ORDER BY $order";
            }
            if($limit!=null){
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                $start = ($page - 1) * $limit;
                $sql .= " LIMIT $start, $limit";
            }
            // echo $sql;
            $query = $this->mysqli->query($sql);
            if($query){
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
            }else{
                array_push($this->result, $this->mysqli->error);
            }
        }
    }


    // SQL
    // public function sql($sql){
    //     $query = $this->mysqli->query($sql);
    //     if($query){
    //         $this->result = $query->fetch_all(MYSQLI_ASSOC);
    //     }else{
    //         array_push($this->result, $this->mysqli->error);
    //     }
    // }
    public function sql($sql){
        $query = $this->mysqli->query($sql);

        if($query === false){
            array_push($this->result, $this->mysqli->error);
            return false;
        }

        // SELECT query হলে fetch_all চালাও
        if($query instanceof mysqli_result){
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            $query->free();
        } else {
            $this->result = $this->mysqli->affected_rows;
        }

        return true;
    }


    // PAGINATION 
    public function pagination($table, $rows='*', $join=null, $where=null, $order=null, $limit=null ){
        if($this->tableExists($table)){
            if($limit != null){
                $sql = "SELECT COUNT(*) FROM $table";
                if($join!=null){
                    $sql .= " $join";
                }
                if($where!=null){
                    $sql .= " WHERE $where";
                }
                $query = $this->mysqli->query($sql);
                $total_record = $query->fetch_array(MYSQLI_ASSOC);
                $total_record = $total_record['COUNT(*)'];
                $total_page = ceil($total_record/$limit);
                $url = basename($_SERVER['PHP_SELF']);
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                
                
                // SHOW PAGINATION BUTTONS
                $output = "<ul class='pagination'>";
                // PREVIOUS PAGE
                if($page > 1){
                    $output .= "<li><a href='$url?page=".($page-1)."'><</a></li>";
                }

                if($total_record > $limit){
                    for($i=1; $i<=$total_page; $i++){
                        if($i == $page){
                            $cls = "active";
                        }else{
                            $cls = "";
                        }
                        $output .= "<li><a href='$url?page=$i'>$i</a></li>"; 
                    }

                    // NEXT PAGE
                    if($total_page > $page){
                        $output .= "<li><a href='$url?page=".($page+1)."'>></a></li>";
                    }

                    $output .= "</ul>";      
                    
                    echo $output;
                }

                // array_push($this->result, $output);
                array_push($this->result, "Total Page : ".$total_page);
            }else{
                return false;
            }

        }
    }

    // TABLE EXISTS 
    private function tableExists($table){
        $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $result = $this->mysqli->query($sql);
        if($result->num_rows == 0){
            return false;
            array_push($this->result, "Table Not Found");
        }else{
            return true;
        }

    }

    // GET RESULT
    public function get_result(){
        $val = $this->result;
        $this->result = array();
        return $val;
    }



    // DESTRUCTOR : CLOSE CONNECTION
    public function __destruct(){
        if($this->conn){                        
            if($this->mysqli->close()){         
                $this->conn = false;           
                return true;
                echo "Connection Closed";
            }
        }else{
            return false;
        }
    }
}

?>