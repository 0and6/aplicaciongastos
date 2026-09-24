
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

        <h2>Ingresar gastos</h2>

        <form action="" method="post">
            <label for="concepto">Concepto</label>
            <input type="text" id="concepto" name="concepto" required/>

            <br>
            <label for="cantidad">Cantidad</label>
            <input type="number" id="cantidad" name="cantidad" required/>

            <br>
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>" required/>
        
            <br><br>
            <input type="submit" text="Guardar"/>
        
        </form>

        <table>
            <tr>
                <th>Concepto</th>
                <th>Fecha</th>
                <th>Cantidad</th>
            </tr>
            <?php
            
            if($guardarDatos) {
                echo '<tr>';
                echo "<td>$concepto</td>";
                echo "<td>$fecha</td>";
                echo "<td>$cantidad</td>";
                echo '</tr>';

            }

            ?>
        </table>


    </body>


</html>