<?php
    session_start();
    require_once "../model/Fabrica.php";
    require_once "../model/Carro.php";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $acao = $_POST["acao"] ?? "";

        switch($acao){
            case 'fabricar':
                echo '<h2>🏭 Você escolheu fabricar carros!</h2>
                <p>Quantos carros deseja fabricar?:</p>
                        <form action="processa.php" method="post">
                        <input type="hidden" name="acao" value="salvar_carros">

                        <label><strong>Quantidade de Carros:</strong></label><br>
                        <input type="number" name="qtde_carros" min="0" required><br><br>

                        <button type="submit">Avançar</button>
                    </form>
                ';
                break;
            case 'salvar_carros':
                $qtde_carros = (int)$_POST['qtde_carros'] ?? 0;            
                if($qtde_carros > 0){
                    echo '<h2>🏭 Vamos fabricar ' . $qtde_carros+1 .' carros!</h2>';
                    echo '<form action="processa.php" method="post">';
                    for($i = 0; $i < $qtde_carros; $i++){
                        echo "
                            <input type='hidden' name='acao' value='finalizar_carros'>
                            <input type='hidden' name='qtde_carros' value='{$qtde_carros}'>
                            <input type='hidden' name='qtde_carros' value='{$qtde_carros}'>
                            <input type='hidden' name='qtde_carros' value='{$qtde_carros}'>

                            <label><strong>Modelo do " . $i+1 . "º Carro:</strong></label><br>
                            <input type='text' name='modelo_carro_{$i}' required><br><br>
    
                            <label><strong>Cor do " . $i+1 . "º Carro:</strong></label><br>
                            <input type='text' name='cor_carro_{$i}' required><br><br><br>        
                        ";
                    }
                    echo '<button type="submit">Avançar</button>
                    </form>';
                }
                break;
            case 'finalizar_carros':
                $qtde_carros = (int)$_POST['qtde_carros'] ?? 0;
                $carros = [];

                if(!isset($_SESSION['fabrica'])){
                    $fabrica = new Fabrica();
                }else{
                    $fabrica = unserialize($_SESSION['fabrica']);
                }

                $cor = [];
                for($i = 0; $i < $qtde_carros; $i++){
                    $cor[$i] =  $_POST["cor_carro_{$i}"] ?? '';
                    //echo "<br>Armazenado a cor " . $cor[$i] . " no veículo " . $i+1;
                }

                $modelo = [];
                for($i = 0; $i < $qtde_carros; $i++){
                    $modelo[$i] = $_POST["modelo_carro_{$i}"] ?? '';
                    //echo "<br>Armazenado o modelo " . $modelo[$i] . " no veículo " . $i+1;
                }
                  
                for($i = 0; $i < $qtde_carros; $i++){
                    array_push($carros, $fabrica->fabricarCarro($i, $cor, $modelo));
                }

                $_SESSION['fabrica'] = serialize($fabrica);
                
                echo "<h2>🏭 Os seguintes carros foram construídos:</h2>";
                for($i = 0; $i < $qtde_carros; $i++){
                    echo "🚗 " . ($i+1) . "º Carro:<br>";
                    echo "Modelo: {$carros[$i]->getModelo()}<br>";
                    echo "Cor: {$carros[$i]->getCor()}<br><br>";
                }
                echo "<br><a href='../view/index.html'>⬅️Voltar ao menu</a>";
                break;
            case 'vender':
                break;
            case 'selecionar_carro':
                //baseado na cor e no modelo do carro
                break;
            case 'vender_carro':
                break;
            case 'finalizar_venda':
                break;
            case 'ver_info':
                if(!isset($_SESSION['fabrica'])){
                    echo "<h2>⚠️ Nenhum carro foi fabricado ainda!</h2>";
                    echo "<br><a href='../view/index.html'>⬅️Voltar ao menu</a>";
                    break;
                }

                $fabrica = unserialize($_SESSION['fabrica']);
                echo $fabrica->geraInfoCarros();

                echo "
                        <br><form action='processa.php' method='POST'>
                        <button type='submit' name='acao' value='limpar_sessao'>🧹 Nova Construção</button>
                        </form>
                        <br><a href='../view/index.html'>⬅️Voltar ao menu</a>;
                     ";
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