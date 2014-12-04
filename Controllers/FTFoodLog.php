<?
	include_once __DIR__ . '/../inc/_all.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$method = $_SERVER['REQUEST_METHOD'];
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';
$view 	= null;

switch ($action . '_' . $method) {
	case 'create_GET':
        $model = Food::Blank();
        $view = "FTFoodLog/edit.php";
		break;
	case 'save_POST':
		$sub_action = empty($_REQUEST['id'])?'created':'updated';
        $postdata = file_get_contents("php://input");
        $postJSON = json_decode($postdata, true);
        $error = Food::Validate($postJSON);
        if(!$error){
            $error = Food::Save($postJSON);
            $model = "";
        } else {
            $model = $error;
        }
        
        $format = 'json';
	break;
	case 'edit_GET':
        $model = Food::Get($_REQUEST['id']);
        $view = "FTFoodLog/edit.php";
        break;
    case 'delete Get':
        $model = Food::Get($_REQUEST['id']);
        $view = "FTFoodLog/delete.php";
        break;
    case 'delete Post':
       $errors = Food::Delete($_REQUEST['id']);
        if($errors){
                $model = Food::Get($_REQUEST['id']);
                $view = "FTFoodLog/delete.php";
        }else{
                header("Location: ?sub_action=$sub_action&id=$_REQUEST[id]");
                die();          
        }
        break;
        break;
    case 'index_GET':
	default:
		$data = Food::Get(); // FetchAll returns array of maps
        $model['data'] = $data; // model is map with data as key
		$view = 'FTFoodLog/index.php';		
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