<?php
$pacients = PacientData::getAll();
$medics = MedicData::getAll();
$statuses = StatusData::getAll();
$payments = PaymentData::getAll();
$categories = CategoryData::getAll();
?>
<div class="card">
  <div class="row">
    <div class="card-header" data-background-color="blue">
      <h4 class="title">Atencion con Turno</h4>        
    </div>
    <div class="col-md-2">      
    </div>    
    <div class="col-md-8">      
      <form class="form-horizontal" role="form" method="post" action="./?action=addreservation">
        <div class="form-group">
          <label for="inputEmail1" class="col-md-2 ">Asunto</label>
          <div class="col-md-10">
            <input type="text" name="title" required class="form-control" id="inputEmail1">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-md-2 ">Paciente</label>
          <div class="col-md-10">
            <select name="pacient_id" class="form-control" required>
              <option value="">-- SELECCIONE --</option>
              <?php foreach($pacients as $p):?>
                <option value="<?php echo $p->id; ?>"><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-md-2">Tipo de Estudio</label>
          <div class="col-md-10">
          <select name="category_id" class="form-control">
          <option value="">-- SELECCIONE --</option>      
          <?php foreach($categories as $cat):?>
          <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>      
          <?php endforeach;?>
          </select>
          </div>
        </div>  
        <div class="form-group">
          <label for="inputEmail1" class="col-md-2 ">Medico</label>
          <div class="col-md-10">
            <select name="medic_id" class="form-control" required>
            <option value="">-- SELECCIONE --</option>
              <?php foreach($medics as $p):?>
                <option value="<?php echo $p->id; ?>"><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-md-2 ">Fecha</label>
          <div class="col-md-4">
            <input type="date" name="date_at" required class="form-control" id="inputEmail1" placeholder="Fecha">
          </div>
          <label for="inputEmail1" class="col-md-2 ">Hora</label>
          <div class="col-md-4">
            <input type="time" name="time_at" required class="form-control" id="inputEmail1" placeholder="Hora">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-md-2 ">Estado del turno</label>
          <div class="col-md-10">
            <select name="status_id" class="form-control" required>
              <?php foreach($statuses as $p):?>
                <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-md-2 ">Estado del pago</label>
          <div class="col-md-10">
          <select name="payment_id" class="form-control" required>
            <?php foreach($payments as $p):?>
              <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
            <?php endforeach; ?>
          </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-md-2 ">Costo</label>
          <div class="col-md-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-usd"></i></span>
              <input type="text" class="form-control" name="price">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar Turno</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-2">      
    </div>     
  </div>
</div>