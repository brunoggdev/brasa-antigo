<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter4.github.io/CodeIgniter4/
*/

/**
* Constante de veersão usada principalmente para cache bursting.
* @author Brunoggdev
* @origem Common.php
*/
define('VERSION', '1.0.0');

/**
* Retorna o caminho da pasta app e pode receber um caminho extra para concatenação.
* @author Brunoggdev
* @origem Common.php
*/
function pasta_app(string $extraPath = ''):string
{
    return __DIR__ . "/$extraPath";
}

/**
* Retorna o caminho pra pasta public e pode receber um caminho extra para concatenação.
* @author Brunoggdev
* @origem Common.php
*/
function pasta_public(string $extraPath = ''):string
{
    return __DIR__ . '../../public/' . $extraPath;
}

/**
* Renderiza uma pagina generica de 404
* @author Brunoggdev
* @origem Common.php
*/
function renderiza404():string
{
    // $pagina = view('templates/header');
    // $pagina .= view('404');
    // $pagina .= view('templates/footer');
    
    $pagina = view('404');

    return $pagina;
}

/**
* Renderiza header, body e footer de uma pagina publica
* @author Brunoggdev
* @origem Common.php
*/
function renderizaPagina(string $page, array $data = []):string
{
    $pagina = view('templates/header', $data);
    $pagina .= view($page);
    $pagina .= view('templates/footer');

    return $pagina;
}


/**
* Retorna uma resposta generica baseado na condição informada no padrão 
* utilizado pelo Brasa para repostas flash (array associativo com cor e texto),
* sendo possível também informar um array customizado para cada caso.
* @author Brunoggdev
* @origem Common.php
*/
function repostaBrasa(bool $condicao, ?array $sucesso = null, ?array $erro = null):array
{

    if( $condicao ){

        return $sucesso ?? [
            'texto' => 'Operação realizada com sucesso.',
            'cor' => 'success'
        ];

    }else{

        return $erro ?? [
            'texto' => 'Houve um problema ao realizar esta operação.',
            'cor' => 'danger'
        ];
        
    }
}



/**
* Higieniza todos os campos de um array
* @author Bruno
*/
function higienizaArray($array):array
{
    // O "&" antes da variavel indica que estou alterando o array original
    // e não apenas uma cópia dele;
    foreach ($array as &$item) {
        if (is_array($item)) {
          $item = higienizaArray($item);
        } else {
          $item = strip_tags($item);
        }
      }
      return $array;
}


/**
* Verifica se existe uma sessão ativa para o usuário
* @author Brunoggdev
*/
function usuarioLogado():bool
{
    return ! empty( session('usuario') );
}