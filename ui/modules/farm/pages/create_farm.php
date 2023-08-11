<!DOCTYPE html>
<html>
<head>
    <title>Criar Fazenda</title>
    <link rel="stylesheet" type="text/css" href="../styles/create_style.css">
    <script src="../scripts/create_script.js"></script>
</head>
<body>
    <div class="form-container">
        <h2>Criar Fazenda</h2>
        <form action="process_create_farm.php" method="post">
            <label for="farmImage">Imagem da Fazenda (URL):</label>
            <input type="url" id="farmImage" name="farmImage" required>
            
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
</body>
</html>
