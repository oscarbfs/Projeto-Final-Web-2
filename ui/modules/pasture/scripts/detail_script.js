function goBack() {
    window.history.back();
}

function deletePasture(pastureId) {
    const result = confirm('Tem certeza de que deseja excluir este pasto?');
    if (result) {
        window.location.href = '../../pasture/process/delete_process_pasture.php?pastureId=' + pastureId;
    }
}