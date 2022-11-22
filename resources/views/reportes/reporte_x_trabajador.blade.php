<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Reporte</title>

</head>
<body>
  <style>
    .botton{
        background: red;
        background-color: brown;
    }
    .espacio
    {
        height: 2rem;
    }
    .borde{
       border: 1px solid black;
       background: rgb(78, 245, 245);
    }
    .borde2{
       border: 1px solid gray;
    }
    .wrapper {
      
    }
    
    .wrapper a {
      display: inline-block;
      text-decoration: none;
      padding: 15px;
      background-color: #fff;
      border-radius: 3px;
      text-transform: uppercase;
      color: #585858;
      font-family: 'Roboto', sans-serif;
    }
    
    .modal {
      visibility: hidden;
      opacity: 0;
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(77, 77, 77, .7);
      transition: all .4s;
    }
    
    .modal:target {
      visibility: visible;
      opacity: 1;
    }
    
    .modal__content {
      border-radius: 4px;
      position: relative;
      width: 1000px;
      max-width: 90%;
      background: #fff;
      padding: 1em 2em;
    }
     body {
  background: #F1EDED;
  background: linear-gradient(to right, #a6cdfc, #a6dbfe);
}
    .modal__footer {
      text-align: right;
      a {
        color: #585858;
      }
      i {
        color: #d02d2c;
      }
    }
    .modal__close {
      position: absolute;
      top: 10px;
      right: 10px;
      color: #585858;
      text-decoration: none;
    }
    
    button {
  margin: 30px;
}
.custom-btn {
  width: 170px;
  height: 40px;
  margin-bottom: 1.3rem;
  color: #fff;
  border-radius: 5px;
  padding: 10px 25px;
  font-family: 'Lato', sans-serif;
  font-weight: 500;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
   box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  outline: none;
}

/* 1 */
.btn-1 {
  background: #fdcae1;
  background: linear-gradient(0deg, #fdcae1 0%,#fdcae1 100%);
  border: none;
}
.btn-1:hover {
   background: #f297c0;
background: linear-gradient(0deg,#f297c0 0%, #f297c0 100%);
}
    
 
/* Estilos para el HEAD de la tabla */
table.dataTable thead {background-color:#fdcae1;color: azure;}

/* Estilos para los botones de paginacion */
.page-item.active .page-link {
  background-color:#fdcae1 !important;
    color: azure !important;
    /* border: 1px solid black; */
}
.page-link {
    color: black !important;
}
    
    
    </style>
@extends('../Menu/Menu')
@extends('../Menu/websocktet')

<div class="espacio"></div>
    <div class="container shadow-lg p-3 mb-5 mt-5 bg-body rounded">
      <div class="row" style="margin:0px; padding:0px;">
        <div class="col-2">
          <a href="{{ route('reportes') }}">
            <button type="button" class="btn btn-1">
              <svg x   mlns="http://www.w3.org/2000/svg" width="50" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
              </svg>
            </button>
          </a>
        </div>
        <div class=" offset-2 col-6"> 
          <h3>{{$nombre}}  
     </h3>        
     </div>
     <div class="col-2"> 
     <a  href=" {{ route('get_herramientas_user', ['id'=>$id]) }}">
           <button class="btn btn-1"> 
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
               <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
             </svg>  
           </button></a>
 </h3>        
 </div>
      </div>
        <div class="row">
      
          <div class="col">
                <table id="myTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                          <th>Partida</th>
                        <th>Articulo</th>
                        <th> No.Serie </th>
                        <th>Unidad</th>
                        <th>cantidad</th>
                        <th>Fecha de pedido</th>
                        <th>Dias Transcurridos</th>
                  

                          </tr>
                    </thead>
                    <tbody class=" align-middle">
    @php $partida = 1; $rojo =0;@endphp
    <br>
    @foreach ($reporte_trabajador as $items)
    @php
 
 
      $fecha_hoy=date("y-m-d");
     $fecha_creacion = strtotime ( $items->created_at);
    $fecha_creacion = date('y-m-d', $fecha_creacion);
    $date1=date_create($fecha_hoy);
    $date2=date_create($fecha_creacion);
    $diff=date_diff($date2,$date1);
    $transcurso_dias=$diff->format("%a");
    $string = $transcurso_dias;
    $transcurso_dias = (int) $string;
    $fecha_creacion = strtotime ( $items->created_at);
    $fecha_creacion = date('d-m-y', $fecha_creacion);
    $amarillo = 0;
    $rojo = 0;
    if ($transcurso_dias >=30 && $transcurso_dias <59){
      $amarillo =1;
    }
   else if ($transcurso_dias >=60) {
     $rojo = 1;
    }
  
   
  

  @endphp
  @if ($amarillo ==1 && $items->estado != 1)
  <tr style="background: #fdfd96">
    @endif
  @if ($rojo ==1 && $items->estado != 1)
  <tr style="background: #f98381">
    @endif
 
 

      <td>{{$partida}}</td>
      <td>{{$items->nombre}}</td>

      <td>{{$items->numero_serie}}</td>
     
      
      <td>{{$items->unidad}}</td>
      @if ($items->asignados>0)
      <td>{{$items->asignados}}</td>
      @endif
      @if ($items->asignados==null)
      <td>{{$items->cantidad}}</td>
      @endif
      <td>{{$fecha_creacion}}</td>
      @if ($items->estado==1)
              <td>Ya se encuentra en almacen</td>
              @endif
              @if ($items->estado!=1)
              <td>{{$transcurso_dias}}</td>
              @endif
    

     
    </form>

    </tr>
  @php $partida ++@endphp  
@endforeach

            
            </tbody>              
                </table>
            </div>
        </div>
    </div>

 

 <!-- jquery y bootstrap -->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>   
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 <!-- datatables con bootstrap -->
 <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

 <!-- Para usar los botones -->
 <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>


<!-- Para los estilos en Excel     -->
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>
<script>
$(document).ready(function () {
    $("#myTable").DataTable({
      language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        pageLength: 5,
     
     scrollY:        "400px",
     scrollX:        true,
     scrollCollapse: true,
     paging:         true,
     columnDefs: [
         { width: 200, targets: 0 }
     ],
      responsive:true,
      dom: '<"row" B> <"row"<"col-md-6 "l> <"col-md-6"f> > rt <"row"<"col-md-6 "i> <"col-md-6"p> >',           buttons:{
            dom: {
                button: {
                    className: 'custom-btn btn-1'
                }
            },
            buttons: [
            {
                //definimos estilos del boton de excel
                extend: "excel",
                text:'Exportar a Excel',
                className:'custom-btn btn-1',

                // 1 - ejemplo básico - uso de templates pre-definidos
                //definimos los parametros al exportar a excel
                
                excelStyles: {                
                    //template: "header_blue",  // Apply the 'header_blue' template part (white font on a blue background in the header/footer)
                    //template:"green_medium" 
                    
                    "template": [
                        "blue_medium",
                        "header_green",
                        "title_medium"
                    ] 
                    
                },
                

                // 2 - estilos a una fila   
                /* 
                excelStyles: {                      // Add an excelStyles definition
                    cells: "2",                     // adonde se aplicaran los estilos (fila 2)
                    style: {                        // The style block
                        font: {                     // Style the font
                            name: "Arial",          // Font name
                            size: "14",             // Font size
                            color: "FFFFFF",        // Font Color
                            b: true,               // negrita SI
                        },
                        fill: {                     // Estilo de relleno (background)
                            pattern: {              // tipo de rellero (pattern or gradient)
                                color: "ff7961",    // color de fondo de la fila
                            }
                        }
                    }
                },
                */

                // 3 - uso de condiciones
                /*
                 excelStyles: {
                    cells: 'sD', //(s) de Smart - Referencia de celda inteligente, todas las filas de datos en la columna D (en este caso Edad)
                    condition: {                    // Add the style conditionally
                        type: 'cellIs',             // Using the cellIs type
                        operator: 'between',        // Operator a usar "Entre"
                        formula: [35,50],    // arreglo de valores requeridos para el operador 'entre' (edades entre 35 y 50 años son pintadas)
                    },
                    style: {
                        font: {
                            b: true,                // Make the font bold
                        },
                        fill: {                     // Style the cell fill (background)
                            pattern: {              // Type of fill (pattern or gradient)
                                bgColor: 'e8f401',  // Fill color (be aware of the Excel gotcha that conditonal fills                                
                            }
                        }
                    }
                }
                */

                // 4 - Reemplazar o insertar celdas, columnas y filas

                // 4.1 - Añadir columnas
                /*
                insertCells: [                  // Agregar una opción de configuración insertCells
                    {
                        cells: 'sCh',               // la "s" de Smart, "C" es la columna y "h" se refiere al header,
                        content: 'Nueva columna C',    // nombre del encabezado de la columna que insertamos
                        pushCol: true,              // pushCol hace que se inserte la columna
                    },
                    {
                        cells: 'sC1:C-0',           // Target the data
                        content: 'C',                // Add empty content
                        pushCol: true               // empuja las columnas a la derecha para insertar el nuevo contenido
                    }                    
               ],
                excelStyles: {
                    template: 'cyan_medium',    // Add a template to the result
                }
                */

                // 4.2 - Insertar filas
                /*
                insertCells: [                  // Agregar una opción de configuración insertCells                   
                    {
                        cells: 's5:6',              // Inserta los datos en las filas 5 y 6 contando desde el encabezado
                        content: 'Celdas nuevas',   // contenido a insertar
                        pushRow: true               // empuja las filas hacia abajo para insertar el contenido                    
                    },
                    {
                        cells: 'B3',                // Celda B3
                        content: 'Esta es la celda B3', // Simplemente sobreescribimos su contenido                                                    
                    }
               ],
                excelStyles: {
                    template: 'cyan_medium',    // Add a template to the result
                }
                */


            // ejemplo para IMPRIMIR
            /*
            pageStyle: {
                sheetPr: {
                    pageSetUpPr: {
                        fitToPage: 1            // Fit the printing to the page
                    } 
                },
                printOptions: {
                    horizontalCentered: true,
                    verticalCentered: true,
                },
                pageSetup: {
                    orientation: "landscape",   // Orientacion
                    paperSize: "9",             // Tamaño del papel (1 = Legal, 9 = A4)
                    fitToWidth: "1",            // Ajustar al ancho de la página
                    fitToHeight: "0",           // Ajustar al alto de la página
                },
                pageMargins: {
                    left: "0.2",
                    right: "0.2",
                    top: "0.4",
                    bottom: "0.4",
                    header: "0",
                    footer: "0",
                },
                repeatHeading: true,    // Repeat the heading row at the top of each page
                repeatCol: 'A:A',       // Repeat column A (for pages wider than a single printed page)
            },
            excelStyles: {
                template: 'blue_gray_medium',    // Add a template style as well if you like
            }
            */    

            },
            ]            
        }            
    });
});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

  </body>
</html>