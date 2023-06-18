<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1,h2,h3 {
            text-align: center;
        }
        p {
            text-align: justify;
        }
        table {
            margin: auto;
        }
        tr,th,td {
            border: 1px solid black;
        }
    </style>
    <title>Conexión a una base de datos usando clases en PHP</title>
</head>
<body>

    <h1>Parametros para la conexiòn a la base de datos</h1>
    <p>
        Para está ocación y como ya lo mencioné en la actividad suplementaria, haré uso de una 
        base de datos que habia creado para la materia de "Administración de base de datos", la cual,
        se llama "biblioteca_chango" cuyos parametros de conexión son:
    </p>
    <br>
    <ul>
        <li>usuario: root</li>
        <li>host: localhost</li>
        <li>contraseña: ""</li>
        <li>nombre de la base de datos: biblioteca_chango</li>
    </ul>
    <br>
    <h2>Comprobación de la conexión</h2>
    <?php
        //INCLUIMOS EL ARCHIVO PARA LA CREACIÓN DE LA CLASE CON SUS RESPECTIVAS FUNCIONES
        include ("C:xampp\htdocs\códigos\config.php");

        //CREACIÓN DE UN OBJETO
        $myConection = new conect; //instanciación de un objeto myConection de la clase conect

        //USO DE LAS FUNCIONES SETTERS PARA DEFINIR A QUE BASE DE DATOS CONECTARNOS
        $myConection->setDbhost("localhost");
        $myConection->setDbuser("root");
        $myConection->setDbpass("");
        $myConection->setDbname("biblioteca_chango");

        //CONEXIÓN
        echo '<b>';
            $myConection->conectar();
        echo '</b>';
    ?>
    <br>
    <h3>Ejecución de una consulta</h3>
    <p>
        Como ya se estableció la coneción en la parte de arriba, es hora de usar la función de consulta
        que tiene la clase "conect" a traves de su instanciación con el objeto "myConection", entonces,
        lo que se verá a continuacion es el resultado de ejecutar la consulta "SELECT * FROM autores"
    </p>
    <br>
    <?php
        $sql = "SELECT * FROM autores"; // CREACIOÓN DE LA VARIABLE PARA EL QERY
        $myConection->consulta( $sql );
    ?>
</body>
</html>
