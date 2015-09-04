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
            startDate: '1900-01-01',
            endDate: today
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#perfilform').formValidation('revalidateField', 'nacimiento');
        }); 

	$('#fechaantiguedad')
        .datepicker({
        	format: 'yyyy-mm-dd',
        	startDate: '1950-01-01',
        	endDate: hoy
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#perfilform').formValidation('revalidateField', 'antiguedad');
        }); 
 
 	$('#fechaexpiracion')
        .datepicker({
            format: 'yyyy-mm-dd',
            startDate: today,
            endDate: '2050-01-01'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#perfilform').formValidation('revalidateField', 'expiracion');
        }); 
              
    $('#perfilform')  
    .formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nacimiento: {
                validators: {
                    notEmpty: {
                        message: 'La fecha de nacimiento es obligatoria'
                    },
                    date: {
                        format: 'YYYY-MM-DD',
                        min: '1900-01-01',
                        max: today,
                        message: 'La fecha de nacimiento no es válida'
                    }
                }
            },
            antiguedad: {
                validators: {
                    date: {
                        format: 'YYYY-MM-DD',
                        min: '1950-01-01',
                        max: hoy,
                        message: 'La fecha de antigüedad no es válida'
                    }
                }
            },
            expiracion: {
                validators: {
                    date: {
                        format: 'YYYY-MM-DD',
                        min: hoy,
                        max:'2050-01-01',
                        message: 'La fecha de expiración no es válida'
                    }
                }
            },
             nombre: {
                validators: {
                    notEmpty: {
                        message: 'El nombre es obligatorio'
                    }
                }
            }, 
             apellido: {
                validators: {
                    notEmpty: {
                        message: 'El apellido es obligatorio'
                    }
                }
            }, 
             paisnacimiento: {
                validators: {
                    notEmpty: {
                        message: 'El pais de nacimiento es obligatorio'
                    }
                }
            },  
            direccion:{
                validators: {
                    notEmpty: {
                        message: 'La dirección es obligatoria'
                    }
                }
            },  
            codigopostal:{
                validators: {
                    notEmpty: {
                        message: 'El código postal es obligatorio'
                    }
                }
            }, 
             idpaisdireccion: {
                validators: {
                    notEmpty: {
                        message: 'El pais de domicilio es obligatorio'
                    }
                }
            }, 
             idestadodireccion: {
                validators: {
                    notEmpty: {
                        message: 'El estado del domicilio  es obligatorio'
                    }
                }
            }, 
             idciudaddireccion: {
                validators: {
                    notEmpty: {
                        message: 'La ciudad de domicilio es obligatorio'
                    }
                }
            }, 
             fotoperfil: {
                validators: {
                    file: {
                        extension: 'jpeg,png,jpg,JPG,JPEG,PNG',
                        type: 'image/jpeg,image/png,image/jpg,image/JPG,image/JPEG,image/PNG',
                        maxSize: 2097152,   // 2048 * 1024                    	
                        message: 'el tamaño o formato del archivo no es correcto'
                    }
                }
            }, 
             telefono: {
                validators: {
                    notEmpty: {
                        message: 'El teléfono es obligatorio'
                    }
                }
            } 
                                  
        }
    });        
});