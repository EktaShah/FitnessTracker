<?php
include_once __DIR__ . '/../inc/_all.php';
/**
 *
 */
class Food {

    public static function Blank() {
        return array('id' => null, 'Name' => null, 'Calories' => null, 'Fat' => null, 'Carbs' => null, 'Protine' => null, 'Time' => date(strtotime('tomorrow')));
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

    public static function Save($id = null) {
        if ($id) {
            $sql = "UPDATE 2014Fall_Food_Eaten SET ";
        } else {
            $sql = "INSERT Into 2014Fall_Food_Eaten ()";
        }
        $conn = GetConnetion();
        $conn -> query($sql);
    }

}
?>
