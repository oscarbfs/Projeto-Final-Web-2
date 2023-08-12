<!DOCTYPE html>
<html>
<head>
    <title>Criar Fazenda</title>
    <link rel="stylesheet" type="text/css" href="../styles/create_style.css">
    <script src="../scripts/create_script.js"></script>
</head>
<body>
<div class="form-container">
        <h2>Editar Fazenda</h2>
        <?php
        // Recuperar os dados da fazenda com base no nome (substitua com a lógica real)
        $selectedFarmName = $_GET['farmName']; // Recupera o nome da fazenda da URL
        // Simulação dos dados da fazenda (substitua com a sua lógica de busca)
        $selectedFarmImage = "imagem_da_fazenda.jpg";
        $selectedFarmDescription = "Descrição da fazenda...";
        
        // Preenchendo os campos do formulário com os dados da fazenda selecionada
        echo '<form action="process_edit_farm.php" method="post" enctype="multipart/form-data">';
        echo '<label for="farmImage">Imagem da Fazenda:</label>';
        echo '<input type="file" id="farmImage" name="farmImage" accept="image/*" onchange="updateImagePreview(event)">';
        echo '<div class="image-preview">';
        echo '<img id="imagePreview" src="' . $selectedFarmImage . '" alt="Preview da Imagem">';
        echo '</div>';
        echo '<label for="farmName">Nome da Fazenda:</label>';
        echo '<input type="text" id="farmName" name="farmName" value="' . $selectedFarmName . '" required>';
        echo '<label for="farmDescription">Descrição da Fazenda:</label>';
        echo '<textarea id="farmDescription" name="farmDescription" rows="4" required>' . $selectedFarmDescription . '</textarea>';
        echo '<div class="button-container">';
        echo '<button type="button" onclick="goBack()">Voltar</button>';
        echo '<button type="submit">Salvar Edições</button>';
        echo '</div>';
        echo '</form>';
        ?>
    </div>
</body>
</html>
