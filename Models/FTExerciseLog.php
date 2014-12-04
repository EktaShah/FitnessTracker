<?php
include_once __DIR__ . '/../inc/_all.php';
/**
 *
 */
class Food {

    public static function Blank() {
        return array('id' => null, 'Activity Type' => null, 'Distance' => null, 'Average pace' => null, 'Calories Burned' => null, 'Date' => null, 'Time' => date(strtotime('tomorrow')));
    }

    public static function Get($id = null) {
        $sql = "SELECT * FROM FTExerciseLog";
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
                $sql = "Update 2014Fall_Food_Eaten
                            Set Name='$row2[Name]', Type_id='$row2[Type_id]', Calories='$row2[Calories]',
                                Fat='$row2[Fat]', Carbs='$row2[Carbs]', Fiber='$row2[Fiber]', Time='$row2[Time]'
                        WHERE id = $row2[id]
                        ";
            }else{
            
                $sql = "  
                    INSERT INTO FTFoodLog`
                    (
                    `Name`,
                    `Calories`,
                    `Fat`,
                    `Carbs`,
                    `Protein`,
                    `Time`,
                    `UserId`)
                    VALUES
                    ('$row2[Name]', '$row2[Calories]', '$row2[Fat]', '$row2[Carbs]', '$row2[Protein]', '$row2[Time]', Now(), $row2[UserId])";
                
            }
            
            
            
            //my_print( $sql );
            
            $results = $conn->query($sql);
            $error = $conn->error;
            
            if(!$error && empty($row['id'])){
                $row['id'] = $conn->insert_id;
            }
            
            $conn->close();
            
            return $error ? array ('sql error' => $error) : false;
        }
        
        static public function Delete($id)
        {
            $conn = GetConnection();
            $sql = "DELETE FROM 2014Fall_Food_Eaten WHERE id = $id";
            //echo $sql;
            $results = $conn->query($sql);
            $error = $conn->error;
            $conn->close();
            
            return $error ? array ('sql error' => $error) : false;
        }

        static public function Validate($row)
        {
            error_log("Validate:");
             error_log(json_encode($row));
            $errors = array();
            if(empty($row['Name'])) $errors['Name'] = "is required";
            if(empty($row['Calories'])) $errors['Calories'] = "is required";
            
            //if($row['Carbs'] >= 20) $errors['Carbs'] = "must less than 20";
            //if(empty($row['Carbs'])) $errors['Carbs'] = "is required";
            
            return count($errors) > 0 ? $errors : false ;
        }
}
?>
