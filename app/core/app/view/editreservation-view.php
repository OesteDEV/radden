<?php 
$reservation = ReservationData::getById($_GET["id"]);
$pacients = PacientData::getAll();
$medics = MedicData::getAll();
$statuses = StatusData::getAll();
$payments = PaymentData::getAll();
?>
<div class="row">
  <div class="card-header" data-background-color="blue">
    <h4 class="title">Modificar Turno</h4>
  </div>
	<div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-content table-responsive">
        <form class="form-horizontal" role="form" method="post" action="./?action=updatereservation">
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Asunto</label>
            <div class="col-md-8">
              <input type="text" name="title" value="<?php echo $reservation->title; ?>" required class="form-control" id="inputEmail1" placeholder="Asunto">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Paciente</label>
            <div class="col-md-8">
              <select name="pacient_id" class="form-control" required>
              <option value="">Seleccionar</option>
              <?php foreach($pacients as $p):?>
                <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->pacient_id){ echo "selected"; }?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
              <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Medico</label>
            <div class="col-md-8">
              <select name="medic_id" class="form-control" required>
                <option value="">Seleccionar</option>
                <?php foreach($medics as $p):?>
                  <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->medic_id){ echo "selected"; }?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
                <?php endforeach; ?>
              </select>
            </div>            
          </div>  
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Fecha/Hora</label>
            <div class="col-md-4">
              <input type="date" name="date_at" value="<?php echo $reservation->date_at; ?>" required class="form-control" id="inputEmail1" placeholder="Fecha">
            </div>
            <div class="col-md-4">
              <input type="time" name="time_at" value="<?php echo $reservation->time_at; ?>" required class="form-control" id="inputEmail1" placeholder="Hora">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Nota</label>
            <div class="col-md-8">
              <textarea class="form-control" name="note" placeholder="Nota"><?php echo $reservation->note;?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Enfermedad</label>
            <div class="col-md-8">
              <textarea class="form-control" name="sick" placeholder="Enfermedad"><?php echo $reservation->sick;?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Sintomas</label>
            <div class="col-md-8">
              <textarea class="form-control" name="symtoms" placeholder="Sintomas"><?php echo $reservation->symtoms;?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Medicamentos</label>
            <div class="col-md-8">
              <textarea class="form-control" name="medicaments" placeholder="Medicamentos"><?php echo $reservation->medicaments;?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Estado de la cita</label>
            <div class="col-md-8">
              <select name="status_id" class="form-control" required>
              <?php foreach($statuses as $p):?>
                <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->status_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
              <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Estado del pago</label>
            <div class="col-md-8">
              <select name="payment_id" class="form-control" required>
              <?php foreach($payments as $p):?>
                <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->payment_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
              <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Costo</label>
            <div class="col-md-8">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                <input type="text" class="form-control" value="<?php echo $reservation->price;?>" name="price" placeholder="Costo">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-2 col-md-8">
            <input type="hidden" name="id" value="<?php echo $reservation->id; ?>">
              <button type="submit" class="btn btn-default">Actualizar Cita</button>
            </div>
          </div>
        </form>
      </div>
    </div>
	</div>
</div>