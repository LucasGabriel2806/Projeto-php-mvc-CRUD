<?php


// Todos os recursos presentes na classe PDO, também vão estar presentes na classe MySQL
class MySQL extends PDO{

    //private $host     = "localhost";
    private $usuario  = "root";
    private $senha    = "etecjau";
    private $db       = "db_sistema";


    public function __construct()
    {
        // data source name 
        $dsn = "mysql:host=localhost:3307;dbname=" . $this->db;

        // PHP Data Object
        return parent::__construct($dsn, $this->usuario, $this->senha);
        // chamando o metodo construtor da minha classe pai/parent que é o PDO 

        // ->acessa o conteudo da instancia de um objeto
        // ::(Operador de resolução de contexto estatico)acessa o conteudo da classe




    }




}

