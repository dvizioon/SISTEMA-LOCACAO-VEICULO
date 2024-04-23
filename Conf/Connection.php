
<?php
class Conn
{
    private $host = 'localhost';
    private $db   = 'slveiculos';
    private $user = 'usuario...';
    private $pass = 'senha...';
    private $charset = 'utf8mb4';

    protected static $pdo;

    public function __construct()
    {
        if (self::$pdo) {
            return self::$pdo;
        }

        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        self::$pdo = new PDO($dsn, $this->user, $this->pass, $opt);
    }

    public static function getConn()
    {
        if (!self::$pdo) {
            new Conn();
        }

        return self::$pdo;
    }
}

// $pdo = Conn::getConn();
// // var_dump($pdo);
?>
