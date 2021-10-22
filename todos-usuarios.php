<div class="container">
    <div class="row">
        <h2 class="text-primary mb-1 d-grid">
            <center>Listado de Usuarios</center>
        </h2>
        <div>
        <table class="table  table-striped table-hover table-bordered" id="data">
        <thead class="thead-dark">
            <tr>
            <th scope="col">N°</th>
            <th scope="col">USUARIO</th>
            <th scope="col">CONTRASEÑA</th>
            <th scope="col">TIPO DE USUARIO</th>
            <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $query=mysqli_query($db_con,'SELECT * FROM `USUARIO`;');
            $i=1;
            while ($result = mysqli_fetch_array($query)) { ?>
            <tr>
                <?php 
                echo '<td>'.$i.'</td>
                <td>'.$result['USUARIO'].'</td>
                <td>'.$result['CONTRASENA'].'</td>
                <td>'.$result['TIPODEUSUARIO'].'</td>
                <td>
                    <a class="btn btn-xs btn-warning" href="">
                    <i class="fa fa-edit">EDITAR</i></a></td>';?>
            </tr>  
            <?php $i++;} ?>
            
        </tbody>
        </table>
        </div>
    </div>
</div>