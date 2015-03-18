<?php 

namespace Mpwarfwk\Controller;
use Mpwarfwk\Controller\BaseController;
use Mpwarfwk\Templating\TemplateSmarty;
use Mpwarfwk\Http\Request;
use Mpwarfwk\Http\Response;

class ErrorController extends BaseController{
    
    const ROUTE_TO_ERROR_TEMPLATE = "../src/Templates/Error/Error.Error.tpl";
    //const ROUTE_TO_ERROR_TEMPLATE = "../Mpwarfwk/Exceptiontemplates/Error.Error.tpl";

    public function __construct() {
    	parent::__construct();
        echo "Ahora construyo el controlador ErrorController - ";
    }

    public function error($message){

    	echo "ejecutada function error";
        $array = array( 'errormessage' => $message);
    	$template = new TemplateSmarty();
        $template->assignVars($array);
    	$view = $template->render(self::ROUTE_TO_ERROR_TEMPLATE);
    	$response = new Response($view, 404);
    	return $response;
    }
}