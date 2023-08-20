<!DOCTYPE html>
<html>
<head>
    <title>Página Inicial</title>
    <link rel="stylesheet" type="text/css" href="../styles/tab_style.css">
    <script src="../scripts/tab_script.js"></script>
</head>
<body>
    <?php
    include('C:/xampp/htdocs/ProjetoFinalWeb2/infra/configs/DBConnection.php');
    $connection = DBConnection::getInstance()->getConnection();
    $sql = file_get_contents('C:/xampp/htdocs/ProjetoFinalWeb2/infra/configs/tables.sql');
    $queries = explode(";", $sql);

    foreach ($queries as $query) {
        if (!empty(trim($query))) {
            $connection->query($query);
        }
    }

    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'gado';
    
    if ($pagina === 'gado') {
        include('gado.php');
    } elseif ($pagina === 'fazenda') {
        include('C:/xampp/htdocs/ProjetoFinalWeb2/ui/modules/farm/tabs/farm_tab.php');
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
