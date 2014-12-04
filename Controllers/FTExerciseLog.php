<?
    include_once __DIR__ . '/../inc/_all.php';
error_log(json_encode($_REQUEST));
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$method = $_SERVER['REQUEST_METHOD'];
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';
$view   = null;

switch ($action . '_' . $method) {
    case 'create_GET':
        $model = Exercise::Blank();
        $view = "FTExerciseLog/edit.php";
        break;
    case 'save_POST':
        $sub_action = empty($_REQUEST['id'])?'created':'updated';
        $error = Exercise::Validate($_REQUEST);
        if(!$error){
            $error = Exercise::Save($_REQUEST);
            $model = $_REQUEST;
        } else {
            $model = $error;
        }
        
        $format = 'json';
    break;
    case 'edit_GET':
        $model = Exercise::Get($_REQUEST['id']);
        $view = "FTExerciseLog/edit.php";
        break;
    case 'delete Get':
        $model = Exercise::Get($_REQUEST['id']);
        $view = "FTExerciseLog/delete.php";
        break;
    case 'delete Post':
       $errors = Exercise::Delete($_REQUEST['id']);
        if($errors){
                $model = Exercise::Get($_REQUEST['id']);
                $view = "FTExerciseLog/delete.php";
        }else{
                header("Location: ?sub_action=$sub_action&id=$_REQUEST[id]");
                die();          
        }
        break;
        break;
    case 'index_GET':
    default:
        $data = Exercise::Get(); // FetchAll returns array of maps
        $model['data'] = $data; // model is map with data as key
        $view = 'FTExericseLog/index.php';      
        break;
}

switch ($format) {
    case 'json':
        echo json_encode($model);
        break;
    case 'plain':
        include __DIR__ . "/../Views/$view";        
        break;      
    case 'web':
    default:
        include __DIR__ . "/../Views/shared/_Template.php";     
        break;
}
?>