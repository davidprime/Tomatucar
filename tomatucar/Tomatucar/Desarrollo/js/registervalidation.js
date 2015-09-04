$(document).ready(function() {
     $('#agregarform')
    	.formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'El nombre del usuario es obligatorio'
                    }
                }
            },
            apellidos: {
                validators: {
                    notEmpty: {
                        message: 'El nombre del usuario es obligatorio'
                    }
                }
            },
            email:{
                validators: {
                    notEmpty: {
                        message: 'El email es obligatorio'
                    },
                    emailAddress: {
                        message: 'Esto no es una cuenta de correo valida'
                    },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'Esto no es una cuenta de correo valida'
                        }
                }
            },
            contrasena:{
                validators: {
                	
                    notEmpty: {
                        message: 'La contrase&ntilde;a es obligatoria'
                    },
                    
                    // David Vara 17/04/2015 inicio
                    // Validacion de tamaño y complejidad de contraseña
                    stringLength: {
                    	message: 'La contrase&ntilde;a debe tener de 6 a 10 caracteres',
                    	min: 6,
                    	max: 10
                    },
                    
                    regexp: {
                    	message: 'La contrase&ntilde;a debe tener al menos una mayúscula, minúscula y un número',
                    	regexp:  '^(?=.*\\d)(?![.\\n])(?=.*[A-Z])(?=.*[a-z]).*$'
                    } 
                    // David Vara 17/04/2015 fin
                }
            },
             contrasena2:{
                validators: {
                    identical: {
                    	field: 'contrasena',
                        message: 'La contrase&ntilde;a debe ser igual'
                    }
                }
            } ,
            'acepto[]':{
                validators: {
                    notEmpty: {
                        message: 'Debes aceptar los términos y condiciones'
                    }
                }
            }     
        }
    });
$('#iniciarform')
    	.formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            contrasena:{
                validators: {
                    notEmpty: {
                        message: 'La contrase&ntilde;a es obligatoria'
                    }
                }
            },        	
            email:{
                validators: {
                    notEmpty: {
                        message: 'El email es no puede estar vacio'
                    },
                    emailAddress: {
                        message: 'Esto no es una cuenta de correo valida'
                    },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'Esto no es una cuenta de correo valida'
                        }
                }
            }    
        }
    });
});