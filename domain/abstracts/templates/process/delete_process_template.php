<?php
abstract class DeleteProcessTemplate {
    public function deleteFarm($postData, $image) {
        $deleteResult = $this->performDelete($postData, $image);
        $this->displayMessage($deleteResult);
        $this->redirectToPreviousPage();
    }

    abstract protected function performDelete($postData, $image);
    abstract protected function displayMessage($result);
    abstract protected function redirectToPreviousPage();
}

?>