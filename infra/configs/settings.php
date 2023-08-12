<?php
    include("configs/dataBase.php");
    include("configs/session.php");

    $conn = DatabaseConnection::getInstance()->getConnection();
    $sessionManager = SessionManager::getInstance();
?>