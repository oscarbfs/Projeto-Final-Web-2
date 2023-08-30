<?php
abstract class CreateProcessTemplate {
    public function createFarm($postData) {
        $validationResult = $this->validateData($postData);

        if ($validationResult['success']) {
            $createResult = $this->performEdit($postData);
            $this->displayMessage($createResult);
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