 $(document).ready(function(){ 
 	 				
    $("input[name='renta1']").TouchSpin({
        min: 100,
        max: 2000,
        stepinterval: 1,
        maxboostedstep: 2000,
        prefix: '$'
    });

    $("input[name='renta2']").TouchSpin({
        min: 100,
        max: 2000,
        stepinterval: 1,
        maxboostedstep: 2000,
        prefix: '$'
    });
    $("input[name='rentakm']").TouchSpin({
        min: 0.1,
        max: 20,
        stepinterval: 0.1,
        decimals: 1,
        maxboostedstep: 20,
        prefix: '$'
    });
    function actualiza_precio() {
		val1 =parseInt($('#renta1').val());
		val2 =parseInt($('#renta2').val());
		val3 =parseInt($('#rentakm').val());
		var valfinal = (val1+val2)/2+(val3*20);
		$('#resulTotal').text(valfinal);
		$('#totaldiaprom').val(valfinal);
	}   
    $('#precioform')  
            .find('[name="renta1"]')
            // Revalidar etiquetas
            .change(function (e) {
                $('#precioform').formValidation('revalidateField', 'renta1');
				$('#valrenta1').text($('#renta1').val());
				actualiza_precio();
            })
            .end() 
            .find('[name="renta2"]')
            // Revalidar etiquetas
            .change(function (e) {
                $('#precioform').formValidation('revalidateField', 'renta2');
                $('#valrenta2').text($('#renta2').val());
				actualiza_precio();
            })
            .end() 
            .find('[name="rentakm"]')
            // Revalidar etiquetas
            .change(function (e) {
                $('#precioform').formValidation('revalidateField', 'rentakm');
                $('#valrentakm').text($('#rentakm').val());
				actualiza_precio();
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
            renta1:{
                validators: {
                    notEmpty: {
                        message: 'El precio de del primer día renta es obligatorio'
                    },
                    between:{
                    	min: 100,
                    	max: 2000,
                    	message: 'El valor mínimo es 100 y máximo es 2000'
                    }
                }
            },  
            renta2:{
                validators: {
                    notEmpty: {
                        message: 'El precio del segundo día de renta es obligatorio'
                    },
                    between:{
                    	min: 100,
                    	max: 2000,
                    	message: 'El valor mínimo es 100 y máximo es 2000'
                    }
                }
            },  
            rentakm:{
                validators: {
                    notEmpty: {
                        message: 'El precio de renta por kilometro es obligatorio'
                    },
                    between:{
                    	min: 0.1,
                    	max: 2000,
                    	message: 'El valor mínimo es 0.1 y máximo es 20'
                    }
                }
            }                           
        }
    });
});