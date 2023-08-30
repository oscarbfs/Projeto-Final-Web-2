function selectFarm(farmId) {
    var cards = document.querySelectorAll('.fazenda-card');
    cards.forEach(function(card) {
        card.classList.remove('selected');
    });
    var selectedCard = document.querySelector('.fazenda-card[data-farm="' + farmId + '"]');
    selectedCard.classList.add('selected');
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../farm/process/select_process_farm.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('farmId=' + farmId);
}

function deleteFarm(farmId, farmImage) {
    const result = confirm('Tem certeza de que deseja excluir esta fazenda?');
    if (result) {
        window.location.href = '../../farm/process/delete_process_farm.php?farmId=' + farmId + '&farmImage=' + farmImage;
    }
}