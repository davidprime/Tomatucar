$(document).ready(function() {
    $('#cambiaremailform')  
    .formValidation({
        framework: 'bootstrap',
        icon: {
            valid: '',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cambiaremail:{
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
            } ,
            contrasenaemail:{
                validators: {
                    notEmpty: {
                        message: 'La contraseña es obligatoria'
                    }
                }
            }                          
        }
    });   
    $('#cambiarcontrasenaform')  
    .formValidation({
        framework: 'bootstrap',
        icon: {
            valid: '',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cambiarcontrasena:{
                validators: {
                    notEmpty: {
                        message: 'La contraseña es obligatoria'
                    }
                }
            },
            contrasenanueva:{
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
                        message: 'La contrase&ntilde;a debe tener letras y números.',
                        regexp:  '^((?:[a-zA-Z]+[0-9]|[0-9]+[a-zA-Z])[a-zA-Z0-9]*)$'
                    } 
                    // David Vara 17/04/2015 fin                   
                }
                
            },
             contrasenanueva2:{
                validators: {
                    identical: {
                    	field: 'contrasenanueva',
                        message: 'La contrase&ntilde;a debe ser igual'
                    }
                }
            }                          
        }
    });  
    $('#eliminarcuentaform')  
    .formValidation({
        framework: 'bootstrap',
        icon: {
            valid: '',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            eliminarcontrasena:{
                validators: {
                    notEmpty: {
                        message: 'La contraseña es obligatoria'
                    }
                }
            }                         
        }
    });
    /*Sergio 22-Abr-2015
     *Agregar validacion para agregar/cambiar la cuenta en la vista modificarcorreo.php
     */
    $('#cambiarcuentaform')  
    .formValidation({
        framework: 'bootstrap',
        icon: {
            valid: '',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cambiarcuenta:{
                validators: {
                    notEmpty: {
                        message: 'La cuenta es obligatoria'
                    },
                    stringLength: {
                    	message: 'La CLABE es de 18 dígitos',
                    	min: 18,
                    	max: 18
                    }, 
                    regexp: {
                    	message: 'La cuenta solo acepta 18 dígitos',
                    	regexp:  '^[0-9]{18}$'
                    } 
                }
            },  
            contrasenacuenta:{
                validators: {
                    notEmpty: {
                        message: 'La contraseña es obligatoria'
                    }
                }
            }                         
        }
    });   
    //Termina cambio  22-Abr-2015
});