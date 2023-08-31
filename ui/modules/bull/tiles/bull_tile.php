<?php
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/models/mapper/set_bull_mapper.php';

class BullTile {
    private SetBullMapper $bull;

    public function __construct($bull) {
        $this->bull = $bull;
    }

    public function generateCard() {
        $imagePath = str_replace('C:/xampp/htdocs/ProjetoFinalWeb2/', '../../../../', $this->bull->bullImage);

        $card = '<div class="bull-card">';
        $card .= '<img src="' . $imagePath . '" alt="' . $this->bull->bullName . '" width="150">';
        $card .= '<h3>' . $this->bull->bullName . '</h3>';
        $card .= '<p>' . $this->bull->bullStatus . '</p>';
        $card .= '<a class="detail-button" href="../../bull/pages/detail_bull.php?bullId=' . urlencode($this->bull->bullId) . '">Mais Detalhes</a>';
        $card .= '</div>';

        return $card;
    }
}
?>
