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
        <div class="search-bar">
            <input type="text" placeholder="Pesquisar...">
        </div>
        <a href="../../farm/pages/create_farm.php" class="add-button">Adicionar Fazenda</a>
    </div>
    
    <?php
    include '../../farm/tiles/farm_tile.php';

    // Simulação de fazendas do banco de dados
    $fazendas = array(
        new FarmTile('../../../../assets/fazenda_padrao.jpg', 'Fazenda A', 'Descrição da Fazenda A'),
        new FarmTile('../../../../assets/fazenda_padrao.jpg', 'Fazenda B', 'Descrição da Fazenda B'),
        new FarmTile('../../../../assets/fazenda_padrao.jpg', 'Fazenda C', 'Descrição da Fazenda C')
    );

    foreach ($fazendas as $fazenda) {
        echo $fazenda->generateCard();
    }
    ?>
</body>
</html>
