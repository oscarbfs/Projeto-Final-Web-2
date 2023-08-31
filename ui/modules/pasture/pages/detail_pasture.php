<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Pasto</title>
    <link rel="stylesheet" type="text/css" href="../styles/detail_style.css">
    <script src="../../pasture/scripts/detail_script.js"></script>
</head>
<body>
    <div class="toolbar">
        <a href="../../main/tabs/main_tab.php?pagina=pasture" class="back-button">Voltar</a>
        <h1>Pasto</h1>
        <div>
            <button class="delete-button" onclick="deletePasture(<?php echo $_GET['pastureId'] ?>)">Excluir</button>
            <a href="../../pasture/pages/update_pasture.php?pastureId=<?php echo $_GET['pastureId'] ?>" class="update-button">Editar</a>
        </div>
    </div>

    <div class="detail-container">
        <?php
        if (isset($_GET['pastureId']) && is_numeric($_GET['pastureId'])) {
            $selectedPastureId = $_GET['pastureId'];

            require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/pasture_business.php';
            $pastureBusiness = new PastureBusiness();

            try {
                $selectedPasture = $pastureBusiness->searchPasture($selectedPastureId, null, null)->getPastures()[0];

                if ($selectedPasture) {
                    $imagePath = str_replace('C:/xampp/htdocs/ProjetoFinalWeb2/', '../../../../', $selectedPasture->pastureImage);
                    
                    echo '<div class="image-container">';
                    echo '<img id="imagePreview" src="' . $imagePath . '" alt="Imagem do Pasto">';
                    echo '</div>';
                    
                    echo '<div class="details">';
                    echo '<h2>' . $selectedPasture->pastureName . '</h2>';
                    echo '<p>' . $selectedPasture->pastureDescription . '</p>';
                    echo '<p>Status: ' . $selectedPasture->pastureStatus . '</p>';
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
