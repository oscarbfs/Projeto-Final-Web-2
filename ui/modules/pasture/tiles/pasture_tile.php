<?php
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/models/mapper/set_pasture_mapper.php';

class PastureTile {
    private SetPastureMapper $pasture;

    public function __construct($pasture) {
        $this->pasture = $pasture;
    }

    public function generateCard() {
        $imagePath = str_replace('C:/xampp/htdocs/ProjetoFinalWeb2/', '../../../../', $this->pasture->pastureImage);

        $card = '<div class="pasto-card">';
        $card .= '<img src="' . $imagePath . '" alt="' . $this->pasture->pastureName . '" width="150">';
        $card .= '<h3>' . $this->pasture->pastureName . '</h3>';
        $card .= '<p>' . $this->pasture->pastureStatus . '</p>';
        $card .= '<button class="details-button" onclick="showDetails(\'' . $this->pasture->pastureId . '\')">Mais Detalhes</button>';
        $card .= '</div>';

        return $card;
    }
}
?>
