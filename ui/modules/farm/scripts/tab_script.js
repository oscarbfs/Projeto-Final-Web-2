function selectFarm(farmName) {
    var cards = document.querySelectorAll('.fazenda-card');
    cards.forEach(function(card) {
        card.classList.remove('selected');
    });
    var selectedCard = document.querySelector('.fazenda-card[data-farm="' + farmName + '"]');
    selectedCard.classList.add('selected');
}

function deleteFarm(farmId) {
    const result = confirm('Tem certeza de que deseja excluir esta fazenda?');
    if (result) {
        window.location.href = '../../farm/process/delete_process_farm.php?farmId=' + farmId;
    }
}