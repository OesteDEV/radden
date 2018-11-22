<?php 
$reservation = ReservationData::getById($_GET["id"]);
$pacients = PacientData::getAll();
$medics = MedicData::getAll();
$statuses = StatusData::getAll();
$payments = PaymentData::getAll();
$payments_types = Payment_typeData::getAll();
$categories = CategoryData::getAll();
?>
<script>
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
</script>
<div class="card">
  <div class="row">
    <div class="card-header" data-background-color="blue">
      <h4 class="title">Modificar Turno</h4>
    </div>
    <div  id="printableArea" class="col-md-8 col-md-offset-2">
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
                  <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->pacient_id){ echo "selected"; }?>><?php echo $p->lastname." ".$p->name; ?></option>
                <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-md-4">Tipo de Estudio</label>
              <div class="col-md-8">
              <select name="category_id" class="form-control">
              <option value="">Seleccionar</option>      
              <?php foreach($categories as $p):?>
              <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>      
              <?php endforeach;?>
              </select>
              </div>
            </div> 
            <div class="form-group">
              <label for="inputEmail1" class="col-md-4">Medico</label>
              <div class="col-md-8">
                <select name="medic_id" class="form-control" required>
                  <option value="">Seleccionar</option>
                  <?php foreach($medics as $p):?>
                    <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->medic_id){ echo "selected"; }?>><?php echo $p->lastname." ".$p->name; ?></option>
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
              <label for="inputEmail1" class="col-md-4">Estado del turno</label>
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
              <label for="inputEmail1" class="col-md-4 ">Forma de pago</label>
              <div class="col-md-8">
              <select name="payment_type_id" class="form-control" required>
                <?php foreach($payments_types as $p):?>
                  <option value="<?php echo $p->payment_type_id;?>"><?php echo $p->name; ?></option>
                <?php endforeach; ?>
              </select>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <input type="hidden" name="id" value="<?php echo $reservation->id; ?>">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Actualizar Cita</button>
                </div>
                <div class="col-md-4">
                  <input type="button" class="btn btn-primary btn-lg btn-block" onclick="printDiv('printableArea')" value="Imprimir Constancia"/>
                </div>
                <div class="col-md-4">
                  <a href="index.php?action=delreservation&id=<?php echo $reservation->id;?>" class="btn btn-primary btn-lg btn-block">Eliminar Turno</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>  
</div>
