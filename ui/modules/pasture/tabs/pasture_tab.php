<!DOCTYPE html>
<html>
<head>
    <title>Lista de Pastos</title>
    <link rel="stylesheet" type="text/css" href="../../pasture/styles/tab_style.css">
</head>
<body>
    <div class="top-toolbar">
        <h1>Pastos</h1>
        <a href="../../pasture/pages/create_pasture.php" class="add-button">Adicionar Pasto</a>
    </div>

    <?php
    include 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/modules/pasture/tiles/pasture_tile.php';
    require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/pasture_business.php';

    require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/infra/configs/session.php';
    $sessionManager = SessionManager::getInstance();
    $selectedFarmId = $sessionManager->getSelectedFarmId();

    $pastureBusiness = new PastureBusiness();

    if (!$selectedFarmId) {
        echo '<div class="no-farm-selected-message">';
        echo 'Fazenda não selecionada. Selecione uma fazenda para visualizar os pastos.';
        echo '</div>';
        echo '<a href="../../main/tabs/main_tab.php?pagina=farm" class="overview-button">Ver Fazendas</a>';
    } else {
        try {
            $searchResult = $pastureBusiness->searchPasture(null, $selectedFarmId, null);
            if ($searchResult->getSucess()) {
                $pastures = $searchResult->getPastures();

                foreach ($pastures as $pasture) {
                    $pastureTile = new PastureTile($pasture);

                    echo $pastureTile->generateCard();
                }
            } else {
                throw new Exception("Erro na consulta ao banco de dados.", 1);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    ?>
</body>
</html>
