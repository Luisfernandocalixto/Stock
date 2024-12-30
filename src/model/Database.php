<?php

namespace App\Stock\model;

use PDO;
use PDOException;

class Database
{
    private string $host;
    private string $db;
    private string $user;
    private string $password;
    private string $charset;

    public function __construct()
    {
        $this->host =     "";    // Cambia esto según tu configuración
        $this->db =       "";    // Nombre de la base de datos
        $this->user =     "";  // Usuario de la base de datos
        $this->password = "";     // Contraseña de la base de datos
        $this->charset =  ""; // Asegúrate de que el charset sea correcto
    }

    public function connect(): PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $pdo = new PDO($dsn, $this->user, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            throw new PDOException("Database connection failed: " . $e->getMessage());
        }
    }
}
