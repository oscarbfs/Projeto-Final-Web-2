<?php
class FarmTile {
    private $farmImage;
    private $farmName;
    private $farmDescription;
    private $isSelected;

    public function __construct($farmImage, $farmName, $farmDescription) {
        $this->farmImage = $farmImage;
        $this->farmName = $farmName;
        $this->farmDescription = $farmDescription;
        $this->isSelected = false;
    }

    public function select() {
        $this->isSelected = true;
    }

    public function unselect() {
        $this->isSelected = false;
    }

    public function generateCard() {
        $card = '<div class="fazenda-card';
        if ($this->isSelected) {
            $card .= ' selected';
        }
        $card .= '" data-farm="' . $this->farmName . '">';
        $card .= '<img src="' . $this->farmImage . '" alt="' . $this->farmName . '" width="150">';
        $card .= '<h3>' . $this->farmName . '</h3>';
        $card .= '<p>' . $this->farmDescription . '</p>';
        $card .= '<button onclick="selectFarm(\'' . $this->farmName . '\')">Selecionar</button>';
        $card .= '</div>';
        return $card;
    }

    public function getFarmName() {
        return $this->farmName;
    }

    public function getFarmImage() {
        return $this->farmImage;
    }

    public function getFarmDescription() {
        return $this->farmDescription;
    }
}


?>