<?php
$pacients = PacientData::getAll();
$medics = MedicData::getAll();

$statuses = StatusData::getAll();
$payments = PaymentData::getAll();

?>
<div class="card">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="card-header" data-background-color="blue">
        <h4 class="title">Atencion con Turno</h4>        
      </div>      
      <form class="form-horizontal" role="form" method="post" action="./?action=addreservation">
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 ">Asunto</label>
          <div class="col-lg-4">
            <input type="text" name="title" required class="form-control" id="inputEmail1">
          </div>
          <label for="inputEmail1" class="col-lg-2 ">Paciente</label>
          <div class="col-lg-4">
            <select name="pacient_id" class="form-control" required>
              <option value="">-- SELECCIONE --</option>
              <?php foreach($pacients as $p):?>
                <option value="<?php echo $p->id; ?>"><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 ">Medico</label>
          <div class="col-lg-4">
            <select name="medic_id" class="form-control" required>
            <option value="">-- SELECCIONE --</option>
              <?php foreach($medics as $p):?>
                <option value="<?php echo $p->id; ?>"><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <label for="inputEmail1" class="col-lg-2 ">Fecha/Hora</label>
          <div class="col-lg-2">
            <input type="date" name="date_at" required class="form-control" id="inputEmail1" placeholder="Fecha">
          </div>
          <div class="col-lg-2">
            <input type="time" name="time_at" required class="form-control" id="inputEmail1" placeholder="Hora">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 ">Estado del turno</label>
          <div class="col-lg-4">
            <select name="status_id" class="form-control" required>
              <?php foreach($statuses as $p):?>
                <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <label for="inputEmail1" class="col-lg-2 ">Estado del pago</label>
          <div class="col-lg-4">
          <select name="payment_id" class="form-control" required>
            <?php foreach($payments as $p):?>
              <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
            <?php endforeach; ?>
          </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 ">Costo</label>
          <div class="col-lg-4">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-usd"></i></span>
              <input type="text" class="form-control" name="price">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-default">Agregar Cita</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>