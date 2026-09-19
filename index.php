<?php

include("conexion.php");

$sql = "SELECT * FROM postes ORDER BY id DESC";
$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro de Postes</title>

    <link rel="stylesheet" href="estilos.css">

</head>

<body>

<div class="contenedor">

    <h1>Registro de Postes Electricos de Empresa Electrica</h1>

    <p class="subtitulo">
        Departamento de Zacapa
        Municipio de Zacapa
    </p>

    <div class="formulario">

        <h2>Registrar nuevo poste</h2>

        <form action="guardar.php" method="POST">

            <div class="grupo">

                <label>No. de poste:</label>

                <input
                    type="text"
                    name="numero_poste"
                    placeholder="P-001"
                    required
                >

            </div>


            <div class="grupo">

                <label>Fecha a registrar:</label>

                <input
                    type="date"
                    name="fecha_registro"
                    placeholder="01/01/2026"
                    required
                >

            </div>


            <div class="grupo">

                <label>Direccion donde esta ubicado:</label>

                <input
                    type="text"
                    name="direccion"
                    placeholder=" "
                    required
                >

            </div>


            <div class="fila">

                <div class="grupo">

                    <label>Departamento:</label>

                    <input
                        type="text"
                        name="departamento"
                        value=" "
                        required
                    >

                </div>


                <div class="grupo">

                    <label>Municipio:</label>

                    <input
                        type="text"
                        name="municipio"
                        placeholder=" "
                        required
                    >

                </div>

            </div>


            <div class="grupo">

                <label>Referencia:</label>

                <input
                    type="text"
                    name="referencia"
                    placeholder=" "
                    required
                >

            </div>


            <div class="fila">

                <div class="grupo">

                    <label>Latitud:</label>

                    <input
                        type="number"
                        step="any"
                        name="latitud"
                        placeholder="11.1111111"
                        required
                    >

                </div>


                <div class="grupo">

                    <label>Longitud:</label>

                    <input
                        type="number"
                        step="any"
                        name="longitud"
                        placeholder="-22.222222"
                        required
                    >

                </div>

            </div>


            <button type="submit">
                Registrar Poste
            </button>

        </form>

    </div>


    <div class="tabla">

        <h2>Consulta de postes ingresados</h2>

        <div class="tabla-responsive">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>No de Poste</th>
                        <th>Fecha a registrar</th>
                        <th>Direccion</th>
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Referencia</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                        <th>Accion</th>

                    </tr>

                </thead>


                <tbody>

                <?php

                if ($resultado->num_rows > 0) {

                    while ($poste = $resultado->fetch_assoc()) {

                ?>

                    <tr>

                        <td>
                            <?php echo $poste['id']; ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($poste['numero_poste']); ?>
                        </td>

                        <td>
                            <?php echo $poste['fecha_registro']; ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($poste['direccion']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($poste['departamento']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($poste['municipio']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($poste['referencia']); ?>
                        </td>

                        <td>
                            <?php echo $poste['latitud']; ?>
                        </td>

                        <td>
                            <?php echo $poste['longitud']; ?>
                        </td>

                        <td>

                            <a
                                class="btn-eliminar"
                                href="eliminar.php?id=<?php echo $poste['id']; ?>"
                                onclick="return confirm('¿Está seguro de eliminar este poste?');"
                            >
                                Eliminar
                            </a>

                        </td>

                    </tr>

                <?php

                    }

                } else {

                ?>

                    <tr>

                        <td colspan="10" class="sin-datos">

                            No hay postes registrados.

                        </td>

                    </tr>

                <?php

                }

                ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>

</html>