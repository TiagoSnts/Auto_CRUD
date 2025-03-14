<?php
class Database {
    private static $host = "localhost";
    private static $db_name = "autopecas";
    private static $username = "root";
    private static $password = "";
    private static $conn;

    public static function getConnection() {
        if (!isset(self::$conn)) {
            try {
                self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$username, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exception) {
                die("Erro de conexão: " . $exception->getMessage());
            }
        }
        return self::$conn;
    }
}