<?php



class DB
{

    private $db;


    public function __construct($config)
    {



        $dsn = $config['driver'] . ':host=' . $config['host'] . ':' . $config['port'] . ';dbname=' . $config['database'];

        try {
            $this->db = new PDO($dsn, $config['username'], $config['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exceptions
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query($query, $class = null, $params = [])
    {

        $prepare = $this->db->prepare($query);

        if ($class) {
            $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
        }

        $prepare->execute($params);

        return $prepare;
    }
}

$database = new DB(config('database'));
