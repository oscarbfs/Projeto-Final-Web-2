<!DOCTYPE html>
<html>
<head>
    <title>Lista de Bois</title>
    <link rel="stylesheet" type="text/css" href="../../bull/styles/tab_style.css">
</head>
<body>
    <div class="top-toolbar">
        <h1>Bois</h1>
        <a href="../../bull/pages/create_bull.php" class="add-button">Adicionar Boi</a>
    </div>

    <?php
    include '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/ui/modules/bull/tiles/bull_tile.php';
    require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/ui/business/bull_business.php';

    require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/infra/configs/session.php';
    $sessionManager = SessionManager::getInstance();
    $selectedFarmId = $sessionManager->getSelectedFarmId();

    $bullBusiness = new BullBusiness();

    if (!$selectedFarmId) {
        echo '<div class="no-farm-selected-message">';
        echo 'Fazenda não selecionada. Selecione uma fazenda para visualizar os Bois.';
        echo '</div>';
        echo '<a href="../../main/tabs/main_tab.php?pagina=farm" class="overview-button">Ver Fazendas</a>';
    } else {
        try {
            $searchResult = $bullBusiness->searchBull(null, $selectedFarmId, null, null);
            if ($searchResult->getSucess()) {
                $bulls = $searchResult->getBulls();

                foreach ($bulls as $bull) {
                    $bullTile = new BullTile($bull);

                    echo $bullTile->generateCard();
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
