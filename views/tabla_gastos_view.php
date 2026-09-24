
<!doctype html>
<html>
    <head>
        <title>Registro de gastos</title>
    </head>
    <body>
        <h1>Lista de gastos</h1>

        <nav>
            <ul>
                <li><a href="<?php echo $url; ?>/index.php">Inicio</a></li>
                <li><a href="<?php echo $url; ?>/tabla_gastos.php">Tabla gastos</a></li>
                <li><a href="<?php echo $url; ?>/cerrar_sesion.php">Cerrar sesion</a></li>
            </ul>
        </nav>

        <h2>Tabla gastos</h2>

        <form action="" method="get">
            <h3>Buscar por fecha</h3>
            <label for="fechaInicial">Fecha Inicial</label>
            <input type="date" id="fechaInicial" name="fechaInicial" value="<?php echo date('Y-m-d')?>" required/>

            <br>
            <label for="fechaFinal">Fecha final</label>
            <input type="date" id="fechaFinal" name="fechaFinal" value="<?php echo date('Y-m-d')?>" required/>

            <br><br>
            <input type="submit" text="Solicitar"/>
        
        </form>

        <nav>
            <ul>
                <li><a href="<?php echo $url; ?>/tabla_gastos.php?periodo=semana&fecha=<?php echo date('Y-m-d');?>">semana</a></li>
                <li><a href="<?php echo $url; ?>/tabla_gastos.php?periodo=mes&fecha=<?php echo date('Y-m-d');?>">mes</a></li>
                <li><a href="<?php echo $url; ?>/tabla_gastos.php?periodo=anio&fecha=<?php echo "". date('Y-m-d');?>">anio</a></li>
            </ul>
        </nav>

        <table>
            <tr>
                <th>Id</th>
                <th>Concepto</th>
                <th>Fecha</th>
                <th>Cantidad</th>
            </tr>
            <?php
                $total = 0;
                foreach($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['concepto'] . "</td>";
                    echo "<td>" . $row['fecha'] . "</td>";
                    echo "<td>" . $row['cantidad'] . "</td>" ;
                    echo "<td><a href='" . $url . "/tabla_gastos.php?eliminar=". $row['id'] . "'>Eliminar</a></td>";
                    echo "</tr>";

                    $total = $total + intval($row['cantidad']);
                }
            ?>
        </table>

        <h3>Total <?php echo $total; ?></h3>


    </body>


</html>