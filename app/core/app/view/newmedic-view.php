<?php
$categories = CategoryData::getAll();
?>
<div class="row">
  <div class="col-md-2"></div>
	<div class="col-md-8">
    <div class="card">
      <div class="card-header" data-background-color="blue">
        <h4 class="title">Nuevo Medico</h4>
      </div>
      <div class="card-content table-responsive">
    		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addmedic" role="form">
          <div class="form-group">
            <label for="inputEmail1" class="col-md-2">Area*</label>
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
            <label for="inputEmail1" class="col-md-2">Nombre*</label>
            <div class="col-md-10">
              <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-2">Apellido*</label>
            <div class="col-md-10">
              <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-2">Direccion*</label>
            <div class="col-md-10">
              <input type="text" name="address" class="form-control"  id="address" placeholder="Direccion">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-2">Email*</label>
            <div class="col-md-10">
              <input type="text" name="email" class="form-control" id="email" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-2">Telefono*</label>
            <div class="col-md-10">
              <input type="text" name="phone" class="form-control" id="phone" placeholder="Telefono">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Agregar Medico</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-2"></div>  
</div>