<?php 
    require_once "../model/Fabrica.php";
    require_once "../model/Carro.php";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $acao = $_POST["acao"] ?? "";

        switch($acao){
            case 'fabricar':
                break;
            case 'salvar_carro':
                break;
            case 'finalizar_carro':
                break;
            case 'vender':
                break;
            case 'selecionar_carro':
                //baseado na cor e no modelo do carro
                break;
            case 'vender_carro':
                break;
            case 'finalizar_venda';
                break;
            case 'ver_info':
                break;
            case 'limpar_sessao':
                break;
            default:
                echo "<h2>❌ Ação inválida.</h2>";
                echo "<a href='../view/index.html'>⬅️Voltar ao menu.</a>";
                break;
        }
    }else{
        echo "<h2>⚠️ Nenhuma ação recebida.</h2>";
        echo "<a href='../view/index.html'>⬅️Voltar ao menu.</a>";
    }
?>