<?php
abstract class UpdateProcessTemplate {
    public function update($postData) {
        $validationResult = $this->validateData($postData);

        if ($validationResult['success']) {
            $updateResult = $this->performUpdate($postData);
            $this->displayMessage($updateResult);
        } else {
            $this->displayMessage($validationResult);
        }

        $this->redirectToPreviousPage();
    }

    abstract protected function validateData($postData);
    abstract protected function performUpdate($postData);
    abstract protected function displayMessage($result);
    abstract protected function redirectToPreviousPage();
}

?>