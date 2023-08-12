<?php
class SessionManager {
    private static $instance = null;

    private function __construct() {
        session_start();
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new SessionManager();
        }
        return self::$instance;
    }

    public function setSelectedFarmId($farmId) {
        $_SESSION['selectedFarmId'] = $farmId;
    }

    public function getSelectedFarmId() {
        return isset($_SESSION['selectedFarmId']) ? $_SESSION['selectedFarmId'] : null;
    }
}


?>