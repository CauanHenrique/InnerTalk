<?php 

$ID       = $_POST['ID'];
$Mensagem = $_POST['Mensagem'];
$Nome     = $_POST['Nome'];

//Apaga Post

if ($i >= 0){

    $posts = file('posts.csv');
    $countMeusPosts=0;
    
    for($i=0;$i<=count($posts);$i++){
        $dadosSeparados  = explode(';',$posts[$i]);
        $NomeGravado     = $dadosSeparados[0];
        $MensagemGravada = $dadosSeparados[1];
    
        if($NomeGravado === $Nome){
        $ID=$countMeusPosts;
        if($index==$ID){
            unset($posts[$i]);
            break;
        }
        $countMeusPosts++;
        }
    }

    
}

$postsAtualizados = '';
    for($i = 0; $i <= count($posts); $i++){
        if(isset($posts[$i])){
            $postsAtualizados .= $posts[$i];
        }
    }

file_put_contents('posts.csv',$postsAtualizados);














