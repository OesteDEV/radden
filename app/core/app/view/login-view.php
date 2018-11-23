<?php

if(Session::getUID()!=""){
		print "<script>window.location='index.php?view=home';</script>";
}

?>
<br>
<br>
<br>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-4">		
		</div>	
    	<div class="col-md-4">
    	<?php if(isset($_COOKIE['password_updated'])):?>
    		<div class="alert alert-success">
    			<p><i class='glyphicon glyphicon-off'></i> Se ha cambiado la contraseña exitosamente !!</p>
    			<p>Pruebe iniciar sesion con su nueva contraseña.</p>
    		</div>
    		<?php setcookie("password_updated","",time()-18600);
    	 	endif; ?>
			<div class="card">
  				<div class="">
      				<h4 class="title">Acceder al Sistema</h4>
  				</div>
  				<div class="card-content">
			    	<form accept-charset="UTF-8" role="form" method="post" action="index.php?view=processlogin">
	                    <fieldset>
				    	  	<div class="form-group">
				    		    <input class="form-control" placeholder="Usuario" name="mail" type="text">
				    		</div>
				    		<div class="form-group">
				    			<input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
				    		</div>
				    		<input class="btn btn-primary btn-block" type="submit" value="Iniciar Sesion">
				    		<div style="text-align: center; margin-top: 50px;">
				    			<a href="../index.html">Volver</a>
				    		</div>				    		
				    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
		<div class="col-md-4">		
		</div>
	</div>
</div>

