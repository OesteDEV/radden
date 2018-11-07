<?php $user = CategoryData::getById($_GET["id"]);?>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="card">
      <div class="card-header" data-background-color="blue">
        <h4 class="title">Editar estudios</h4>
      </div>
      <div class="card-content table-responsive">
        <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatecategory" role="form">
          <div class="form-group">
            <label for="inputEmail1" class="col-md-2">Nombre*</label>
            <div class="col-md-10">
              <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Actualizar Estudio</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-2"></div>
</div>