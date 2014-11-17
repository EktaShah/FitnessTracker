<?
	include_once __DIR__ . '/../inc/_all.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$method = isset($_POST['submit']) ? 'POST' : 'GET';
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';
$view 	= null;

switch ($action . '_' . $method) {
	case 'create_GET':
        $model = Food::Blank();
        $view = "FTFoodLog/edit.php";
		break;
	case 'save_POST':
		//	Proccess input
        //Validate
        if($_REQUEST['id'])
        {
            //update
            Food::Save($_REQUEST);
         }else{
             //Create
             Food::Save($_REQUEST1);
          }
	break;
	case 'edit_GET':
        $model = Food::Get($_REQUEST['id']);
        $view = "FTFoodLog/edit.php";
        break;
    case 'delete Get':
        $view = "FTFoodLog/delete.php";
        break;
    case 'delete Post':
        //Process input
        break;
    case 'index_GET':
	default:
		$model = Food::Get();
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