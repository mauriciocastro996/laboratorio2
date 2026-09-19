<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero_poste = $_POST["numero_poste"];
    $fecha_registro = $_POST["fecha_registro"];
    $direccion = $_POST["direccion"];
    $departamento = $_POST["departamento"];
    $municipio = $_POST["municipio"];
    $referencia = $_POST["referencia"];
    $latitud = $_POST["latitud"];
    $longitud = $_POST["longitud"];


    $partes = explode("/", $fecha_registro);

    if (count($partes) == 3) {

        $dia = $partes[0];
        $mes = $partes[1];
        $anio = $partes[2];

        $fecha_registro = $anio . "-" . $mes . "-" . $dia;

    }


    $sql = "INSERT INTO postes
            (
                numero_poste,
                fecha_registro,
                direccion,
                departamento,
                municipio,
                referencia,
                latitud,
                longitud
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";


    $stmt = $conn->prepare($sql);


    $stmt->bind_param(
        "ssssssdd",
        $numero_poste,
        $fecha_registro,
        $direccion,
        $departamento,
        $municipio,
        $referencia,
        $latitud,
        $longitud
    );


    if ($stmt->execute()) {

        header("Location: index.php");

        exit();

    } else {

        echo "Error al registrar el poste: " . $conn->error;

    }


    $stmt->close();

}


$conn->close();

?>