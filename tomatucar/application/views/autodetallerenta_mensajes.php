

<!--Si no hay mensajes-->
<?php if($mensajes==""):?>	

	<p class="text-muted">No hay ningun mensaje en esta conversación.<p>


<?php else: ?>
	<!-- iterar en los mensajes-->
	<?php foreach ($mensajes as $item): ?>

	<div class="row message-row" style="padding:15px;height:180px;<?php echo $item['idRemitente']==$miId?'Background-color: #E7EFE4;':'';?>">
		<!-- Imagen y nombre-->
		<div class="col-md-2">
			<?php if($item['FotoPerfil']>""): ?>
				<img src="<?php echo base_url()?>uploads/<?php echo $item['FotoPerfil']?>"
			<?php else: ?>
				<img src="<?php echo base_url()?>img/userpic.gif"
			<?php endif ?>
			class="img-responsive center-block"  style="max-height:180px;width:50px;border-radius: 8px;">
			<h4 class="colortext text-center"><?php echo $item['Nombre']." ".$item['Apellido'];?></h4>
		</div>
		<!-- Mensaje -->
		<div class="col-md-10">
			<div class="panel panel-default" style="margin:0px; height:130px">
				<div class="panel-body" style="">
					<?php echo $item['Mensaje'];?>
				</div>
			</div>
		</div>

	</div>

<?php endforeach; ?>

<?php endif; ?>	

