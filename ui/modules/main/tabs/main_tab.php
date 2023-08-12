<!DOCTYPE html>
<html>
<head>
    <title>Página Inicial</title>
    <link rel="stylesheet" type="text/css" href="../styles/tab_style.css">
    <script src="../scripts/tab_script.js"></script>
</head>
<body>
    <?php
    include('../../../../infra/configs/DBConnection.php');
    $connection = DBConnection::getInstance()->getConnection();
    $sql = file_get_contents('../../../../infra/configs/tables.sql');
    $connection->multi_query($sql);

    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'gado';
    
    if ($pagina === 'gado') {
        include('gado.php');
    } elseif ($pagina === 'fazenda') {
        include('../../farm/tabs/farm_tab.php');
    } elseif ($pagina === 'pasto') {
        include('pasto.php');
    } 
    ?>
    
    <div class="bottomnav">
        <a href="?pagina=gado" <?php if ($pagina === 'gado') echo 'class="active"' ?>>Gado</a>
        <a href="?pagina=pasto" <?php if ($pagina === 'pasto') echo 'class="active"' ?>>Pasto</a>
        <a href="?pagina=fazenda" <?php if ($pagina === 'fazenda') echo 'class="active"' ?>>Fazenda</a>
    </div>
</body>
</html>
