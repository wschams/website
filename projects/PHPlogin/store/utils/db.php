<?php
class Db {

    private $db;
    private static $instance;

    private function __construct() {
        $ini_array = parse_ini_file("test.ini");
        $cs = "mysql:host=localhost;" . $ini_array['cs'];
        $user = $ini_array['user'];
        $password = $ini_array['password'];

        try {
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $this->db = new PDO($cs, $user, $password, $options);
        } catch (PDOException $e) {
            $error = "Something went wrong " . $e->getMessage();
        }
    }

    private function __clone() {}

    public static function getDb() {
        if(empty(Db::$instance)) {
            Db::$instance = new Db();
        }
        return Db::$instance;
    }

    public function prepare($query) {
        return $this->db->prepare($query);
    }
}
?>