<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "pages/view";
$route['reestablecerpass/cambiarpass/(:any)'] = "reestablecerpass/cambiarpass/$1";
$route['confirmacion/(:any)'] = "confirmacion/index/$1";
$route['home']= "pages/view/home";
//PAGINAS ESTATICAS----------------------------------
$route['patrocinador']= "pages/view/patrocinador";
$route['beneficios']= "pages/view/beneficios";
$route['propietario']= "pages/view/propietario";
$route['arrendador']= "pages/view/arrendador";
$route['porqueTomatucar']= "pages/view/porqueTomatucar";
$route['contratoR']= "pages/view/contratoR";
$route['terminosycondiciones']= "pages/view/terminosycondiciones";
$route['contacto']= "pages/view/contacto";
$route['comunidad']= "pages/view/comunidad";
$route['desarrollo']= "pages/view/desarrollo";
$route['seguro']= "pages/view/seguro";
$route['pago']= "pages/view/pago";
//---------------------------------------------------
$route['registro']= "registro";
$route['login']= "login";
$route['logout']= "logout";
$route['perfil']= "perfil";
$route['perfil/subirInformacion'] = "perfil/subirInformacion";
$route['modificarcorreo']= "modificarcorreo";
$route['modificarcuenta']= "modificarcuenta";
$route['filtroauto']= "filtroauto";
$route['auto']= "auto";
$route['auto/subirinformacion']= "auto/subirinformacion";
$route['autoinfogeneral/(:any)']= "autoinfogeneral/index/$1";
$route['automodificarfoto/(:any)']= "automodificarfoto/index/$1";
$route['automodificarfoto/subirfotos']= "automodificarfoto/subirfotos";
$route['automodificaropciones/(:any)']= "automodificaropciones/index/$1";
$route['automodificaropciones/subirInformacion']= "automodificaropciones/subirInformacion";
$route['automodificarprecio/(:any)']= "automodificarprecio/index/$1";
$route['automodificarprecio/subirInformacion']= "automodificarprecio/subirInformacion";
$route['autocalendario/(:any)']= "autocalendario/index/$1";
$route['autocalendario/insert_disponibilidad']= "autocalendario/insert_disponibilidad";
$route['autocalendario/update_DatesCalendario']= "autocalendario/update_DatesCalendario";
$route['autocalendario/delete_idcalendar']= "autocalendario/delete_idcalendar";
$route['autocalendario/compareDate']= "autocalendario/compareDate";
$route['autocalendario/getAllDates']= "autocalendario/getAllDates";
$route['autoanuncio/(:any)']= "autoanuncio/index/$1";
$route['autoanuncio/solicitarrenta']= "autoanuncio/solicitarrenta";
$route['autodetallerenta/(:any)']= "autodetallerenta/index/$1";
$route['autodetallerenta/enviarMensaje']= "autodetallerenta/enviarMensaje";
$route['autopromocionar/(:any)']= "autopromocionar/index/$1";
$route['autoborrar/(:any)']= "autoborrar/index/$1";
$route['autoborrar/activarDesactivar']= "autoborrar/activarDesactivar";
$route['autoborrar/eliminar']= "autoborrar/eliminar";
$route['autoBorrador/(:any)']= "autoBorrador/index/$1";
$route['buscador']= "buscador";
$route['AceptarRenta/(:any)']= "autodetallerenta/AceptarRenta/$1";
$route['RechazarRenta/(:any)']= "autodetallerenta/RechazarRenta/$1";
$route['actualizarBusqueda']= "actualizarBusqueda";
$route['actualizarRenta']= "actualizarBusqueda/Rentas";
$route['autodetallerenta/(:any)']= "autodetallerenta/index/$1";
//$route['(:any)'] = "pages/view/$1";
//$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */