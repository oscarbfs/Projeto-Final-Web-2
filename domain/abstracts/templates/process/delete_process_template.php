<?php
abstract class DeleteProcessTemplate {
    public function delete($postData) {
        $deleteResult = $this->performDelete($postData);
        $this->displayMessage($deleteResult);
        $this->redirectToPreviousPage();
    }

    abstract protected function performDelete($postData);
    abstract protected function displayMessage($result);
    abstract protected function redirectToPreviousPage();
}

?>