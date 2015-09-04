 $(document).ready(function(){
 	 	var $jq = jQuery.noConflict();  
 	 				
		$jq("#mostrar").click(function(event) {
		event.preventDefault();
		$jq("#caja").slideToggle();
		});

		$jq("#caja a").click(function(event) {
		event.preventDefault();
		$jq("#caja").slideUp();
		});
		
		$jq("#mostrar2").click(function(event) {
		event.preventDefault();
		$jq("#caja2").slideToggle();
		});

		$jq("#caja2 a").click(function(event) {
		event.preventDefault();
		$jq("#caja2").slideUp();
		});
			
		$jq("#mostrar3").click(function(event) {
		event.preventDefault();
		$jq("#caja3").slideToggle();
		});

		$jq("#caja3 a").click(function(event) {
		event.preventDefault();
		$jq("#caja3").slideUp();
		});
			

$jq('#radios2 input:radio').addClass('input_hidden');
$jq('#radios2 label').click(function() {
    $jq(this).addClass('selected').siblings().removeClass('selected');
});

    $jq("input[name='renta1']").TouchSpin({
        min: 0,
        max: 5000,
        stepinterval: 1,
        maxboostedstep: 5000,
        prefix: '$'
    });

    $jq("input[name='renta2']").TouchSpin({
        min: 0,
        max: 5000,
        stepinterval: 1,
        maxboostedstep: 5000,
        prefix: '$'
    });
    $jq("input[name='rentakm']").TouchSpin({
        min: 0,
        max: 5000,
        stepinterval: 1,
        maxboostedstep: 5000,
        prefix: '$'
    });
    function actualiza_precio() {
		val1 =parseInt($jq('#renta1').val());
		val2 =parseInt($jq('#renta2').val());
		val3 =parseInt($jq('#rentakm').val());
		var valfinal = (val1+val2)/2+(val3*20);
		$jq('#resulTotal').text(valfinal);
		$jq('#totaldiaprom').val(valfinal);
	} 
	function valida_borrador(){
		if($jq('#marca').val() > 0 && $jq('#modelo').val() > 0 && $jq('#primerAnio').val() > 0)
		{
			$jq('#borrador').removeAttr('disabled');
		}
		else
		{
			$jq('#borrador').attr('disabled','disabled');
		}		
	}       
    $jq('#autoform')  
            .find('[name="renta1"]')
            // Revalidar etiquetas
            .change(function (e) {
                $jq('#autoform').formValidation('revalidateField', 'renta1');
				$jq('#valrenta1').text($jq('#renta1').val());
				actualiza_precio();
            })
            .end() 
            .find('[name="renta2"]')
            // Revalidar etiquetas
            .change(function (e) {
                $jq('#autoform').formValidation('revalidateField', 'renta2');
                $jq('#valrenta2').text($jq('#renta2').val());
				actualiza_precio();
            })
            .end() 
            .find('[name="rentakm"]')
            // Revalidar etiquetas
            .change(function (e) {
                $jq('#autoform').formValidation('revalidateField', 'rentakm');
                $jq('#valrentakm').text($jq('#rentakm').val());
				actualiza_precio();
            })
            .end() 
            .find('[name="marca"]')
            // Revalidar etiquetas
            .change(function (e) {
				valida_borrador();
            })
            .end() 
            .find('[name="modelo"]')
            // Revalidar etiquetas
            .change(function (e) {
				valida_borrador();
            })
            .end() 
            .find('[name="primerAnio"]')
            // Revalidar etiquetas
            .change(function (e) {
				valida_borrador();
            })
            .end() 
    .formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            marca:{
                validators: {
                    notEmpty: {
                        message: 'La marca es obligatoria'
                    }
                }
            },  
            modelo:{
                validators: {
                    notEmpty: {
                        message: 'El modelo es obligatoria'
                    }
                }
            },  
            cartype:{
                validators: {
                    notEmpty: {
                        message: 'El tipo de coche es obligatoria'
                    }
                }
            },  
            primerAnio:{
                validators: {
                    notEmpty: {
                        message: 'El año de coche es obligatoria'
                    }
                }
            },  
            direccion:{
                validators: {
                    notEmpty: {
                        message: 'La dirección de tu auto es obligatoria'
                    }
                }
            },  
            matricula:{
                validators: {
                    notEmpty: {
                        message: 'La matrícula es obligatoria'
                    }
                }
            },  
            renta1:{
                validators: {
                    notEmpty: {
                        message: 'El precio de del primer día renta es obligatorio'
                    },
                    between:{
                    	min: 1,
                    	max: 5000,
                    	message: 'El valor mínimo es 1 y máximo es 5000'
                    }
                }
            },  
            renta2:{
                validators: {
                    notEmpty: {
                        message: 'El precio del segundo día de renta es obligatorio'
                    },
                    between:{
                    	min: 1,
                    	max: 5000,
                    	message: 'El valor mínimo es 1 y máximo es 5000'
                    }
                }
            },  
            rentakm:{
                validators: {
                    notEmpty: {
                        message: 'El precio de renta por kilometro es obligatorio'
                    },
                    between:{
                    	min: 1,
                    	max: 5000,
                    	message: 'El valor mínimo es 1 y máximo es 5000'
                    }
                }
            }                           
        }
    });
});