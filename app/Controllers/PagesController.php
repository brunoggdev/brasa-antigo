<?php

namespace App\Controllers;

class PagesController extends BaseController
{
    public function index()
    {
        return renderizaPagina('home');
    }

    /**
    * Tenta renderizar a pagina como requisitada na url
    * @author Brunoggdev
    */
    public function mostrar($page):string
    {
        if(! is_file( pasta_app("Views/$page.php") )){
            return renderiza404();
        }
        
        return renderizaPagina($page);
    }
}
