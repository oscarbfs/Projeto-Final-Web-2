<!DOCTYPE html>
<html>
<head>
    <title>Criar Boi</title>
    <link rel="stylesheet" type="text/css" href="../styles/create_style.css">
    <script src="../scripts/create_script.js"></script>
</head>
<body>
<div class="form-container">
        <h2>Criar Boi</h2>
        <?php
        require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/infra/configs/session.php';
        require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/bull_business.php';
        require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/pasture_business.php';

        $sessionManager = SessionManager::getInstance();
        $selectedFarmId = $sessionManager->getSelectedFarmId();

        $bullBusiness = new BullBusiness();
        $pastureBusiness = new PastureBusiness();

        $pastures = $pastureBusiness->searchPasture(null, $selectedFarmId, null)->getPastures();
        $pasturesToSelect = [];

        foreach ($pastures as $pasture) {
            $pasturesToSelect[] = [
                'id' => $pasture->pastureId,
                'name' => $pasture->pastureName
            ];
        }

        try {

            echo '<form action="../process/create_process_bull.php" method="post" enctype="multipart/form-data">';
            echo '<label for="bullImage">Imagem da Boi:</label>';
            echo '<input type="file" name="bullImage" id="bullImage" accept="image/*" onchange="updateImagePreview(event)">';
            echo '<div class="image-preview">';
            echo '<img id="imagePreview" src="" alt="Preview da Imagem">';
            echo '</div>';
            echo '<label for="bullName">Nome da Boi:</label>';
            echo '<input type="text" id="bullName" name="bullName" required>';
            echo '<label for="bullWeight">Peso do Boi (em kg):</label>';
            echo '<input type="number" id="bullWeightKg" name="bullWeightKg" required>';
            echo '<label for="bullDescription">Descrição da Boi:</label>';
            echo '<textarea id="bullDescription" name="bullDescription" rows="4" required></textarea>';
            echo '<label for="bullPastureId">Selecione o Pasto:</label>';
            echo '<select id="bullPastureId" name="bullPastureId">';
            foreach ($pasturesToSelect as $pasture) {
                echo '<option value="' . $pasture['id'] . '">' . $pasture['name'] . '</option>';
            }
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
