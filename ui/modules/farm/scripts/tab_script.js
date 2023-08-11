function selectFarm(farmName) {
    var cards = document.querySelectorAll('.fazenda-card');
    cards.forEach(function(card) {
        card.classList.remove('selected');
    });
    var selectedCard = document.querySelector('.fazenda-card[data-farm="' + farmName + '"]');
    selectedCard.classList.add('selected');
}
