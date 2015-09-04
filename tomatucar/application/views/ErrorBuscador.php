<script>
SetNewCenter(<?php echo $lat; ?>, <?php echo $lng; ?>);
</script>
<?php
if($tipoerror==1)
{ 
?>
<h3> No se encontraron resultados </h3>
<?php
}
else
{ 
?>
<h3> No ofrecemos servicio en esta region </h3>
<?php }  ?>
<!--Enter PANEL TEMPLATE HERE  IMG TO USE=arrendador5.png  NOTA CHECA QUE AUTO ESTE VALIDADO PARA EL LOGIN-->
<div class="panel panel-default" style="margin-bottom: 0px;">
	<div class="panel-body" >
		<div class="row" >
			<div class="col-md-2"></div>
			<div class="col-md-10 col-sm-offset-2">
			<div><h4 style="color:#2272C0; overflow:hidden; text-overflow:ellipsis; white-space: nowrap; font-size: 23px;"><b>¿Tienes un coche en <?php if($ciudad!=""){echo $ciudad;} else{echo 'Mexico';} ?> ?</b></h4></div>
			</div>		
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<img src="<?php echo base_url(); ?>img/arrendador5.png" alt="..." width="160" height="130">
			</div>
			<div class="col-md-7" style="padding-left: 30px;  padding-top: 60px;">
				<button class="btn btn-primary" style="cursor:pointer; width:310px; font-size:1.3em; font-family:sans-serif; letter-spacing:.1em;"  onclick="location.href='<?php echo base_url(); ?>auto';" >¡Registralo Ahora!</button>
			</div>
		</div>
	</div>
</div>
<!--End of PANEL TEMPLATE HERE   -->