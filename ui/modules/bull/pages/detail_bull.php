<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Boi</title>
    <link rel="stylesheet" type="text/css" href="../styles/detail_style.css">
    <script src="../../bull/scripts/detail_script.js"></script>
</head>
<body>
    <div class="toolbar">
        <a href="../../main/tabs/main_tab.php?pagina=bull" class="back-button">Voltar</a>
        <h1>Boi</h1>
        <div>
            <button class="delete-button" onclick="deleteBull(<?php echo $_GET['bullId'] ?>)">Excluir</button>
            <a href="../../bull/pages/update_bull.php?bullId=<?php echo $_GET['bullId'] ?>" class="update-button">Editar</a>
        </div>
    </div>

    <div class="detail-container">
        <?php
        if (isset($_GET['bullId']) && is_numeric($_GET['bullId'])) {
            $selectedBullId = $_GET['bullId'];

            require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/bull_business.php';
            $bullBusiness = new BullBusiness();

            try {
                $selectedBull = $bullBusiness->searchBull($selectedBullId, null, null, null)->getBulls()[0];

                if ($selectedBull) {
                    $imagePath = str_replace('C:/xampp/htdocs/ProjetoFinalWeb2/', '../../../../', $selectedBull->bullImage);
                    
                    echo '<div class="image-container">';
                    echo '<img id="imagePreview" src="' . $imagePath . '" alt="Imagem do Boi">';
                    echo '</div>';
                    
                    echo '<div class="details">';
                    echo '<h2>' . $selectedBull->bullName . '</h2>';
                    echo '<p>' . $selectedBull->bullDescription . '</p>';
                    echo '<p>Status: ' . $selectedBull->bullStatus . '</p>';
                    echo '</div>';
                } else {
                    echo 'Boi não encontrado.';
                }
            } catch (\Throwable $th) {
                echo 'Erro ao buscar boi: ' . $th->getMessage();
            }
        } else {
            echo 'ID do boi não fornecido ou inválido.';
        }
        ?>
    </div>
</body>
</html>
