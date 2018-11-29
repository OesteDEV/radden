<?php
$pacients = PacientData::getAll();
$medics = MedicData::getAll();
$statuses = StatusData::getAll();
$payments = PaymentData::getAll();
$payments_types = Payment_typeData::getAll();
$categories = CategoryData::getAll();
?>
<div class="card">
  <div class="row">
    <div class="card-header" data-background-color="blue">
      <h6 class="title">Atencion con Turno</h6>        
    </div>    
    <div class="col-md-offset-1 col-md-10">
      <hr>
      <form class="form-vertical" role="form" method="post" action="./?action=addreservation">
        <div class="row">
          <div class="form-groups">
            <div class="col-md-3">
              <h6>Fecha</h6>
              <input type="date" name="date_at" required class="form-control" id="inputEmail1" placeholder="Fecha">
            </div>
          </div>
          <div class="form-groups">          
            <div class="col-md-3">
              <h6>Hora</h6>
              <input type="time" name="time_at" required class="form-control" id="inputEmail1" placeholder="Hora">
            </div>
          </div>         
        </div>
        <hr> 
        <div class="row">
          <div class="form-groups">
            <div class="col-md-6">
              <h6>Paciente</h6>
              <select name="pacient_id" class="selectpicker" data-width="100%" data-live-search="true" required>
                <option></option>
                <?php foreach($pacients as $p):?>
                  <option value="<?php echo $p->id; ?>"><?php echo $p->lastname." ".$p->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-groups">
            <div class="col-md-6">
              <h6>Tipo de Cobertura</h6>
              <select name="medic_id" class="selectpicker" data-width="100%" data-live-search="true" required>
                <option></option>
                <?php foreach($medics as $p):?>
                  <option value="<?php echo $p->id; ?>"><?php echo $p->lastname." ".$p->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>           
        </div>
        <hr>
        <div class="row">
          <div class="form-groups">
            <div class="col-md-6">
              <h6>Tipo de Estudio</h6>
              <select name="category_id" class="sel selectpicker" data-width="100%" data-live-search="true">
              <option></option>      
              <?php foreach($categories as $p):?>
              <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>      
              <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="form-groups">
            <div class="col-md-6">
              <h6>Técnico Asignado</h6>
              <select name="medic_id" class="selectpicker" data-width="100%" data-live-search="true" required>
              <option></option> 
                <?php foreach($medics as $p):?>
                  <option value="<?php echo $p->id; ?>"><?php echo $p->lastname." ".$p->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>          
        </div>
        <hr>
        <div class="row">
          <div class="form-groups">
            <div class="col-md-6">
              <h6>Estado de pago</h6> 
              <select name="payment_id" class="selectpicker" data-width="100%" data-live-search="true">
              <option></option>                
                <?php foreach($payments as $p):?>
                  <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <h6>Estado del turno</h6>
              <select name="status_id" class="selectpicker" data-width="100%" data-live-search="true">
              <option></option>               
                <?php foreach($statuses as $p):?>
                  <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="form-groups">
            <div class="col-md-6">
              <h6>Costo del Estudio</h6>
              <div class="input-groups">
                <input type="number" step="0.01" class="form-control" name="price">
              </div>
            </div>
            <div class="col-md-6">
              <h6>Forma de pago</h6>
              <select name="payment_type_id" class="selectpicker" data-width="100%" data-live-search="true">
                <option></option>
                <?php foreach($payments_types as $p):?>
                  <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>          
        </div>
        <br>
        <div class="form-groups">
          <div class="col-md-offset-4 col-md-4 col-md-offset-4">
            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class='fa fa-plus-circle'></i> Guardar Turno</button>
          </div>
        </div>
      </form>
    </div>    
  </div>
</div>