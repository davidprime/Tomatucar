 

//Costos calculados
var costoPorDia=0.0;
var totalRenta=0.0;

//Intervalo de dias actuales
var dias =1;

var fechainicio,fechafin;

 $(document).ready(function(){
            
 	var hoy = new Date();
   var dd = hoy.getDate();
	var mm = hoy.getMonth()+1; //January is 0!
	var yyyy = hoy.getFullYear();
	
	hoy = yyyy+'/'+mm+'/'+dd;

  

  //Costos predefinidos
    var precioPromedio = parseFloat($('#Precio').val()),
    costoPrimerDiaRenta= parseFloat($('#CostoPrimerDiaRenta').val()),
    costoSegundoDiaRenta= parseFloat($('#CostoSegundoDiaRenta').val()),
    precioKilometro= parseFloat($('#PrecioKilometro').val());



//Fechas seleccionadas
fechainicio= new Date($("#fechainiciotxt").val());
fechafin= new Date($("#fechafintxt").val());

//Kilometraje seleccionado
var kilometraje = parseInt($("#kilometraje option:selected" ).text());
//Una vez que el usuario escoge el kilometraje, este deja de ser automatico
var kilometrajeAutomatico = true;

//Momento
      $("#fechainicio_Hora_btn").html($('#fechainicio_Hora').val());
      $("#fechafin_Hora_btn").html($('#fechafin_Hora').val());


//Si se tienen todos los datos para calcular el precio, hacerlo
if(!isNaN(kilometraje) && $("#fechainiciotxt").val()>"" && $("#fechainiciotxt").val()>"")
  calcularPrecio();

calcularDias();


//Sincronizar informacion con Modal
  $('#modalRentar').on('shown.bs.modal', function (event) {

        //Establecer la informacion en el modal
        $('#fechainiciotxtModal').val($('#fechainiciotxt').val());
        $('#fechafintxtModal').val($('#fechafintxt').val());
        $('#kilometrajeModal').val($('#kilometraje').val());

        $("#costopordiaModal").text($("#costopordia").text());
        $("#costototalModal").text($("#costototal").text());

        $("#fechainicio_Hora_btnModal").html($("#fechainicio_Hora_btn").html());
        $('#fechainicio_HoraModal').val($('#fechainicio_Hora').val());

        $("#fechafin_Hora_btnModal").html($("#fechafin_Hora_btn").html());
        $('#fechafin_HoraModal').val($('#fechafin_Hora').val());

       $('#periodorentaformModal').formValidation('revalidateField', 'condicionesCumplidasModal');

      }); 



// //Sincronizar informacion con Form
//   $('#modalRentar').on('hidden.bs.modal', function (event) {

//         //Establecer la informacion en el modal
//         $('#fechainiciotxt').val($('#fechainiciotxtModal').val());
//         $('#fechafintxt').val($('#fechafintxtModal').val());
//         $('#kilometraje').val($('#kilometrajeModal').val());

//         $("#costopordia").text($("#costopordiaModal").text());
//         $("#costototal").text($("#costototalModal").text());

//         $("#fechainicio_Hora_btn").html($("#fechainicio_Hora_btnModal").html());
//         $('#fechainicio_Hora').val($('#fechainicio_HoraModal').val());

//         $("#fechafin_Hora_btn").html($("#fechafin_Hora_btnModal").html());
//         $('#fechafin_Hora').val($('#fechafin_HoraModal').val());

//         modalOpen=false;
//         console.log("modalClosed");
//       }); 




  document.getElementById("fechainicio_Hora_btn").onclick = function() {

      var momento = $("#fechainicio_Hora").val();//momento de inicio
      momento = (momento == "a.m." ? "p.m." : "a.m."); // toggle

      //Si es el mismo dia y la fecha de inicio es pm, la fecha fin debe volverse pm
      if(fechainicio>"" && (fechainicio - fechafin == 0)&&
        momento=="p.m.")
      {
        $("#fechafin_Hora_btn").html(momento);
        $('#fechafin_Hora').val(momento);
      }

      //establecer elementos
      $("#fechainicio_Hora_btn").html(momento);
      $('#fechainicio_Hora').val(momento);


      //Recalcular dias
      calcularDias()
      //Volver a calcular precio
      calcularPrecio();
  }; 


  document.getElementById("fechafin_Hora_btn").onclick = function() {

      var momento = $("#fechafin_Hora").val();//momento de entrega


      //Si es el mismo día y el momento de inicio es pm, la fecha fin solo puede ser pm
      if(fechainicio>"" && (fechainicio - fechafin == 0)&&
        $("#fechainicio_Hora").val()=="p.m.")
      {
        momento = "p.m.";
      }
      else//Invertir
        momento = (momento == "a.m." ? "p.m." : "a.m.");

      //establecer valores en elementos
      $("#fechafin_Hora_btn").html(momento);
      $('#fechafin_Hora').val(momento);

      //Recalcular dias
      calcularDias();
      //Calcular precio
      calcularPrecio();

  }; 



  	$('.input-daterange')
        .datepicker({
            format: 'yyyy/mm/dd',
            startDate: hoy,
            language: "es"
        });


//Al cambiar campo de fecha...
  $('#fechainiciotxt')
  .on('changeDate', function(e) {
            // Revalidate the date field
            $('#periodorentaform').formValidation('revalidateField', 'fechainiciotxt');
            //Actualizar fecha
            fechainicio = new Date($("#fechainiciotxt").val());
            //Calcular los días
            calcularDias();
            //Actualizar precio
            calcularPrecio();
        }); 


//Al cambiar campo de fecha...
  $('#fechafintxt')
  .on('changeDate', function(e) {
            // Revalidate the date field            
            $('#periodorentaform').formValidation('revalidateField', 'fechafintxt');
            //Actualizar fecha
            fechafin = new Date($("#fechafintxt").val());
            //Calcular los días
            calcularDias();
            //Actualizar precio
            calcularPrecio();
        }); 



$("#kilometraje").change(function(){
	var km = $("#kilometraje"+" option:selected").text();

  kilometrajeAutomatico = false;

    //kilometraje = parseInt(km.substring(km.indexOf('-')+2,km.length));
    kilometraje = parseInt(km);
    calcularPrecio();

});



  //Calcular la cantidad de días en el intervalo de las fechas
  function calcularDias()
  {
   //cantidad de días, y costos
      var c = 24*60*60*1000;

      //Si las fechas son válidas
      dias = Math.round((fechainicio - fechafin)/(c))*-1; 

      //Si inicio es am y fin es pm del día siguiente, se cuentan 2 días, de lo contrario 1.
    if($('#fechainicio_Hora').val()=="a.m." && 
        $('#fechafin_Hora').val()=="p.m." )dias++;

      //Al cambiar el periodo, seleccionar automaticamente un kilometraje
    if(dias>0 && kilometrajeAutomatico)
      establecerKilometrajeAutomatico();

    //Verificar disponibilidad
    verificarDisponibilidad();
  }


  //Calcular un kilometraje automático acorde a la cantidad de días
  function establecerKilometrajeAutomatico()
  {
    //Definir el que se desea
    var kmbuscado = dias * 100;
    var hallado=false;

    $("select#kilometraje option")
   .each(function()
    {
      //Si corresponde a este valor o es menor
      if(kmbuscado <= parseInt(this.text) && !hallado)
      {
        this.selected = hallado = true;
        kilometraje = parseInt(this.text);
      }
    });
  }



  function calcularPrecio()
  {

//Si el período es válido?


//En caso de ser un solo día, Precio por primer día + km x precio por Km
if(dias<2)
{
    costoPorDia = costoPrimerDiaRenta+ (kilometraje*precioKilometro);
    totalRenta = costoPorDia;
}
//Si es más de un día: Precio promedio + km * precio por Km * dias
else if(dias>1)
{
    costoPorDia = (costoPrimerDiaRenta + costoSegundoDiaRenta)/2 + (kilometraje*precioKilometro);
    totalRenta = costoPorDia*dias;
}


//establecer elementos para indicar precios

if(isNaN(costoPorDia))//Falto informacion para hacer el calcula
{
  $("#costopordia").text("$ 0");
  $("#costototal").text("$ 0");
}
else
{
  $("#costopordia").text("$" + costoPorDia);
  $("#costototal").text("$" + (totalRenta>0?totalRenta:0));
}



}




$('#periodorentaform')  
.formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        fechainiciotxt: {
            validators: {
               notEmpty: {
                message: 'Se requiere la fecha de inicio.'
            }
          }
        },
        fechafintxt: {
            validators: {
               notEmpty: {
                message: 'Se requiere la fecha fin.'
            }
          }
        },
        kilometraje: {
          validators: {
            notEmpty: {
              message: 'Debe seleccionar un Kilometraje'
            }
          }
        }
}                          
})
        .on('success.form.fv', function(e, data) {
        	e.preventDefault();
            $('#modalRentar').modal('show'); 
        });






$('#periodorentaformModal')  
.formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        condicionesCumplidasModal: {
            validators: {
                notEmpty: {
                    message: ' '
                }
            }
         }
    //     kilometrajeModal: {
    //       validators: {
    //         notEmpty: {
    //           message: 'Debe seleccionar un Kilometraje'
    //         }
    //       }
    //     }                         
    // }
}});



});