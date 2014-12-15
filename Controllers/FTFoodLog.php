<?
	include_once __DIR__ . '/../inc/_all.php';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$method = $_SERVER['REQUEST_METHOD'];
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';
$view 	= null;
$loc = "../";
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
        $data = array();
        if($error){
            error_log("Validation Error:" . json_encode($error));
        } else {
            $result = Food::Save($postJSON);
            if($result['error']) {
                $error = $result['sql_error'];
                error_log("Save Error:" . json_encode($error));
            } else {
                $data = $result['data'];
            }
        }
        
        $model = array();
        
        if($error) {
            $model["status"] = "FAILURE";
            $model["error"] = $error;
            http_response_code(400);
        } else {
            $model["status"] = "SUCCESS";
            $model["message"] = "Excelent Job. $data[Name] has been recorded. Now don't eat too much";
            $model['data'] = $data;
            error_log("Done Saving");
        }
        error_log("Response: " . json_encode($model));
        $format = 'json';
	break;
	case 'edit_GET':
        error_log("Edit Request: " . json_encode($_REQUEST));
        $model = Food::Get($_REQUEST['id']);
        $view = "FTFoodLog/edit.php";
        break;
    case 'deleteGet_GET':
        $model = Food::Get($_REQUEST['id']);
        $view = "FTFoodLog/delete.php";
        break;
    case 'delete_GET':
       error_log("Delete Request: " . json_encode($_REQUEST));
       $error = Food::Delete($_REQUEST['id']);
       if($error) {
            $model["status"] = "FAILURE";
            $model["error"] = $error['sql_error'];
            http_response_code(400);
        } else {
            $model["status"] = "SUCCESS";
            $model["message"] = "Excelent Job.";
            error_log("Done Saving");
        }
        $format = 'json';  
        break;
    case 'get_GET':
        $data = Food::GetAll($_REQUEST['UserId']); // FetchAll returns array of maps
        $model['data'] = $data; // model is map with data as key
        break;
    case 'index_GET':
	default:
		$view = 'FTFoodLog/index.php';		
		break;
}

switch ($format) {
	case 'json':
	    error_log("Response: " . json_encode($model));
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