<?php

// o Doctrine utiliza namespaces em sua estrutura, por isto estes uses
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Doctrine {

    public $entityManager = null;
    private $entidades = array(APPPATH.'models/Entities'); //onde irão ficar as entidades do projeto? Defina o caminho aqui
    private $isDevMode = true;
    private $dbGroup   = 'default';

    public function __construct()
    {
        $CI = &get_instance();

        // load database configuration from CodeIgniter
        require_once APPPATH.'config/database.php';

        // configurações de conexão. Coloque aqui os seus dados
        $dbParams = array(
            'driver'   => $db[$this->dbGroup]['dbdriver'],
            'user'     => $db[$this->dbGroup]['username'],
            'password' => $db[$this->dbGroup]['password'],
            'host'     => $db[$this->dbGroup]['hostname'],
            'dbname'   => $db[$this->dbGroup]['database']
        );

        //setando as configurações definidas anteriormente
        $doctrineConfigs = Setup::createAnnotationMetadataConfiguration($this->entidades, $this->isDevMode);

        //criando o Entity Manager com base nas configurações de dev e banco de dados
        $this->entityManager = EntityManager::create($dbParams, $doctrineConfigs);
    }

}
