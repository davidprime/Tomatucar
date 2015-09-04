$(document).ready(function() {
    
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear()-18;
	var anio = today.getFullYear();
	today = yyyy+'-'+mm+'-'+dd;
	var hoy = new Date();
	hoy = anio+'-'+mm+'-'+dd; 
 
 	$('#datePicker')
        .datepicker({
            format: 'yyyy-mm-dd',
            startDate: hoy
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#busquedainicioform').formValidation('revalidateField', 'fechainicio');
        });
 
  	$('#datePicker2')
        .datepicker({
            format: 'yyyy-mm-dd',
            startDate: hoy
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#busquedainicioform').formValidation('revalidateField', 'fechafin');
        }); 
                   
    $('#busquedainicioform')  
    .formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            direccion: {
                validators: {
                    notEmpty: {
                        message: 'Favor de introducir un lugar'
                    }
                }
            }                                  
        }
    });        
});