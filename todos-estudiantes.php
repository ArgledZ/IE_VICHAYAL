<div class="container">
    <div class="row">
        <h2 class="text-primary mb-1 d-grid">
            <center>Listado de Estudiantes</center>
        </h2>
        <div>
        <table class="table  table-striped table-hover table-bordered" id="data">
        <thead class="thead-dark">
            <tr>
            <th scope="col">N°</th>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Fecha de Naimiento</th>
            <th scope="col">Direccion</th>
            <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $query=mysqli_query($db_con,'SELECT * FROM `ESTUDIANTE`;');
            $i=1;
            while ($result = mysqli_fetch_array($query)) { ?>
            <tr>
                <?php 
                echo '<td>'.$i.'</td>
                <td>'.$result['EST_DNI'].'</td>
                <td>'.$result['EST_NOMBRES'].'</td>
                <td>'.$result['EST_APELLIDOS'].'</td>
                <td>'.$result['EST_FECHA'].'</td>
                <td>'.$result['EST_DIRECCION'].'</td>
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