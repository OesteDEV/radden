<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Turnos</h4>
			</div>
			<div class="card-content table-responsive">
				<div class="row">
					<div class="col-md-2">
						<a href="./index.php?view=newreservation" class="btn btn-block btn-primary"><i class='fa fa-plus-circle'></i> Nuevo Turno</a>						
					</div>
					<div class="col-md-2">
						<a href="./index.php?view=oldreservations" class="btn btn-block btn-warning"><i class='fa fa-folder-open'></i> Anteriores</a>						
					</div>					
				</div>
			<br>
			<br>
			<form class="form-horizontal" role="form">
				<input type="hidden" name="view" value="reservations">
				<?php
				$pacients = PacientData::getAll();
				$medics = MedicData::getAll();
				$categories = CategoryData::getAll();
				?>
			  <div class="form-group">
			    <div class="col-md-3">
						<div class="input-group">
						  <span class="input-group-addon"><i class="fa fa-search"></i></span>
						  <input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="Palabra clave">
						</div>
			    </div>
			    <div class="col-md-3">
						<div class="input-group">
					  	<span class="input-group-addon"><i class="fa fa-male"></i></span>
							<select name="pacient_id" class="form-control">
							<option value="">PACIENTE</option>
							  <?php foreach($pacients as $p):?>
							    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["pacient_id"]) && $_GET["pacient_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
							  <?php endforeach; ?>
							</select>
						</div>
			    </div>
			    <div class="col-md-3">
						<div class="input-group">
					  	<span class="input-group-addon"><i class="fa fa-support"></i></span>
							<select name="medic_id" class="form-control">
							<option value="">MEDICO</option>
							  <?php foreach($medics as $p):?>
							    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["medic_id"]) && $_GET["medic_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
							  <?php endforeach; ?>
							</select>
						</div>
			    </div>
			    <div class="col-md-3">
						<div class="input-group">
						  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						  <input type="date" name="date_at" value="<?php if(isset($_GET["date_at"]) && $_GET["date_at"]!=""){ echo $_GET["date_at"]; } ?>" class="form-control" placeholder="Palabra clave">
						</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-offset-5 col-md-2 col-md-offset-5">
							<button class="btn btn-primary btn-block"><i class="fa fa-search"></i> Buscar</button>			    		
			    	</div>
			    </div>
			  </div>
			</form>
		<?php
$users= array();
if((isset($_GET["q"]) && isset($_GET["pacient_id"]) && isset($_GET["medic_id"]) && isset($_GET["date_at"])) && ($_GET["q"]!="" || $_GET["pacient_id"]!="" || $_GET["medic_id"]!="" || $_GET["date_at"]!="") ) {
$sql = "select * from reservation where ";
if($_GET["q"]!=""){
	$sql .= " title like '%$_GET[q]%' and note like '%$_GET[q] %' ";
}

if($_GET["pacient_id"]!=""){
if($_GET["q"]!=""){
	$sql .= " and ";
}
	$sql .= " pacient_id = ".$_GET["pacient_id"];
}

if($_GET["medic_id"]!=""){
if($_GET["q"]!=""||$_GET["pacient_id"]!=""){
	$sql .= " and ";
}

	$sql .= " medic_id = ".$_GET["medic_id"];
}



if($_GET["date_at"]!=""){
if($_GET["q"]!=""||$_GET["pacient_id"]!="" ||$_GET["medic_id"]!="" ){
	$sql .= " and ";
}

	$sql .= " date_at = \"".$_GET["date_at"]."\"";
}

		$users = ReservationData::getBySQL($sql);

}else{
		$users = ReservationData::getAll();

}
		if(count($users)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Paciente</th>
			<th>Tipo de Estudio</th>
			<th>Medico</th>
			<th>Fecha</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				$pacient  = $user->getPacient();
				$medic = $user->getMedic();
				$category = $user->getCategory();
				?>
				<tr>
				<td><?php echo $pacient->lastname." ".$pacient->name; ?></td>
				<td><?php echo $category->name; ?></td>
				<td><?php echo $medic->lastname." ".$medic->name; ?></td>
				<td><?php echo $user->date_at." ".$user->time_at; ?></td>
				<td style="width:100px;">
				<a href="index.php?view=editreservation&id=<?php echo $user->id;?>" class="btn btn-dark btn-xs"><i class='fa fa-edit'></i></a>
				<a href="index.php?action=delreservation&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs"><i class='fa fa-trash'></i></a>
				</td>
				</tr>
				<?php

			}
			?>
			</table>
			</div>
			</div>
			<?php



		}else{
			echo "<p class='alert alert-danger'>No hay pacientes</p>";
		}


		?>


	</div>
</div>