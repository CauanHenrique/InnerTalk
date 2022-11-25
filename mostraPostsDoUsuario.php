<?php

$NomeMeu = $_POST['Nome'];

if(strpos(file_get_contents('cadastros.csv'),$Nome)!==False){
    $template = file_get_contents('pagLogada.html');
    $template = str_replace('{user}',$NomeMeu, $template);
    $template = str_replace('{Estado}','Existente', $template);
    
}else{
        header('Location: index.html');
    }


$posts = file('posts.csv');

$linhas = '';
$contMeusPosts=0;

for($i=0;$i<=count($posts);$i++){
    $dadosSeparados = explode(';',$posts[$i]);
    $Nome           = $dadosSeparados[0];
    $Mensagem       = $dadosSeparados[1];

    if($Nome === $NomeMeu){
    $templateLinha = file_get_contents('feed.html');
    $templateLinha = str_replace('{ID}',$contMeusPosts,$templateLinha);
    $contMeusPosts++;
    $templateLinha = str_replace('{Nome}',$NomeMeu,$templateLinha);
    $templateLinha = str_replace('{Mensagem}',$Mensagem,$templateLinha);
    $linhas       .= $templateLinha;
    }
}



$template = str_replace('{LINHAS}',$linhas,$template);
echo $template;