<?php echo "<h2> Hola mundo de los micro-servicios </h2>";


$enlace = mysqli_connect("miapp-mysql", "root", "123456", "bd_prueba","3306");
//$enlace = mysqli_connect("127.0.0.1", "root", "", "bd_prueba");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;

/* sentencia preparada */
if ($sentencia = $enlace->prepare("SELECT * FROM tb_prueba")) {
    $sentencia->execute();

    /* vincular variables a la sentencia preparada */
    $sentencia->bind_result($col1, $col2);

    /* obtener valores */
    while ($sentencia->fetch()) {
		echo "<br>";
        printf("%s %s\n", $col1, $col2);
    }

    /* cerrar la sentencia */
    $sentencia->close();
}
/* cerrar la conexión */
$enlace->close();

?>
