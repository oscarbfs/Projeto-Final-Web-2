function updateImagePreview(event) {
    var imagePreview = document.getElementById('imagePreview');
    imagePreview.src = URL.createObjectURL(event.target.files[0]);
}

function goBack() {
    window.history.back();
}