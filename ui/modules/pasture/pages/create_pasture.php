<!DOCTYPE html>
<html>
<head>
    <title>Criar Pasto</title>
    <link rel="stylesheet" type="text/css" href="../styles/create_style.css">
    <script src="../scripts/create_script.js"></script>
</head>
<body>
<div class="form-container">
        <h2>Criar Pasto</h2>
        <?php
        require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/pasture_business.php';
        $pastureBusiness = new PastureBusiness();

        try {

            echo '<form action="../process/create_process_pasture.php" method="post" enctype="multipart/form-data">';
            echo '<label for="pastureImage">Imagem da Pasto:</label>';
            echo '<input type="file" name="pastureImage" id="pastureImage" accept="image/*" onchange="updateImagePreview(event)">';
            echo '<div class="image-preview">';
            echo '<img id="imagePreview" src="" alt="Preview da Imagem">';
            echo '</div>';
            echo '<label for="pastureName">Nome da Pasto:</label>';
            echo '<input type="text" id="pastureName" name="pastureName" required>';
            echo '<label for="pastureDescription">Descrição da Pasto:</label>';
            echo '<textarea id="pastureDescription" name="pastureDescription" rows="4" required></textarea>';
            echo '<label for="pastureStatus">Status:</label>';
            echo '<select id="pastureStatus" name="pastureStatus">';
            echo '<option value="livre">Livre</option>';
            echo '<option value="ocupado">Ocupado</option>';
            echo '<option value="recuperacao">Recuperação</option>';
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

            
        } catch (\Throwable $th) {
            echo 'Erro ao buscar fazenda: ' . $th->getMessage();
        }
        ?>
    </div>
</body>
</html>
