<!--comienza el contenido-->
<script src="<?php echo base_url(); ?>js/jquery-ui-1.11.1.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-migrate-1.2.1.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/ui-lightness/jquery-ui-1.10.4.custom.css">
<!-- mdp demo code -->
<style>
		.deshabilitado{background:rgba(200,200,200,0.1); border: 1px solid #E3E5E6;border-color: #E3E5E6;}
		.mesnodisponible {width: 50%; height: 28px; float:left; position: relative; z-index: 1;}
		.habilitado{border: 1px solid #E3E5E6;border-color: #C8E1B9;}
		.nohabilitado{border-right: 1px solid #E3E5E6;border-left: 1px solid #E3E5E6; border-bottom: 1px solid #E3E5E6;border-color: rgba(0,0,0,0.2);}
		td,th{text-align: center; width: 10%}
		.day-number{position: absolute; z-index: 0;width: 12%; padding: 3px 0px;}
		.disponible {background-color: rgba(103,213,0,0.2); width: 50%; height: 28px; float:left; position: relative; z-index: 1;}
		.nodisponible {background-color: rgba(0,0,0,0.2); width: 50%; height: 28px; float:left; position: relative; z-index: 1;}
		/*.rentado {background-color: rgba(255,0,62,0.2); width: 50%; height: 28px; float:left; position: relative; z-index: 1;}*/
		div.disponible:hover{ background: rgba(74,153,224,0.5); border-color: #74a5cd; }
		div.nodisponible:hover{ background: rgba(74,153,224,0.5); border-color: #74a5cd; }
		div.rentado:hover{ background: rgba(74,153,224,0.5); border-color: #74a5cd; }
		.buttonDisponible{background-color: rgba(103,213,0,0.2);font-weight: bold;color: #fff; text-shadow: 0px 1px 0px rgba(0,0,0,0.2);}
		.buttonNoDisponible{ background-color: rgba(0,0,0,0.2);font-weight: bold;color: #fff; text-shadow: 0px 1px 0px rgba(0,0,0,0.2);}
		.inicio{background: rgba(74,153,224,0.5) url('../img/start.png') !important;background-size: contain !important;}
		.fin{background: rgba(74,153,224,0.5) url('../img/end.png') !important;background-size: contain !important;}
		.test{background: rgba(74,153,224,0.5); border-color: #74a5cd;}
		.full-row{width:70%; display: inline-block;}
		.row{ margin-right: -120px;  margin-left: 25px;}
		.col-sm-4 {width:90%;}
		.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {float: none;}
	</style>
	
	<script>

		var arrCalendar = []; var base_url='<?php echo base_url();?>';
		var arrayID = [], arrayDia = [], arrayDate = [], jh=0, idP =0, p=0;
		var cont=0, ciclo =0, indice = 0, check = true;

		(function($){
			$.log = function(value){
				if(console)
					console.log(value);
			}
			$.log.group = function(value){
				if(console && console.group)
					console.group(value);
			}
			$.log.groupEnd = function(){
				if(console && console.group)
					console.groupEnd();
			}
		})(jQuery);
		$(function() 
		{
			$( "#dialog" ).dialog({autoOpen: false});
			$( "#dialog_f" ).dialog({autoOpen: false});
		});


		String.prototype.fechaDDMMAAAA = function() {
				return this.replace(/^(\d{2})\/(\d{2})\/(\d{4})$/, "$2/$1/$3");
			}

		function callAjax(data,url){
			j1={ok:0};
			if(data!="undefined"&&url!="undefined"){
				$.ajax({
					type: "GET",
					url: url,
					data: data,
					success: function(j){
						j1=$.parseJSON(j); 
					},
					error:function(j){
						
					},
					async: false
				}); 
			 }
			return(j1);
		}

		function loadCalendar()
		{
			<?php
			if (!empty($paintCalendar)){
			foreach ($paintCalendar as $value) {
			$fechaIC = $value['fechainicio'];
			$fechaFC = $value['fechafin'];
			$fechainicioampm = $value['fechainicioampm'];
			$fechafinampm = $value['fechafinampm'];
			$fechaEstus = $value['estatus'];?>
			
			fecha_inicio = <?php echo "'".$fechaIC."'";?>;
			fecha_fin = <?php echo "'".$fechaFC."'";?>;
			fechafinampm = <?php echo $fechafinampm; ?>;
			fechainicioampm = <?php echo $fechainicioampm; ?>;
			
			fechaI_dia = fecha_inicio.charAt(8)+fecha_inicio.charAt(9);
			fechaI_mes = fecha_inicio.charAt(5)+fecha_inicio.charAt(6);
			fechaI_anio = fecha_inicio.charAt(0)+fecha_inicio.charAt(1)+fecha_inicio.charAt(2)+fecha_inicio.charAt(3);
			fechaF_dia = fecha_fin.charAt(8)+fecha_fin.charAt(9);
			fechaF_mes = fecha_fin.charAt(5)+fecha_fin.charAt(6);
			fechaF_anio = fecha_fin.charAt(0)+fecha_fin.charAt(1)+fecha_fin.charAt(2)+fecha_fin.charAt(3);
			
			fechamesDecremento=0; diainicio=0;
			url=<?php echo '"'.base_url()."library/getmes.php".'"'?>;
			data = {m:fechaI_mes, y:fechaI_anio};
			j = callAjax(data, url);
			
			if(fechaI_anio<fechaF_anio){
				fechaF_tempomes=fechaF_mes; fechaF = 12; 
				fechaF = parseInt(fechaF)+parseInt(fechaF_tempomes);
				fechamesDecremento = fechaF-j.nomes[0];
			}else{
				fechamesDecremento = fechaF_mes-j.nomes[0];
				fechaF=fechaF_mes;
			}
	
		for(pj=fechaF; pj>=fechaI_mes; pj--){
			$.log("fechaD:"+fechamesDecremento);$.log("mes:"+j.mes[fechamesDecremento]);$.log("pj:"+pj);$.log("dias:"+j.days[fechamesDecremento]);
			
			if(fechaI_mes==fechaF){
				diafin=fechaF_dia-fechaI_dia-1;
				fechaid_dia = fechaI_dia;
				fechaid_mes = fechaI_mes;
				fechaid_anio = fechaI_anio;
				td="#"+fechaid_dia+fechaid_mes+fechaid_anio;
				$(td).removeClass("habilitado").addClass('nohabilitado');

				if(fechainicioampm==0){
					ida="#c"+fechaid_dia+fechaid_mes+fechaid_anio+"a";
					idb="#c"+fechaid_dia+fechaid_mes+fechaid_anio+"b";
					td="#"+fechaid_dia+fechaid_mes+fechaid_anio;

					$(td).removeClass("habilitado").addClass('nohabilitado');
					$(ida).removeClass('test').addClass('nodisponible');
					$(idb).removeClass('test').addClass('nodisponible');
				}else{
					idb="#c"+fechaid_dia+fechaid_mes+fechaid_anio+"b";
					$(idb).removeClass('test').addClass('nodisponible');
				}
				fechaid_dia++;
				fechaid_dia = fechaid_dia<10?"0"+fechaid_dia:""+fechaid_dia;

				$.log("fechaI==fechaF");
			}else if(pj==fechaI_mes){
				diafin=j.days[fechamesDecremento]-fechaI_dia+1;
				fechaid_dia = fechaI_dia;
				fechaid_mes = fechaI_mes;
				fechaid_anio = fechaI_anio;
				if(fechainicioampm==0){
					ida="#c"+fechaid_dia+fechaid_mes+fechaid_anio+"a";
					idb="#c"+fechaid_dia+fechaid_mes+fechaid_anio+"b";
					td="#"+fechaid_dia+fechaid_mes+fechaid_anio;

					$(td).removeClass("habilitado").addClass('nohabilitado');
					$(ida).removeClass('test').addClass('nodisponible');
					$(idb).removeClass('test').addClass('nodisponible');
				}else{
					idb="#c"+fechaid_dia+fechaid_mes+fechaid_anio+"b";
					$(idb).removeClass('test').addClass('nodisponible');
				}
				fechaid_dia++;
				fechaid_dia = fechaid_dia<10?"0"+fechaid_dia:""+fechaid_dia;
				$.log("pj==fechaI_mes");
			}
			else if(pj==fechaF){
				diafin=fechaF_dia-1;
				fechaid_dia = "01";
				fechaid_mes = fechaF_mes;
				fechaid_anio = fechaF_anio;
				fechamesDecremento--;
				$.log("pj==fechaF");
			}else{
				diafin = j.days[fechamesDecremento]; 
				fechaF=fechaF-1;
				fechaid_mes = fechaF<10?"0"+fechaF:""+fechaF;
				fechaid_mes = fechaid_mes<10?"0"+fechaid_mes:""+fechaid_mes;
				fechaid_anio = fechaI_mes<fechaF ? fechaI_anio: fechaF_anio;
				fechaid_dia = "01";
				fechamesDecremento--;
			}

			for(pi=diainicio; pi<diafin; pi++){	
					ida="#c"+fechaid_dia+fechaid_mes+fechaid_anio+"a";
					idb="#c"+fechaid_dia+fechaid_mes+fechaid_anio+"b";
					td="#"+fechaid_dia+fechaid_mes+fechaid_anio;
					$.log("ida:"+ida);
					$.log("idb:"+idb);
					$(ida).removeClass('test').addClass('nodisponible');
					$(idb).removeClass('test').addClass('nodisponible');
					$(td).removeClass("habilitado").addClass('nohabilitado');
					$.log("idtd:"+td);
					fechaid_dia++;
					fechaid_dia = fechaid_dia<10?"0"+fechaid_dia:""+fechaid_dia;
				}

				
				if(fechafinampm==0){
					ida="#c"+fechaid_dia+fechaid_mes+fechaid_anio+"a";
					$(ida).removeClass('test').addClass('nodisponible');
					
				}else{
					td="#"+fechaid_dia+fechaid_mes+fechaid_anio;
					ida="#c"+fechaid_dia+fechaid_mes+fechaid_anio+"a";
					idb="#c"+fechaid_dia+fechaid_mes+fechaid_anio+"b";
					
					$(td).removeClass("habilitado").addClass('nohabilitado');
					$(ida).removeClass('test').addClass('nodisponible');
					$(idb).removeClass('test').addClass('nodisponible');
				}	
			}

			<?php } 
			}?>
		}

		function actualizacal(j)
		{
			//actualiza calendario 
			c=0;
			firstday=parseInt(j.firstday);
			FechaActual = new Date();
			
			for (x=0;x<6;x++){
				$("#mes"+x+ " tbody td").removeClass("habilitado").addClass("deshabilitado");
				$("#mes"+x+" .mes").html(j.mes[x]+" "+j.anio[x]);
				k=firstday+1;
				l=1;
				$("#mes"+x+" tbody td").html('');

				for (i=1; i<=j.days[x]; i++) 
				{
					mesf = j.nomes[x] <10 ? "0"+j.nomes[x]:""+j.nomes[x];
					diaf = i <10 ? "0"+i:""+i;

					Fecha = diaf+"/"+mesf+"/"+j.anio[x];  
					FechaM = new Date(Fecha.fechaDDMMAAAA());
					
					if(k>7)
					{
						l++;
						k=1;
					}
					 if(FechaM<FechaActual)
					{
						$("#mes"+x+" tbody tr:nth-child("+l+") td:nth-child("+k+")").removeClass("habilitado").addClass("deshabilitado");
						$("#mes"+x+" tbody tr:nth-child("+l+") td:nth-child("+k+")").append("<p class='day-number'>"+i+"</p>");
						$("#mes"+x+" tbody tr:nth-child("+l+") td:nth-child("+k+")").append("<div class='disponible'></div>");
						$("#mes"+x+" tbody tr:nth-child("+l+") td:nth-child("+k+")").append("<div class='disponible'></div>");
						$("#mes"+x+" tbody tr:nth-child("+l+") td:nth-child("+k+") div").removeClass("disponible").addClass("mesnodisponible");
					}
					else
					{		
						idaux = (i<10 ? "0":"")+i+(j.nomes[x]<10 ? "0":"")+j.nomes[x]+j.anio[x];
			
						$("#mes"+x+" tbody tr:nth-child("+l+") td:nth-child("+k+")").removeClass("deshabilitado").addClass("habilitado").attr("id",idaux);

						$("#mes"+x+" tbody tr:nth-child("+l+") td:nth-child("+k+")").append("<p class='day-number'>"+i+"</p>");
						$("#mes"+x+" tbody tr:nth-child("+l+") td:nth-child("+k+")").append("<div class='disponible' id="+'"c'+idaux+'a"'+"</div>");
						$("#mes"+x+" tbody tr:nth-child("+l+") td:nth-child("+k+")").append("<div class='disponible' id="+'"c'+idaux+'b"'+"</div>");
					}
					k++;
				}
				firstday=k-1;												
			}
			
		}
		
		function Concurencia(idSquare)
		{
			mes=parseInt(idSquare.charAt(3)+idSquare.charAt(4));
			mesid=idSquare.charAt(3)+idSquare.charAt(4);
			anio=parseInt(idSquare.charAt(5)+idSquare.charAt(6)+idSquare.charAt(7)+idSquare.charAt(8));
			data={m:mes,y:anio};
			j=callAjax(data,url);
 			dia=parseInt(idSquare.charAt(1)+idSquare.charAt(2));//works you get day
 			diaid=idSquare.charAt(1)+idSquare.charAt(2);
 			tipo=idSquare.charAt(9);
 			diaf = dia<10?"0"+dia:""+dia;
 			tempid = 0;
            //j can get any info from getmes.php just provide it with the corresponding month j.firstday
            //days[0] starts the count of days from the month you click thats why we are going to leave it as 0 always for calculas.
			$form = $("#dialog_f").append("<label style='color:#999' id='fec'>Fecha:"+diaf+"/"+mes+"/"+anio+"</label>");
			$form = $("#dialog_f").append("<label style='color:#999' id='name'>Concurrencia</label>");
			$form.append("<select id='nummeses'>"+
					       "<option value='0'>Solo hoy</option>"+
					       "<option value='1'>un mes</option>"+
					       "<option value='2'>dos meses</option>"+
					       "<option value='3'>tres meses</option>"+
					       "<option value='4'>cuatro meses</option>"+
					      "</select>");

			$(function() 
			{
			  $( "#dialog_f" ).dialog({
			   		autoOpen: true,
			   		resizable: false,
      				width: 300,
				    modal: true,
				    buttons: [
						        {
						            text: 'Disponible',
						            class: 'buttonDisponible',
						            click: function () 
						            {
						            		nummeses=document.getElementById("nummeses").value*4;//numero de meses seleccionados
						            		if(nummeses==0)
						            		{nummeses=1;}
						            		for(count=1;count<=nummeses;)
						            		{
						            			tempid="#"+"c"+diaid+mesid+anio+tipo;
						            			classSquareDate = $(tempid).attr('class');
												$(tempid).removeClass(classSquareDate).addClass('disponible');
												dia+=7;
												count++
												if(document.getElementById("nummeses").value==0)
												{count++;}
												if(dia>j.days[0])
												{
													dia-=j.days[0];
													mes++;
													if(mes>12)
													{anio++; mes=1;}
													data={m:mes,y:anio};
													j=callAjax(data,url);
												}	
												if(dia<10)
												{diaid="0"+dia;}
												else{diaid=dia;}
												if(mes<10)
												{mesid="0"+mes;}
												else{mesid=mes;}
											}	
											$("#fec").remove();$("#name").remove();$("#nummeses").remove();				
											$( this ).dialog( "close" );  
						            }
						        },
						        {
						            text: 'No Disponible',
						            class: 'buttonNoDisponible',
						            click: function () 
						            {
						            	nummeses=document.getElementById("nummeses").value*4;
						            	if(nummeses==0)
						            		{nummeses=1;}
						            		for(count=1;count<=nummeses;)
						            		{
							            		tempid="#"+"c"+diaid+mesid+anio+tipo;
							            		classSquareDate = $(tempid).attr('class');
												$(tempid).removeClass("inicio").addClass('nodisponible');
												dia+=7;
												count++
												if(document.getElementById("nummeses").value==0)
												{count++;}
												if(dia>j.days[0])
												{
													dia-=j.days[0];
													mes++;
													if(mes>12)
													{anio++; mes=1;}
													data={m:mes,y:anio};
													j=callAjax(data,url);
												}	
												if(dia<10)
												{diaid="0"+dia;}
												else{diaid=dia;}
												if(mes<10)
												{mesid="0"+mes;}
												else{mesid=mes;}
														
											}
												$("#fec").remove();$("#name").remove();$("#nummeses").remove();
												$( this ).dialog( "close" );  
						            }
						        }
    						],
		      				close: function() {$("#fec").remove();$("#name").remove();$("#nummeses").remove(); $("#c"+diaid+mesid+anio+tipo).removeClass("inicio");}
			   	});
			});
			idP=0;
		}
		
		function paintDate()
		{	check=true;
			$(function() 
			{
				$("#dialog").append("<label style='color:#999' id='fecI'>Rango inicial: " +idP.charAt(1)+idP.charAt(2)+"/"+inicio_mes+"/"+inicio_anio+"</label>");
				$("#dialog").append("<label style='color:#999' id='fecF'>Rango final: " +fin_dia+"/"+fin_mes+"/"+fin_anio+"</label>");

			  $( "#dialog" ).dialog({
			   		autoOpen: true,
			   		resizable: false,
      				width: 300,
				    modal: true,
				    buttons: [
						        {
						            text: 'Disponible',
						            class: 'buttonDisponible',
						            click: function () 
						            {	
						            	for(f=0; f<arrayDate.length; f++)
										{	
											$(arrayDate[f]).removeClass('test').addClass('disponible');	
											$(arrayDate[f]).removeClass('nodisponible').addClass('disponible');			
										}
										diaTI = arrayDate[0].charAt(2)+arrayDate[0].charAt(3);
										mesTI = arrayDate[0].charAt(4)+arrayDate[0].charAt(5);
										anioTI = arrayDate[0].charAt(6)+arrayDate[0].charAt(7)+arrayDate[0].charAt(8)+arrayDate[0].charAt(9);
										diaTF = arrayDate[arrayDate.length-1].charAt(2)+arrayDate[arrayDate.length-1].charAt(3);
										mesTF = arrayDate[arrayDate.length-1].charAt(4)+arrayDate[arrayDate.length-1].charAt(5);
										anioTF = arrayDate[arrayDate.length-1].charAt(6)+arrayDate[arrayDate.length-1].charAt(7)+arrayDate[arrayDate.length-1].charAt(8)+arrayDate[arrayDate.length-1].charAt(9);

										fil= arrayDate[0].charAt(10) =='a'?1:0;
										ffl= arrayDate[arrayDate.length-1].charAt(10) =='a'?1:0;
										fi=anioTI+"-"+mesTI+"-"+diaTI;
										ff=anioTF+"-"+mesTF+"-"+diaTF;
										id_coche=<?php echo $id_coche;?>

											dataf={};
											jf=callAjax(dataf, base_url+'autocalendario/getAllDates');

											for(fe=0; fe<jf.fecha.length; fe++){

											if(fi<jf.fecha[fe][0] && jf.fecha[fe][0]<=ff && ff<jf.fecha[fe][2]){
												$.log("1");
												if(fil == 1){
														firesta = fi.charAt(8)+fi.charAt(9);
														firesta = parseInt(firesta)-1;
														firesta = firesta<10?"0"+firesta:firesta;
														fi=anioTI+"-"+mesTI+"-"+firesta;
														$.log("restafi:"+fi);
														
													}
													if(ffl == 0){
														ffresta = ff.charAt(8)+ff.charAt(9);
														ffresta = parseInt(ffresta)+1;
														ffresta = ffresta<10?"0"+ffresta:ffresta;
														ff=anioTF+"-"+mesTF+"-"+ffresta;
														$.log("restaff:"+ff);
													}

												dataC={fechaini:jf.fecha[fe][0], fechafinal:jf.fecha[fe][2]};
												jfc=callAjax(dataC, base_url+'autocalendario/compareDate');

												datad={idcalendar:jfc.id_calendario, fini:ff, finil:ffl, ffin:jf.fecha[fe][2], ffinl:jf.fecha[fe][3], estado:1}; 
												jd=callAjax(datad, base_url+'autocalendario/update_DatesCalendario');
											
												if(jd.ok)
												{
													$(arrayDate[0]).removeClass("inicio");
													$(arrayDate[f-1]).removeClass("fin");
													arrayDate=[];
													arrayID=[];
													$("#fecI").remove();
													$("#fecF").remove();
													$( this ).dialog( "close" ); 
												}

											}else if(jf.fecha[fe][0]<fi && fi<jf.fecha[fe][2] && jf.fecha[fe][2]<ff){
												$.log("2");
												if(fil == 1){
														firesta = fi.charAt(8)+fi.charAt(9);
														firesta = parseInt(firesta)-1;
														firesta = firesta<10?"0"+firesta:firesta;
														fi=anioTI+"-"+mesTI+"-"+firesta;
														$.log("restafi:"+fi);
														
													}
													if(ffl == 0){
														ffresta = ff.charAt(8)+ff.charAt(9);
														ffresta = parseInt(ffresta)+1;
														ffresta = ffresta<10?"0"+ffresta:ffresta;
														ff=anioTF+"-"+mesTF+"-"+ffresta;
														$.log("restaff:"+ff);
													}

												dataC={fechaini:jf.fecha[fe][0], fechafinal:jf.fecha[fe][2]};
												jfc=callAjax(dataC, base_url+'autocalendario/compareDate');

												datad={idcalendar:jfc.id_calendario, fini:jf.fecha[fe][0], finil:jf.fecha[fe][1], ffin:fi, ffinl:fil, estado:1}; 
												jd=callAjax(datad, base_url+'autocalendario/update_DatesCalendario');
											
												if(jd.ok)
												{
													$(arrayDate[0]).removeClass("inicio");
													$(arrayDate[f-1]).removeClass("fin");
													arrayDate=[];
													arrayID=[];
													$("#fecI").remove();
													$("#fecF").remove();
													$( this ).dialog( "close" ); 
												}

											}else if(jf.fecha[fe][0]<=fi && ff<=jf.fecha[fe][2]){
												$.log("3");

												if(jf.fecha[fe][0]==fi && ff==jf.fecha[fe][2]){
													$.log("igual03");
													dataC={fechaini:jf.fecha[fe][0], fechafinal:jf.fecha[fe][2]};
													jfc=callAjax(dataC, base_url+'autocalendario/compareDate');

													datad={idcalendar:jfc.id_calendario}; 
													jd=callAjax(datad, base_url+'autocalendario/delete_idcalendar');

													if(jd.ok)
													{
														$(arrayDate[0]).removeClass("inicio");
														$(arrayDate[f-1]).removeClass("fin");
														arrayDate=[];
														arrayID=[];
														$("#fecI").remove();
														$("#fecF").remove();
														$( this ).dialog( "close" ); 
													}

												}else if(jf.fecha[fe][0]<=fi && ff<=jf.fecha[fe][2]){

													if(ffl == 0){
														ffresta = ff.charAt(8)+ff.charAt(9);
														ffresta = parseInt(ffresta)+1;
														ffresta = ffresta<10?"0"+ffresta:ffresta;
														ff=anioTF+"-"+mesTF+"-"+ffresta;
														$.log("restaff:"+ff);
													}
													
													dataC={fechaini:jf.fecha[fe][0], fechafinal:jf.fecha[fe][2]};
													jfc=callAjax(dataC, base_url+'autocalendario/compareDate');

													datad={idcalendar:jfc.id_calendario}; 
													jd=callAjax(datad, base_url+'autocalendario/delete_idcalendar');

													
													data={idC:id_coche,fini:ff, finil:ffl, ffin:jf.fecha[fe][2], ffinl:jf.fecha[fe][3], estado:1};
													j=callAjax(data, base_url+'autocalendario/insert_disponibilidad');

													if(j.ok)
													{
														$(arrayDate[0]).removeClass("inicio");
														$(arrayDate[f-1]).removeClass("fin");
														arrayDate=[];
														arrayID=[];
														$("#fecI").remove();
														$("#fecF").remove();
														$( this ).dialog( "close" ); 
													}

												}else{
													
													if(fil == 1){
														firesta = fi.charAt(8)+fi.charAt(9);
														firesta = parseInt(firesta)-1;
														firesta = firesta<10?"0"+firesta:firesta;
														fi=anioTI+"-"+mesTI+"-"+firesta;
														$.log("restafi:"+fi);
														
													}
													if(ffl == 0){
														ffresta = ff.charAt(8)+ff.charAt(9);
														ffresta = parseInt(ffresta)+1;
														ffresta = ffresta<10?"0"+ffresta:ffresta;
														ff=anioTF+"-"+mesTF+"-"+ffresta;
														$.log("restaff:"+ff);
													}
													dataC={fechaini:jf.fecha[fe][0], fechafinal:jf.fecha[fe][2]};
													jfc=callAjax(dataC, base_url+'autocalendario/compareDate');

													datad={idcalendar:jfc.id_calendario}; 
													jd=callAjax(datad, base_url+'autocalendario/delete_idcalendar');

													
													data={idC:id_coche,fini:jf.fecha[fe][0], finil:jf.fecha[fe][1], ffin:fi, ffinl:fil, estado:1};
													j=callAjax(data, base_url+'autocalendario/insert_disponibilidad');

													data={idC:id_coche,fini:ff, finil:ffl, ffin:jf.fecha[fe][2], ffinl:jf.fecha[fe][3], estado:1};
													j=callAjax(data, base_url+'autocalendario/insert_disponibilidad');
													

													if(j.ok)
													{
														$(arrayDate[0]).removeClass("inicio");
														$(arrayDate[f-1]).removeClass("fin");
														arrayDate=[];
														arrayID=[];
														$("#fecI").remove();
														$("#fecF").remove();
														$( this ).dialog( "close" ); 
													}
												}

											}else if(fi<jf.fecha[fe][0] && jf.fecha[fe][2]<ff){

												dataC={fechaini:jf.fecha[fe][0], fechafinal:jf.fecha[fe][2]};
													jfc=callAjax(dataC, base_url+'autocalendario/compareDate');

													datad={idcalendar:jfc.id_calendario}; 
													jd=callAjax(datad, base_url+'autocalendario/delete_idcalendar');

													if(jd.ok)
													{
														$(arrayDate[0]).removeClass("inicio");
														$(arrayDate[f-1]).removeClass("fin");
														arrayDate=[];
														arrayID=[];
														$("#fecI").remove();
														$("#fecF").remove();
														$( this ).dialog( "close" ); 
													}
											}

											else{
														$(arrayDate[0]).removeClass("inicio");
														$(arrayDate[f-1]).removeClass("fin");
														arrayDate=[];
														arrayID=[];
														$("#fecI").remove();
														$("#fecF").remove();
														$( this ).dialog( "close" ); 
											}

										}//fin for										
						            }
						        },
						        {
						            text: 'No Disponible',
						            class: 'buttonNoDisponible',
						            click: function () 
						            {	
						            	for(f=0; f<arrayDate.length; f++)
										{
											$(arrayDate[f]).removeClass('test').addClass('nodisponible');			
										}

										var inif=0, finf=0;
										diaTI = arrayDate[0].charAt(2)+arrayDate[0].charAt(3);
										mesTI = arrayDate[0].charAt(4)+arrayDate[0].charAt(5);
										anioTI = arrayDate[0].charAt(6)+arrayDate[0].charAt(7)+arrayDate[0].charAt(8)+arrayDate[0].charAt(9);
										diaTF = arrayDate[arrayDate.length-1].charAt(2)+arrayDate[arrayDate.length-1].charAt(3);
										mesTF = arrayDate[arrayDate.length-1].charAt(4)+arrayDate[arrayDate.length-1].charAt(5);
										anioTF = arrayDate[arrayDate.length-1].charAt(6)+arrayDate[arrayDate.length-1].charAt(7)+arrayDate[arrayDate.length-1].charAt(8)+arrayDate[arrayDate.length-1].charAt(9);

										fil= arrayDate[0].charAt(10) =='a'?0:1;
										ffl= arrayDate[arrayDate.length-1].charAt(10) =='a'?0:1;
										fi=anioTI+"-"+mesTI+"-"+diaTI;
										ff=anioTF+"-"+mesTF+"-"+diaTF;
										id_coche=<?php echo $id_coche;?>										
										
										dataf={};
										jf=callAjax(dataf, base_url+'autocalendario/getAllDates');

										if(jf.count){
										datai={idC:id_coche,fini:fi, finil:fil, ffin:ff, ffinl:ffl, estado:1};
										ji=callAjax(datai, base_url+'autocalendario/insert_disponibilidad');
									
											if(ji.ok){
												$(arrayDate[0]).removeClass("inicio");
												$(arrayDate[f-1]).removeClass("fin");
												arrayDate=[];
												arrayID=[];
												$("#fecI").remove();
												$("#fecF").remove();
												$( this ).dialog( "close" );  
												$.log("entro01");

												}
										}
										
										for(fe=0; fe<jf.fecha.length; fe++){
											if(fi<jf.fecha[fe][0] && jf.fecha[fe][0]<ff && ff<jf.fecha[fe][2]){
												check=false;
												dataC={fechaini:jf.fecha[fe][0], fechafinal:jf.fecha[fe][2]};
												jfc=callAjax(dataC, base_url+'autocalendario/compareDate');

												datad={idcalendar:jfc.id_calendario, fini:fi, finil:fil, ffin:jf.fecha[fe][2], ffinl:jf.fecha[fe][3], estado:1}; 
												jd=callAjax(datad, base_url+'autocalendario/update_DatesCalendario');
												
												if(jd.ok)
												{
													$(arrayDate[0]).removeClass("inicio");
													$(arrayDate[f-1]).removeClass("fin");
													arrayDate=[];
													arrayID=[];
													$("#fecI").remove();
													$("#fecF").remove();
													$( this ).dialog( "close" ); 
												}
												
												$.log("1");

											}else if(jf.fecha[fe][0]<fi && fi<jf.fecha[fe][2] && jf.fecha[fe][2]<ff){
												check=false;
												dataC={fechaini:jf.fecha[fe][0], fechafinal:jf.fecha[fe][2]};
												jfc=callAjax(dataC, base_url+'autocalendario/compareDate');

												datad={idcalendar:jfc.id_calendario, fini:jf.fecha[fe][0], finil:jf.fecha[fe][1], ffin:ff, ffinl:ffl, estado:1}; 
												jd=callAjax(datad, base_url+'autocalendario/update_DatesCalendario');
											
												if(jd.ok)
												{
													$(arrayDate[0]).removeClass("inicio");
													$(arrayDate[f-1]).removeClass("fin");
													arrayDate=[];
													arrayID=[];
													$("#fecI").remove();
													$("#fecF").remove();
													$( this ).dialog( "close" ); 
												}

												
												$.log("2");

											}else if(jf.fecha[fe][0]<=fi && ff<=jf.fecha[fe][2]){
												check=false;
												$.log("3");
												$(arrayDate[0]).removeClass("inicio");
												$(arrayDate[f-1]).removeClass("fin");
												arrayDate=[];
												arrayID=[];
												$("#fecI").remove();
												$("#fecF").remove();
												$( this ).dialog( "close" ); 
												
											}else if(fi<jf.fecha[fe][0] && jf.fecha[fe][2]<ff){
												check=false;
												dataC={fechaini:jf.fecha[fe][0], fechafinal:jf.fecha[fe][2]};
												jfc=callAjax(dataC, base_url+'autocalendario/compareDate');

												datad={idcalendar:jfc.id_calendario, fini:fi, finil:fil, ffin:ff, ffinl:ffl, estado:1}; 
												jd=callAjax(datad, base_url+'autocalendario/update_DatesCalendario');
											
												if(jd.ok)
												{
													$(arrayDate[0]).removeClass("inicio");
													$(arrayDate[f-1]).removeClass("fin");
													arrayDate=[];
													arrayID=[];
													$("#fecI").remove();
													$("#fecF").remove();
													$( this ).dialog( "close" ); 
												}
												
												
												$.log("4");
											}
										}//fin for	

										if(check){
										for(fe2=0; fe2<jf.fecha.length; fe2++)
										{		$.log("fi: "+fi); $.log("sfi: "+jf.fecha[fe2][2]);
												if(fi<=jf.fecha[fe2][0] && jf.fecha[fe2][0]>ff){
													check=true;
												
													if(fe2<1){
														
														data={idC:id_coche,fini:fi, finil:fil, ffin:ff, ffinl:ffl, estado:1};
														j=callAjax(data, base_url+'autocalendario/insert_disponibilidad');
													
														if(j.ok)
														{
															$(arrayDate[0]).removeClass("inicio");
															$(arrayDate[f-1]).removeClass("fin");
															arrayDate=[];
															arrayID=[];
															$("#fecI").remove();
															$("#fecF").remove();
															$( this ).dialog( "close" ); 
														}
														$.log("if01: "+fe2);
													}
													

												}else if(fi>jf.fecha[fe2][2] && jf.fecha[fe2][2]<ff){
													check=true;
												
													if(fe2<1){

													data={idC:id_coche,fini:fi, finil:fil, ffin:ff, ffinl:ffl, estado:1};
													j=callAjax(data, base_url+'autocalendario/insert_disponibilidad');
												
													if(j.ok){
														$(arrayDate[0]).removeClass("inicio");
														$(arrayDate[f-1]).removeClass("fin");
														arrayDate=[];
														arrayID=[];
														$("#fecI").remove();
														$("#fecF").remove();
														$( this ).dialog( "close" ); 
														}
														$.log("if02: "+fe2);
													}
													
											}
										}//fin for 2
									}//if check
			        		}
			        	}
    						],
		      				close: function() {
		      					for(f=0; f<arrayDate.length; f++)
								{
									$(arrayDate[f]).removeClass('test');				
								}
								$(arrayDate[0]).removeClass("inicio");
								$(arrayDate[f-1]).removeClass("fin");
								$("#fecI").remove();
								$("#fecF").remove();
								arrayDate=[];
								arrayID=[];
		      				}
			   	});
			});
			idP=0;		
			
		}

		function actualizarango(end){
			idH=end.attr('id');
			inicio=idP;
			fin=idH;
			
			inicio_dia=parseInt(inicio.charAt(1)+inicio.charAt(2));
			inicio_mes=parseInt(inicio.charAt(3)+inicio.charAt(4));
			inicio_anio=parseInt(inicio.charAt(5)+inicio.charAt(6)+inicio.charAt(7)+inicio.charAt(8));
			inicio_letra=inicio.charAt(9);

			fin_dia=parseInt(fin.charAt(1)+fin.charAt(2));
			fin_mes=parseInt(fin.charAt(3)+fin.charAt(4));
			fin_anio=parseInt(fin.charAt(5)+fin.charAt(6)+fin.charAt(7)+fin.charAt(8));
			fin_letra=fin.charAt(9); aniomes=0;
				
					if(inicio_mes == fin_mes){
						for(ih=inicio_dia; ih<=fin_dia; ih++){
						aux = ih < 10 ? "0"+ih : ih;
						auxmes=(fin_mes<10)?"0"+fin_mes:fin_mes;
						auxanio=fin_anio;
						agregar=1;

						if(inicio_letra=="b"&&aux==inicio_dia&&auxmes==inicio_mes&&auxanio==inicio_anio){
						agregar=0;
						$.log(inicio_letra+" | "+aux+"=="+inicio_dia+" | "+auxmes+"=="+inicio_mes+" | "+auxanio+"=="+inicio_anio);
						}
						if(agregar) arrayID.push("#c"+aux+auxmes+fin_anio+"a");
						agregar=1;
						if(fin_letra=="a"&&aux==fin_dia&&auxmes==fin_mes&&auxanio==fin_anio)
							agregar=0;
						if(agregar) arrayID.push("#c"+aux+auxmes+fin_anio+"b");
						}
					}
					else
					{	
						if(inicio_anio<fin_anio){ aniomes++; fin_mes=12; fin_mes = parseInt(fin_mes+aniomes);}else if(inicio_anio==fin_anio){}else{inicio_mes=13;}
						for(jh=inicio_mes; jh<=parseInt(fin_mes); jh++){
							
							if(jh<parseInt(fin_mes)){
								fin_diaI = 31;
							
								for(ih=inicio_dia; ih<=fin_diaI; ih++){
								aux = ih < 10 ? "0"+ih : ih;
								auxmes= jh < 10 ? "0"+jh:jh;
								auxanio=inicio_anio;
								agregar=1;

								if(inicio_letra=="b"&&aux==inicio_dia&&auxmes==inicio_mes&&auxanio==inicio_anio){
								agregar=0;
								$.log(inicio_letra+" | "+aux+"=="+inicio_dia+" | "+auxmes+"=="+inicio_mes+" | "+auxanio+"=="+inicio_anio);
								}

								if(agregar) arrayID.push("#c"+aux+auxmes+inicio_anio+"a");
								agregar=1;
								if(fin_letra=="a"&&aux==fin_dia&&auxmes==fin_mes&&auxanio==inicio_anio)
									agregar=0;
								if(agregar) arrayID.push("#c"+aux+auxmes+inicio_anio+"b");
								}

							} 

							else{ 
								for(ihf=inicio_dia; ihf<=fin_dia; ihf++){
									aux = ihf < 10 ? "0"+ihf : ihf;
									if(jh>12){auxmes = (aniomes<10)?"0"+aniomes:aniomes;}else{auxmes=(fin_mes<10)?"0"+fin_mes:fin_mes;}
									auxanio=fin_anio;
									agregar=1;

									if(inicio_letra=="b"&&aux==inicio_dia&&auxmes==inicio_mes&&auxanio==inicio_anio){
									agregar=0;
									$.log(inicio_letra+" | "+aux+"=="+inicio_dia+" | "+auxmes+"=="+inicio_mes+" | "+auxanio+"=="+inicio_anio);
									}
									if(agregar) arrayID.push("#c"+aux+auxmes+fin_anio+"a");
									agregar=1;
									if(fin_letra=="a"&&aux==fin_dia&&auxmes==fin_mes&&auxanio==fin_anio || fin_letra=="a"&&aux==fin_dia&&auxmes==aniomes&&auxanio==fin_anio) 
										agregar=0;
									if(agregar) arrayID.push("#c"+aux+auxmes+fin_anio+"b");
									}
							}
							inicio_dia=1;
						}
					}
					//inicio_dia=1;

				$.log(arrayID);
				total=arrayID.length;
				for(jh=0; jh<total; jh++)
				{
					if(arrayID[jh]!=inicio){
						if(!$(arrayID[jh]).hasClass("inicio"))
							$(arrayID[jh]).addClass("test");
							$(arrayID[jh]).addClass("actual");
							arrayDate[jh] = arrayID[jh];
					}
				}
				arrayID = [];
				
		}

	</script>		

<div class="container">
	<div id="linknuevo"><a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>auto"><strong>+ </strong>Agregar un nuevo vehiculo</a></div>
<div id="contenidocuenta" class="panel panel-default">
<nav id="menu" class="navsecundario">					
					<ul>
						<li class="subActivo">
							<a href="<?php echo base_url(); ?>filtroauto">
								<span class="icon">
									<i aria-hidden="true" class="glyphicon glyphicon-road"></i>
								</span>
								<span>Mis coches</span>
							</a>
						</li>
						<li >
							<a href="<?php echo base_url(); ?>perfil">
								<span class="icon"> 
									<i aria-hidden="true" class="glyphicon glyphicon-user"></i>
								</span>
								<span>Mi perfil</span>
							</a>
						</li>
						<li>
							<a href="cuenta_misrentas.html">
								<span class="icon">
									<i aria-hidden="true" class="glyphicon glyphicon-pencil"></i>
								</span>
								<span>Mis Rentas</span>
							</a>
						</li>   
						<li>
							<a href="cuenta_mispagos.html">
								<span class="icon">
									<i aria-hidden="true" class="glyphicon glyphicon-credit-card"></i>
								</span>
								<span>Pagos e ingresos</span>
							</a>
						</li>
					</ul>
				</nav>
<?php foreach ($detallecoche as $item): ?>
			<div class="menu_vertical">
				<ul class="nav_list">
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autoinfogeneral/<?php echo $item['IdCoche'];?>">Info general</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificarfoto/<?php echo $item['IdCoche'];?>">Modificar foto</a></li>
				    <li class="active nav_item"><a class="nav_item_link" href="<?php echo current_url(); ?>">Calendario</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificaropciones/<?php echo $item['IdCoche'];?>">Opciones</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificarprecio/<?php echo $item['IdCoche'];?>">Precio</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autopromocionar/<?php echo $item['IdCoche'];?>">Promocionar</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autoborrar/<?php echo $item['IdCoche'];?>">Borrar / desactivar</a></li>
				</ul>
<?php endforeach; ?>	

<div class="full-row">
		<?php for($i=0; $i<6; $i++){
			if(in_array($i,array(0,3))){
				?><div class="row"><?php
			}
			?>
				<div class="col-sm-4">
					<table class="table stripped" id="mes<?php echo $i;?>">
						<thead>
							<tr>
								<th class="prev"><?php if($i==0){?><a href="">&lt;</a><?php }?></th>
								<th colspan="5" class="mes">MES</th>
								<th class="next"><?php if($i==5){?><a href="">&gt;</a><?php }?></th>
							</tr>
							<tr>
								<th>D</th>
								<th>L</th>
								<th>M</th>
								<th>M</th>
								<th>J</th>
								<th>V</th>
								<th>S</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			<?php if(in_array($i,array(2,5))){
				?></div><?php
			}
		}?>

			<script type="text/javascript">
			url=<?php echo '"'.base_url()."library/getmes.php".'"'?>;
			mesactual=<?php echo date('m')?>;
			anioactual=<?php echo date('Y')?>;
			diactual=<?php echo date('d')?>;
			bandrag=0;
			click = 0; 
			fechaI = 0;
			data={m:mesactual,y:anioactual};
			j=callAjax(data,url);
			if(parseInt(j.ok)==1)
			{
				actualizacal(j);
				loadCalendar();
			}

			

			$("body").on("click",".disponible",function(){
				
				ini = $(this).attr('id');
				letra = ini.charAt(9);
				fFTempo = ini.charAt(1)+ini.charAt(2)+"/"+ini.charAt(3)+ini.charAt(4)+"/"+parseInt(ini.charAt(5)+ini.charAt(6)+ini.charAt(7)+ini.charAt(8));
				fechaF = new Date(fFTempo.fechaDDMMAAAA());

				if(click == 0)
				{
					if(ini!=idP)
					{
						if(letra == "a" && fechaF <= fechaI)
						{	
							$.log("entro b: ");
							bandrag = 0;
						}
					if(bandrag){
							bandrag=0;
							$(this).removeClass("test").addClass("fin");
							paintDate();
						}else{
							bandrag=1;
							$("#"+idP).removeClass("inicio");
							$(this).addClass("inicio");
							idP=$(this).attr('id');
							fITempo = idP.charAt(1)+idP.charAt(2)+"/"+idP.charAt(3)+idP.charAt(4)+"/"+parseInt(idP.charAt(5)+idP.charAt(6)+idP.charAt(7)+idP.charAt(8));
							fechaI = new Date(fITempo.fechaDDMMAAAA());
						}
					}	
					if(ini==idP)
					{
						cont++;
						$.log("mismoID: "+ cont);
						click=cont==2?click=1:click=0;
					}
				}
				if(click == 1)
				{ 
					Concurencia($(this).attr('id'));
					click=0;
					bandrag = 0;
					idP=0;
					cont=0;
				}
	
						$.log("fI: "+fechaI);
						$.log("ff: "+fechaF);
			});
				
				$("body").on("mouseenter",".disponible",function(){
					if(bandrag){ 
						actualizarango($(this));
					}
				});
			
				$("body").on("mouseleave",".disponible",function()
				{
						if(bandrag){cont=0;
							$(".actual").removeClass("test");
							arrayDate=[];				
					}
				});
			

			$("#mes5 .next a").on("click",function(e){
				e.preventDefault();
				if(mesactual>6){
					mes=mesactual-6;
					anio=anioactual+1;
				}else{
					mes=mesactual+6;
					anio=anioactual;
				}
				data={m:mes,y:anio};
				j=callAjax(data,url);
				if(parseInt(j.ok)==1){
					actualizacal(j);
				}
				mesactual = mes;
				anioactual = anio;
				loadCalendar();
			});
			$("#mes0 .prev a").on("click",function(e){
				e.preventDefault();
				if(mesactual>6){
					mes=mesactual-6;
					anio=anioactual;
				}else{
					mes=mesactual+6;
					anio=anioactual-1;
				}
				data={m:mes,y:anio};
				j=callAjax(data,url);
				if(parseInt(j.ok)==1){
					actualizacal(j);
				}
				mesactual = mes;
				anioactual = anio;
				loadCalendar();
			});

		</script>	

	</div>

<div id="dialog" title="Seleccion de rango">
</div>

<div id="dialog_f" title="Seleccion de concurencia">
</div>

</div><!--termina menu vertical-->

<div id="contenido_tus_autos">

</div><!--termina contenido cuenta-->
</div><!--termina container-->


<div class="bandaAzul">
  <div class="container">
      <ul class="listaV">
        <li id="primero"><a href="porqueTomatucar.html">¿Por qué TomatuCAR?</a></li>
        <li><a href="contratoR.html">Contrato de renta</a></li>
        <li><a href="tcondiciones.html">Términos y condiciones</a></li>
        <li><a href="preguntasf.html">F.A.Q.</a></li>
        <li><a href="contacto.html">Contáctanos</a></li>
        </ul>
      <div id="redesS">
        <ul>
        <li><a href=""><img src="<?php echo base_url(); ?>img/facebook.png" height="20px" width="30px" alt=""></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>img/twiter.png" height="20px" width="30px" alt=""></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>img/google.png" height="20px" width="30px" alt=""></a></li>
        </ul>
      </div>  
  </div>  
</div>