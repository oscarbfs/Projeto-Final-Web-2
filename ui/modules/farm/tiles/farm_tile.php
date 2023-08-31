<?php
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/models/mapper/set_farm_mapper.php';

class FarmTile {
    private SetFarmMapper $farm;
    private $isSelected;

    public function __construct($farm) {
        $this->farm = $farm;
        $this->isSelected = false;
    }

    public function select() {
        $this->isSelected = true;
    }

    public function unselect() {
        $this->isSelected = false;
    }

    public function generateCard() {
        $imagePath = str_replace('C:/xampp/htdocs/ProjetoFinalWeb2/', '../../../../', $this->farm->farmImage);

        $card = '<div class="fazenda-card';
        if ($this->isSelected) {
            $card .= ' selected';
        }
        $card .= '" data-farm="' . $this->farm->farmId . '">';
        $card .= '<img src="' . $imagePath . '" alt="' . $this->farm->farmName . '" width="150">';
        $card .= '<h3>' . $this->farm->farmName . '</h3>';
        $card .= '<p>' . $this->farm->farmDescription . '</p>';
        $card .= '<button class="select-button" onclick="selectFarm(\'' . $this->farm->farmId . '\')">Selecionar</button>';
        $card .= '<div class="card-buttons">';
        $card .= '<button class="delete-button" onclick="deleteFarm(\'' . $this->farm->farmId . '\')">Excluir</button>';
        $card .= '<div class="button-space"></div>'; 
        $card .= '<a class="edit-button" href="../../farm/pages/update_farm.php?farmId=' . urlencode($this->farm->farmId) . '">Editar</a>';
        $card .= '</div>';
        $card .= '</div>';
    
        return $card;
    }
}


?>