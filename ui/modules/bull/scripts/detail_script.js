function goBack() {
    window.history.back();
}

function deleteBull(bullId) {
    const result = confirm('Tem certeza de que deseja excluir este boi?');
    if (result) {
        window.location.href = '../../bull/process/delete_process_bull.php?bullId=' + bullId;
    }
}