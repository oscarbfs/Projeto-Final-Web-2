<?php
abstract class CreateProcessTemplate {
    public function create($postData) {
        $validationResult = $this->validateData($postData);

        if ($validationResult['success']) {
            $createResult = $this->performCreate($postData);
            $this->displayMessage($createResult);
        } else {
            $this->displayMessage($validationResult);
        }

        $this->redirectToPreviousPage();
    }

    abstract protected function validateData($postData);
    abstract protected function performCreate($postData);
    abstract protected function displayMessage($result);
    abstract protected function redirectToPreviousPage();
}

?>