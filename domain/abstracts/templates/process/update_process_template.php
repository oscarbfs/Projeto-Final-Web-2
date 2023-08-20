<?php
abstract class UpdateProcessTemplate {
    public function updateFarm($postData) {
        $validationResult = $this->validateData($postData);

        if ($validationResult['success']) {
            $updateResult = $this->performEdit($postData);
            $this->displayMessage($updateResult);
        } else {
            $this->displayMessage($validationResult);
        }

        $this->redirectToPreviousPage();
    }

    abstract protected function validateData($postData);
    abstract protected function performEdit($postData);
    abstract protected function displayMessage($result);
    abstract protected function redirectToPreviousPage();
}

?>