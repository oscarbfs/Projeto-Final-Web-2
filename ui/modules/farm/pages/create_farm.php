<!DOCTYPE html>
<html>
<head>
    <title>Criar Fazenda</title>
    <link rel="stylesheet" type="text/css" href="../styles/create_style.css">
</head>
<body>
    <div class="form-container">
        <h2>Criar Fazenda</h2>
        <form action="process_create_farm.php" method="post" enctype="multipart/form-data">
            <label for="farmImage">Imagem da Fazenda:</label>
            <input type="file" id="farmImage" name="farmImage" accept="image/*" onchange="updateImagePreview(event)">
            
            <div class="image-preview">
                <img id="imagePreview" src="" alt="Preview da Imagem">
            </div>
            
            <label for="farmName">Nome da Fazenda:</label>
            <input type="text" id="farmName" name="farmName" required>
            
            <label for="farmDescription">Descrição da Fazenda:</label>
            <textarea id="farmDescription" name="farmDescription" rows="4" required></textarea>
            
            <div class="button-container">
                <button type="button" onclick="goBack()">Voltar</button>
                <button type="submit">Criar Fazenda</button>
            </div>
        </form>
    </div>
    <script src="../scripts/create_script.js"></script>
</body>
</html>
