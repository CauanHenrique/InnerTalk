<?php

$Nome  = $_POST['Nome'];
$Email = $_POST['Email'];

if(strpos(file_get_contents('cadastros.csv'),$Nome)!==False){
    $template = file_get_contents('pagLogada.html');
    $template = str_replace('{user}',$Nome, $template);
    $template = str_replace('{Estado}','Existente', $template);
    
}else{
    $linha = $Nome.';'.$Email.'; '.PHP_EOL;
    file_put_contents('cadastros.csv',$linha,FILE_APPEND);

    $template = file_get_contents('pagLogada.html');
    $template = str_replace('{user}',$Nome, $template);
    $template = str_replace('{Estado}','Novo', $template);
    
}

$posts = file('posts.csv');

$linhas =    '';

for($i=count($posts);$i>=0;$i--){
    $dadosSeparados = explode(';',$posts[$i]);
    $Nome           = $dadosSeparados[0];
    $Mensagem       = $dadosSeparados[1];

    $templateLinha =  file_get_contents('feed.html');
    $templateLinha =  str_replace('{Nome}',$Nome,$templateLinha);
    $templateLinha =  str_replace('{Mensagem}',$Mensagem,$templateLinha);
    $linhas .=        $templateLinha;
}


$template = str_replace('{LINHAS}',$linhas,$template);
echo $template;