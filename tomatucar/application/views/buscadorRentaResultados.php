<?php 
			   if($rentas){
			   	foreach ($rentas as $item): 
			   	?>	
			   	<a href="<?php echo base_url(); ?>autodetallerenta/<?php echo $item['idRenta'];?>">
			   <div class="panel panel-default" style="margin-bottom: 0px;">
			   <div class="panel-body">
			   	
			   	<div class="col-md-12">
					<h4> <?php 
					if($item['usuarioD']==$id){echo $item['NombreU'];} else {echo $item['Marca']." ".$item['Modelo'];}?> </h4>
				</div>
				<!--Contenido de renta--> 	
				<div class="col-md-2">
				<?php if($item['usuarioD']==$id){?>
					  <?php if($item['FotoA'] > ""):?>	
			      		<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['FotoA'];?>" alt="..." class="img-thumbnail" width="100px" height="100px" style="max-height: 100px; max-width: 100px; min-height: 100px; min-width: 100px">
			    	  <?php else: ?><!--ASK IF WE HAVE DEFAULT PROFILE PIC-->
			    		<img  src="<?php echo base_url(); ?>img/userpic.gif" alt="..." class="img-thumbnail" width="100px" height="100px" style="max-height: 100px; max-width: 100px; min-height: 100px; min-width: 100px">
			     	  <?php endif; ?>
				<?php }else{ ?>	
			     	 <?php if($item['FotoU'] > ""):?>	
			      		<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['FotoU'];?>" alt="..." class="img-thumbnail" width="100px" height="100px" style="max-height: 100px; max-width: 100px; min-height: 100px; min-width: 100px">
			     	 <?php else: ?>
			    		<img  src="<?php echo base_url(); ?>img/userpic.gif" alt="..." class="img-thumbnail" width="100px" height="100px" style="max-height: 100px; max-width: 100px; min-height: 100px; min-width: 100px">
			     	 <?php endif; ?>
			    <?php } ?>	
			    </div>
			    <div class="col-md-1">
			     <h5> <?php echo $item['NombreU']." ".$item['ApellidoU'];?> </h5>
			    </div>
			    <div class="col-md-5" STYLE="padding-left: 40px; padding-top: 10px;">
			     <h6> Rentado: <?php echo $item['FechaI'];?> a <?php echo $item['FechaF'];?>  </h6>
			     </div>
			     <div class="col-md-2">
			     <h5> Precio: <?php echo $item['Precio'];?>/dia </h5>
			     </div>
			     <div class="col-md-2">
			      <?php if($item['IdStatus']==1){?><h5><font color="orange">En progreso</font></h5> <?php }?>
			      <?php if($item['IdStatus']==2){?><h5><font color="red">Cancelada</font></h5> <?php }?> 
			      <?php if($item['IdStatus']==3){?><h5><font color="green">Confirmada</font></h5> <?php }?>    
			      </div>
			   </div> 
			   </div>
			   </a>
				  <?php endforeach; }
                  else {echo "No tienes ninguna renta";} ?>