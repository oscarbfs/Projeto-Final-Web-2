<!DOCTYPE html>
<html>
<head>
    <title>Criar Pasto</title>
    <link rel="stylesheet" type="text/css" href="../styles/create_style.css">
    <script src="../scripts/create_script.js"></script>
</head>
<body>
<div class="form-container">
        <h2>Editar Pasto</h2>
        <?php
        if (isset($_GET['farmId']) && is_numeric($_GET['farmId'])) {
            $selectedFarmId = $_GET['farmId'];

            require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/farm_business.php';
            $farmBusiness = new FarmBusiness();

            try {
                $selectedFarm = $farmBusiness->searchFarm($selectedFarmId, null)->getFarms()[0];

                if ($selectedFarm) {
                    $imagePath = str_replace('C:/xampp/htdocs/ProjetoFinalWeb2/', '../../../../', $selectedFarm->farmImage);
                    echo '<form action="../process/update_process_farm.php" method="post" enctype="multipart/form-data">';
                    echo '<input type="hidden" name="farmId" value="' . $selectedFarmId . '">';
                    echo '<input type="hidden" name="oldFarmImage" value="' . $selectedFarm->farmImage . '">';
                    echo '<label for="farmImage">Imagem da Fazenda:</label>';
                    echo '<input type="file" name="farmImage" id="farmImage" accept="image/*" onchange="updateImagePreview(event)">';
                    echo '<div class="image-preview">';
                    echo '<img id="imagePreview" src="' . $imagePath . '" alt="Preview da Imagem">';
                    echo '</div>';
                    echo '<label for="farmName">Nome da Fazenda:</label>';
                    echo '<input type="text" id="farmName" name="farmName" value="' . $selectedFarm->farmName . '" required>';
                    echo '<label for="farmDescription">Descrição da Fazenda:</label>';
                    echo '<textarea id="farmDescription" name="farmDescription" rows="4" required>' . $selectedFarm->farmDescription . '</textarea>';
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
                    echo 'Fazenda não encontrada.';
                }
            } catch (\Throwable $th) {
                echo 'Erro ao buscar fazenda: ' . $th->getMessage();
            }
        } else {
            echo 'ID da fazenda não fornecido ou inválido.';
        }
        ?>
    </div>
</body>
</html>
