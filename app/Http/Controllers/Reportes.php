<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_herramientas;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\herramientas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class Reportes extends Controller
{
    public function reporte_trabajador(Request $request){
     $reporte_trabajador = DB::select('select users.id, users.name,herramientas.nombre,herramientas.estado,herramientas.numero_serie,herramientas.unidad,user_herramientas.created_at,user_herramientas.cantidad,user_herramientas.asignados FROM users INNER JOIN user_herramientas on users.id = user_herramientas.user INNER JOIN obras on user_herramientas.obra = obras.id INNER JOIN herramientas on user_herramientas.herramienta = herramientas.id where users.id = ?', [$request->id]);
     foreach ($reporte_trabajador as $key => $value) {
        $nombre = $value->name;
        $id = $value->id;

       }
     return view('reportes.reporte_x_trabajador')->with(compact('id'))->with(compact('nombre'))->with(compact('reporte_trabajador'));
    }
public function add_herramienta_excel(Request $request){


  $tipo       = $_FILES['dataCliente']['type'];
  $tamanio    = $_FILES['dataCliente']['size'];
  $archivotmp = $_FILES['dataCliente']['tmp_name'];
  $lineas     = file($archivotmp);
  $herramientas = array();


  foreach ($lineas as $linea) {

    

          $datos = explode(",", $linea);
        
        
          $herramienta = new herramientas();
          $herramienta->nombre = !empty($datos[0])  ? ($datos[0]) : '';

          $idfinal_herramienta = DB::select('select MAX(id) AS id FROM herramientas');
          if($idfinal_herramienta){
            foreach ($idfinal_herramienta as $key => $value) {
              $idfinal_herramienta = $value->id;
            }
            $herramienta->numero_serie = $idfinal_herramienta + 1;
          }
          $herramienta->unidad = !empty($datos[1])  ? ($datos[1]) : '';
          $herramienta->estado = 1;
          $herramienta->save();

        
    
  }
  return redirect()->route('altas_bajas');

  }
  }