protected function conectar_bd() {
    try {
        $host = getenv("MYSQLHOST");
        $db   = getenv("MYSQLDATABASE");
        $user = getenv("MYSQLUSER");
        $pass = getenv("MYSQLPASSWORD");
        $port = getenv("MYSQLPORT");

        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8";

        $conexion = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        return $this->conexion_bd = $conexion;

    } catch (Exception $e) {
        print "Error en la base de datos: " . $e->getMessage();
        die();
    }
}
