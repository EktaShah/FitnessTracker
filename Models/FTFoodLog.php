<?php
include_once __DIR__ . '/../inc/_all.php';
/**
 *
 */
class Food {

    public static function Blank() {
        return array('id' => null, 'Name' => null, 'Calories' => null, 'Fat' => null, 'Carbs' => null, 'Protein' => null, 'Servings' => null, 'Time' => date(strtotime('tomorrow')));
    }

    public static function GetAll($userId) {
        $sql = "SELECT * FROM FTFoodLog WHERE UserId='$userId'";
        return FetchAll($sql);
    }
    
    public static function Get($id = null) {
        $sql = "SELECT * FROM FTFoodLog";
        if ($id) {
            $sql .= " WHERE id=$id ";
            $ret = FetchAll($sql);
            return $ret[0];
        } else {
            return FetchAll($sql);
        }
    }

        static public function Save(&$row)
        {
            $conn = GetConnection();
            
            $row2 = escape_all($row, $conn);
            $row2['Time'] = date( 'Y-m-d H:i:s', strtotime( $row2['Time'] ) );
            if (!empty($row['id'])) {
                $sql = "Update FTFoodLog
                            Set Name='$row2[Name]',Calories='$row2[Calories]',
                                Fat='$row2[Fat]', Carbs='$row2[Carbs]', Protein='$row2[Protein]', Servings='$row2[Servings]', Time='$row2[Time]'
                        WHERE id = $row2[id]
                        ";
            }else{
                $columns = array();
                $values = array();
                foreach ($row2 as $key => $value) {
                    array_push($columns, $key);
                    array_push($values, $value);
                }
                $columns = implode("`,`", $columns);
                $values = implode("','", $values);
                $sql = "INSERT INTO FTFoodLog ( `$columns` ) VALUES (  '$values' )";
                
                //'$row2[Name]', '$row2[Calories]', '$row2[Fat]', '$row2[Carbs]', '$row2[Protein]','$row2[Servings]', '$row2[Time]', '$row2[UserId]')";
                error_log("SQL:" . $sql);
                
            }
            
            
            
            //my_print( $sql );
            
            $results = $conn->query($sql);
            $error = $conn->error;
            
            if(!$error && empty($row['id'])){
                $row['id'] = $conn->insert_id;
            }
            
            $conn->close();
            
            return $error ? array ('error' => true, 'sql_error' => $error) # true value
                          : array ('error' => false, 'data' => $row);      # false value
        }
        
        static public function Delete($id)
        {
            $conn = GetConnection();
            $sql = " DELETE FROM FTFoodLog
                     WHERE id = $id ";
            //echo $sql;
            $results = $conn->query($sql);
            $error = $conn->error;
            $conn->close();
            
            return $error ? array ('sql_error' => $error) : false;
        }

        static public function Validate($row)
        {
            error_log("Validate Food:" . json_encode($row));
            $errors = array();
            if(empty($row['Name'])) $errors['Name'] = "is required";
            if(empty($row['Calories'])) $errors['Calories'] = "is required";
            
            //if($row['Carbs'] >= 20) $errors['Carbs'] = "must less than 20";
            //if(empty($row['Carbs'])) $errors['Carbs'] = "is required";
            
            return count($errors) > 0 ? $errors : false ;
        }
}
?>
