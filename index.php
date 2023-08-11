<!DOCTYPE html>
<html>
<head>
    <title>Página Inicial</title>
    <style>
        /* Estilos para a barra de navegação */
        .bottomnav {
            overflow: hidden;
            background-color: #333;
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            margin: 0; /* Remove margens padrão */
            padding: 0; /* Remove preenchimentos padrão */
            display: flex;
            justify-content: center;
            left: 0;
        }

        .bottomnav a {
            display: inline-block;
            color: white;
            padding: 14px 16px;
            text-decoration: none;
        }

        .bottomnav a:hover {
            background-color: #ddd;
            color: black;
        }
        
        /* Estilos para o botão selecionado */
        .active {
            background-color: green; /* Cor de grama */
        }
    </style>
</head>
<body>
    <?php
    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'gado';
    
    if ($pagina === 'gado') {
        include('gado.php');
    } elseif ($pagina === 'fazenda') {
        include('ui/modules/farm/tabs/farm_tab.php');
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
