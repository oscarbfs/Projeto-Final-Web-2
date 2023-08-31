<!DOCTYPE html>
<html>
<head>
    <title>Criar Fazenda</title>
    <link rel="stylesheet" type="text/css" href="../styles/create_style.css">
    <script src="../scripts/create_script.js"></script>
</head>
<body>
<div class="form-container">
        <h2>Criar Fazenda</h2>
        <?php
        require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/farm_business.php';
        $farmBusiness = new FarmBusiness();

        try {

            echo '<form action="../process/create_process_farm.php" method="post" enctype="multipart/form-data">';
            echo '<label for="farmImage">Imagem da Fazenda:</label>';
            echo '<input type="file" name="farmImage" id="farmImage" accept="image/*" onchange="updateImagePreview(event)">';
            echo '<div class="image-preview">';
            echo '<img id="imagePreview" src="" alt="Preview da Imagem">';
            echo '</div>';
            echo '<label for="farmName">Nome da Fazenda:</label>';
            echo '<input type="text" id="farmName" name="farmName" required>';
            echo '<label for="farmDescription">Descrição da Fazenda:</label>';
            echo '<textarea id="farmDescription" name="farmDescription" rows="4" required></textarea>';
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
