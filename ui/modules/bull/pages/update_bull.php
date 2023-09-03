<!DOCTYPE html>
<html>
<head>
    <title>Editar Boi</title>
    <link rel="stylesheet" type="text/css" href="../styles/update_style.css">
    <script src="../scripts/update_script.js"></script>
</head>
<body>
<div class="form-container">
    <h2>Editar Boi</h2>
    <?php
    if (isset($_GET['bullId']) && is_numeric($_GET['bullId'])) {
        $selectedBullId = $_GET['bullId'];

        require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/ui/business/bull_business.php';
        $bullBusiness = new BullBusiness();

        try {
            $selectedBull = $bullBusiness->searchBull($selectedBullId, null, null)->getBulls()[0];

            if ($selectedBull) {
                $imagePath = str_replace('/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/', '../../../../', $selectedBull->bullImage);
                echo '<form action="../process/update_process_bull.php" method="post" enctype="multipart/form-data">';
                echo '<input type="hidden" name="bullId" value="' . $selectedBullId . '">';
                echo '<input type="hidden" name="oldBullImage" value="' . $selectedBull->bullImage . '">';
                echo '<label for="bullImage">Imagem da Boi:</label>';
                echo '<input type="file" name="bullImage" id="bullImage" accept="image/*" onchange="updateImagePreview(event)">';
                echo '<div class="image-preview">';
                echo '<img id="imagePreview" src="' . $imagePath . '" alt="Preview da Imagem">';
                echo '</div>';
                echo '<label for="bullName">Nome do Boi:</label>';
                echo '<input type="text" id="bullName" name="bullName" value="' . $selectedBull->bullName . '" required>';
                echo '<label for="bullDescription">Descrição do Boi:</label>';
                echo '<textarea id="bullDescription" name="bullDescription" rows="4" required>' . $selectedBull->bullDescription . '</textarea>';
                
                echo '<label for="bullStatus">Status:</label>';
                echo '<select id="bullStatus" name="bullStatus">';
                echo '<option value="livre" ' . ($selectedBull->bullStatus == 'livre' ? 'selected' : '') . '>Livre</option>';
                echo '<option value="ocupado" ' . ($selectedBull->bullStatus == 'ocupado' ? 'selected' : '') . '>Ocupado</option>';
                echo '<option value="recuperacao" ' . ($selectedBull->bullStatus == 'recuperacao' ? 'selected' : '') . '>Recuperação</option>';
                echo '</select>';
                
                echo '<div class="button-container">';
                echo '<button type="button" onclick="goBack()">Voltar</button>';
                echo '<button type="submit">Salvar Edições</button>';
                echo '</div>';
                
                echo '</form>';
                echo '<div id="message-dialog" style="display: none;">';
                echo '<p id="message-text"></p>';
                echo '<button id="close-button">Fechar</button>';
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
