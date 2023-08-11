// Função para atualizar a imagem de visualização
function updateImagePreview(event) {
    var imagePreview = document.getElementById('imagePreview');
    imagePreview.src = URL.createObjectURL(event.target.files[0]);
}

// Função para voltar à tela anterior
function goBack() {
    window.history.back();
}