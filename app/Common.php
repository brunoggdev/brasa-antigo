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
function renderiza404()
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
* recomendado pelo Brasa para repostas flash (array associativo com texto e cor),
* sendo possível também informar um array customizado para cada caso.
* @author Brunoggdev
* @origem Common.php
*/
function mensagemBrasa(bool $condicao, ?array $sucesso = null, ?array $erro = null):array
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
* Utilizado inicialmente para facilmente acessar a mensagemBrasa como mensagem flash, 
* retorna, caso exista, o index desejado de um array associativo guardado na session.
* @param string $index 'texto' ou 'cor'  
* @author Brunoggdev
*/
function respostaBrasa(string|int $index, ?string $sessionKey = 'resposta'):mixed
{
    return session($sessionKey)[$index] ?? '';
}


/**
* Renderiza um componente toast do Bootstrap com a mensagemBrasa passada como
* mensagem flash para a chave da session desejada ('resposta' por padrão).
* @author Brunoggdev
*/
function toastBrasa(?string $sessionKey = 'resposta'):void
{
    // Utilizando sintaxe alternativa apenas para tornar mais fácil
    // de editar o HTML caso seja necessário
    if ( session($sessionKey) ):?> 
        <!-- Toast -->
        <div class="position-fixed bottom-0 right-0 p-3 " style="z-index: 5; right: 0; bottom: 0;">
        <div id="mensagemToast" class="toast hide " role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000">
            <div class="toast-header text-white bg-<?=respostaBrasa('cor')?>">
            <strong class="mr-auto">Mensagem</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="toast-body">
                <?=respostaBrasa('texto')?>
            </div>
        </div>
        </div>
        <script type="module">
            $('#mensagemToast').toast('show')
        </script>
    <?php endif;

}

/**
* Higieniza todos os campos de um array
* @author Brunoggdev
* @origem Common.php
*/
function higienizaArray(array $array):array
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
* Retorna o valor desejado da sessão do usuário ou, caso  
* nenhum valor seja informado, se a sessão está ativa.
* @author Brunoggdev
* @origem Common.php
*/
function usuario(?string $index = 'logado'):mixed
{
    if(empty( session('usuario') )){
        return '';
    }

    return strip_tags( session('usuario')[$index] ?? '' );
}
