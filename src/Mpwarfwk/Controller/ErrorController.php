<?php 

namespace Mpwarfwk\Controller;
use Mpwarfwk\Controller\BaseController;
use Mpwarfwk\Http\Request;
use Mpwarfwk\Http\Response;
use Mpwarfwk\Container\Container;

class ErrorController extends BaseController{

    public function __construct() {
        $this->newContainer();
    }

    public function error($message, $environment){

        // En desarrollo mostramos en error completo, en producción los dejamos en un simple: 'pagina no disponible'
        if ($environment == 'DEV') {
           $array = array( 'errormessage' => $message);
        }
        if ($environment == 'PROD') {
            $array = array( 'errormessage' => 'esta página no se encuentra disponible');
    	}
        
        $template = $this->container->get('TemplateSmarty');
        $template->assignVars($array);

        return new Response($template->render(dirname(dirname(__FILE__)) . '/ExceptionTemplates/Error.error.tpl'), 404);
    }
}