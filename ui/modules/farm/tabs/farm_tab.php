<!DOCTYPE html>
<html>
<head>
    <title>Lista de Fazendas</title>
    <link rel="stylesheet" type="text/css" href="../../farm/styles/tab_style.css">
    <script src="../../farm/scripts/tab_script.js"></script>
</head>
<body>
    <div class="top-toolbar">
        <h1>Fazendas</h1>
        <a href="../../farm/pages/create_farm.php" class="add-button">Adicionar Fazenda</a>
    </div>
    
    <?php
    include 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/modules/farm/tiles/farm_tile.php';
    require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/farm_business.php';

    require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/infra/configs/session.php';
    $sessionManager = SessionManager::getInstance();
    $selectedFarmId = $sessionManager->getSelectedFarmId();

    $farmBusiness = new FarmBusiness();

    try {
        $searchResult = $farmBusiness->searchFarm(null, null);
        if ($searchResult->getSucess()) {
            $fazendas = $searchResult->getFarms();

            foreach ($fazendas as $fazenda) {
                $farmTile = new FarmTile($fazenda);
                
                if ($fazenda->farmId == $selectedFarmId) {
                    $farmTile->select();
                }

                echo $farmTile->generateCard();
            }
        } else {
            throw new Exception("Erro na consulta ao banco de dados.", 1);
        }
    } catch (\Throwable $th) {
        echo $th;
    }

    ?>
</body>
</html>
