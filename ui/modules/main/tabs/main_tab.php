<!DOCTYPE html>
<html>
<head>
    <title>Página Inicial</title>
    <link rel="stylesheet" type="text/css" href="../styles/tab_style.css">
    <script src="../scripts/tab_script.js"></script>
</head>
<body>
    <?php
    include('/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/infra/configs/DBConnection.php');
    $connection = DBConnection::getInstance()->getConnection();
    $sql = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/infra/configs/tables.sql');
    $queries = explode(";", $sql);

    foreach ($queries as $query) {
        if (!empty(trim($query))) {
            $connection->query($query);
        }
    }

    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'bull';
    
    if ($pagina === 'bull') {
        include('/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/ui/modules/bull/tabs/bull_tab.php');
    } elseif ($pagina === 'farm') {
        include('/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/ui/modules/farm/tabs/farm_tab.php');
    } elseif ($pagina === 'pasture') {
        include('/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/ui/modules/pasture/tabs/pasture_tab.php');
    } 
    ?>
    
    <div class="bottomnav">
        <a href="?pagina=bull" <?php if ($pagina === 'bull') echo 'class="active"' ?>>Gado</a>
        <a href="?pagina=pasture" <?php if ($pagina === 'pasture') echo 'class="active"' ?>>Pasto</a>
        <a href="?pagina=farm" <?php if ($pagina === 'farm') echo 'class="active"' ?>>Fazenda</a>
    </div>
</body>
</html>
