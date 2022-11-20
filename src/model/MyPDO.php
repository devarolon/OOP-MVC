<?php
namespace MyApp\model;
class MyPDO
{
    protected static $instance;
    protected $pdo;

    public function __construct($config)
    {
        $opt = array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::ATTR_EMULATE_PREPARES => FALSE,
        );
        $dsn = "mysql:host=$config[db_host];
                dbname=$config[db_name];
                charset=$config[db_char]";
        $this->pdo = new \PDO($dsn, $config['db_user'], $config['db_pw'], $opt);
    }

    // a classical static method to make it universally available
    public static function instance()
    {
        if (self::$instance === null) {
            $config = parse_ini_file(__DIR__ . '/../php.ini');
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    // a proxy to native PDO methods
    public function __call($method, $args)
    {
        return call_user_func_array(array($this->pdo, $method), $args);
    }

    // a helper function to run prepared statements smoothly
    public function run($sql, $args = [])
    {
        if (!$args) {
            return $this->query($sql);
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

}

