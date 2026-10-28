<?php
// connection.php
// Crea la conexión con la base de datos (como en los apuntes).
    $host   = 'php-db-1';   // Nombre del contenedor de la base de datos
    $dbname = 'aulaTech';   // Nombre de la base de datos
    $user   = 'root';       // Usuario
    $pass   = 'root';       // Contraseña
    $port   = 3306;         // Puerto de MySQL

// DSN: dónde está la base de datos y cómo conectar
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Manejo de errores
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Modo de recuperación
        PDO::ATTR_EMULATE_PREPARES   => false,                  // Desactiva la emulación de sentencias preparadas
    ];

// Conectar a la base de datos
$connection = new PDO($dsn, $user, $pass, $options);
