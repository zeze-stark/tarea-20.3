<?php  



CREATE TABLE productos (
    id INT PRIMARY KEY,
    nombre VARCHAR(255),
    precio DECIMAL(10,2)
  );
///Crear una conexión a la base de datos mediante PHP
$servername = "nombre_del_servidor";
$username = "nombre_de_usuario";
$password = "contraseña";
$database = "productos"

$conn = new mysqli($servername, $username, $password, $productos);

if ($conn->connect_error) {
  die("Error al conectar a la base de datos: " . $conn->connect_error);
}
//Crear una función en PHP que inserte un producto en nuestra base de datos
function insertarProducto($id, $nombre, $precio) {
    global $conn;
  
    $sql = "INSERT INTO productos (id, nombre, precio) VALUES ('$id', '$nombre', '$precio')";
  
    if ($conn->query($sql) === TRUE) {
      echo "Producto insertado correctamente";
    } else {
      echo "Error al insertar el producto: " . $conn->error;
    }
  }
///Crear una función que obtenga los productos de nuestra base de datos y los pinte en el frontend
  function obtenerProductos() {
    global $conn;
  
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nombre: " . $row["nombre"]. " - Precio: " . $row["precio"]. "<br>";
      }
    } else {
      echo "No se encontraron productos";
    }
  }
//Crear un script en PHP que inserte 100 productos en la base de datos

for ($i = 1; $i <= 100; $i++) {
  $nombre = "Producto " . $i;
  ///el valor del precio se puede cambiar a necesidad
  $precio = precio(70);
  insertarProducto($i, "Producto " . $i, $precio);
  }

  //Crear una función que elimine todos los productos con ID impar

  function eliminarProductosImpares() {
    global $conn;
  
    $sql = "DELETE FROM productos WHERE id % 2 != 0";
  
    if ($conn->query($sql) === TRUE) {
      echo "Productos eliminados correctamente";
    } else {
      echo "Error al eliminar los productos: " . $conn->error;
    }
  }
/// para poner botonees

insertarProducto("Nuevo Producto", "$ precio", $conn);
obtenerProductos($conn);
eliminarProductosImpares($conn);




?>




