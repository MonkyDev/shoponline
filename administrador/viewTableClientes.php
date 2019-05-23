<?php 
require_once("../clases/consultas_db.php");
require_once("../clases/conexion.php");
$querys=new consultas;
$db=new conexion;
$result=$querys->ObtieneLosDatosDeLosClientesRegistrados();
?>
<div class="container">
	<div class="table-responsive"> 
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>RFC</th>
            <th>Residencia</th>
            <th>Telefono</th>
            <th>Sexo</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
<?php
while($row=$db->getRows($result)){
?>
          <tr>
            <td><?php echo $row['Nombre'];?></td>
            <td><?php echo $row['RFC'];?></td>
            <td><?php echo $row['Ciudad'];?></td>
            <td><?php echo $row['Telefono'];?></td>
            <td><?php echo $row['sexoLetra'];?></td>
            <td><?php 
					if($row['fk_estatus']==1)
						echo '<font color="#00CC33">'.$row['estatusLetra'].'</font>';
					else 
						echo '<font color="#FF0000">'.$row['estatusLetra'].'</font>';
				?>
            </td>
          </tr>
<?php
}
?>
        </tbody>
      </table>
	</div>
</div>