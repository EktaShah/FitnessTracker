<?
	include_once __DIR__ . '/../inc/_all.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$method = isset($_POST['submit']) ? 'POST' : 'GET';
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';
$view 	= null;

switch ($action . '_' . $method) {
	case 'create_GET':
		$view = "food/edit.php";
		break;
	case 'create_POST':
		//	Proccess input
		break;
	case 'edit_GET':
		#$model = Food::Get($_REQUEST['id']);
		$view = "food/edit.php";		
		break;
	case 'edit_POST':
		//	Proccess input
		break;
	case 'delete_GET':
		$view = "food/delete.php";		
		break;
	case 'delete_POST':
		//	Proccess input
		break;
	case 'index_GET':
	default:
		#$model = Food::Get();
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