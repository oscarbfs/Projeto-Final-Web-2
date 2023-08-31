<!DOCTYPE html>
<html>
<head>
    <title>Editar Pasto</title>
    <link rel="stylesheet" type="text/css" href="../styles/update_style.css">
    <script src="../scripts/update_script.js"></script>
</head>
<body>
<div class="form-container">
    <h2>Editar Pasto</h2>
    <?php
    if (isset($_GET['pastureId']) && is_numeric($_GET['pastureId'])) {
        $selectedPastureId = $_GET['pastureId'];

        require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/pasture_business.php';
        $pastureBusiness = new PastureBusiness();

        try {
            $selectedPasture = $pastureBusiness->searchPasture($selectedPastureId, null, null)->getPastures()[0];

            if ($selectedPasture) {
                $imagePath = str_replace('C:/xampp/htdocs/ProjetoFinalWeb2/', '../../../../', $selectedPasture->pastureImage);
                echo '<form action="../process/update_process_pasture.php" method="post" enctype="multipart/form-data">';
                echo '<input type="hidden" name="pastureId" value="' . $selectedPastureId . '">';
                echo '<input type="hidden" name="oldPastureImage" value="' . $selectedPasture->pastureImage . '">';
                echo '<label for="pastureImage">Imagem da Pasto:</label>';
                echo '<input type="file" name="pastureImage" id="pastureImage" accept="image/*" onchange="updateImagePreview(event)">';
                echo '<div class="image-preview">';
                echo '<img id="imagePreview" src="' . $imagePath . '" alt="Preview da Imagem">';
                echo '</div>';
                echo '<label for="pastureName">Nome do Pasto:</label>';
                echo '<input type="text" id="pastureName" name="pastureName" value="' . $selectedPasture->pastureName . '" required>';
                echo '<label for="pastureDescription">Descrição do Pasto:</label>';
                echo '<textarea id="pastureDescription" name="pastureDescription" rows="4" required>' . $selectedPasture->pastureDescription . '</textarea>';
                
                echo '<label for="pastureStatus">Status:</label>';
                echo '<select id="pastureStatus" name="pastureStatus">';
                echo '<option value="livre" ' . ($selectedPasture->pastureStatus == 'livre' ? 'selected' : '') . '>Livre</option>';
                echo '<option value="ocupado" ' . ($selectedPasture->pastureStatus == 'ocupado' ? 'selected' : '') . '>Ocupado</option>';
                echo '<option value="recuperacao" ' . ($selectedPasture->pastureStatus == 'recuperacao' ? 'selected' : '') . '>Recuperação</option>';
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
                echo 'Pasto não encontrado.';
            }
        } catch (\Throwable $th) {
            echo 'Erro ao buscar pasto: ' . $th->getMessage();
        }
    } else {
        echo 'ID do pasto não fornecido ou inválido.';
    }
    ?>
</div>
</body>
</html>
