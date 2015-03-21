<?php 

namespace Mpwarfwk\Controller;
use Mpwarfwk\Controller\BaseController;
use Mpwarfwk\Templating\TemplateSmarty;
use Mpwarfwk\Http\Request;
use Mpwarfwk\Http\Response;

class ErrorController extends BaseController{
    
    //const ROUTE_TO_ERROR_TEMPLATE = "../src/Templates/Error/Error.Error.tpl";
    //const ROUTE_TO_ERROR_TEMPLATE = "../vendor/xavi75/mpwarfwk/Src/Mpwarfwk/ExceptionTemplates/Error.error.tpl";

    public function __construct() {
    	parent::__construct();
        echo "Ahora construyo el controlador ErrorController - ";
    }

    public function error($message, $environment){

    	echo "ejecutada function error";
        // En desarrollo mostramos en error completo, en producción los dejamos en un simple: 'pagina no disponible'
        if ($environment == 'DEV') {
           $array = array( 'errormessage' => $message);
        }
        if ($environment == 'PROD') {
            $array = array( 'errormessage' => 'esta página no se encuentra disponible');
    	}
        $template = new TemplateSmarty();
        $template->assignVars($array);
        $view = $template->render(dirname(dirname(__FILE__)) . '/ExceptionTemplates/Error.error.tpl');
    	$response = new Response($view, 404);
    	return $response;
    }
}