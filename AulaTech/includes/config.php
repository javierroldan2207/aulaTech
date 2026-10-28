<?php
// config.php
// Solo guarda los datos de conexión. Si cambian, se cambian aquí.
return [
    'db' => [
        'host'   => 'php-db-1',        // Nombre del servicio de MySQL en docker-compose.yml
        'port'   => 3306,
        'dbname' => 'aulatech',  // Base de datos que crea aulatech.sql
        'user'   => 'root',
        'pass'   => 'root',
    ]
];