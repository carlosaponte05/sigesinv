<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrdenPedido;
use App\Materiales;
use App\MaterialesPedidos;
use App\Http\Requests\OrdenPedidoRequest;
class OrdenPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenp=OrdenPedido::all();

        $row_number=1;

        return View('admin.ordenpedido.index',compact('ordenp','row_number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiales=Materiales::all();

        return View('admin.ordenpedido.create',compact('materiales'));
    }
    public function buscarMateriales(OrdenPedidoRequest $request)
    {
        $codigo=$request->codigo;
        
        
        $materiales=$request->materiales;
        //dd($materiales);
        for ($i=0; $i <count($request->materiales) ; $i++) { 
            $material=Materiales::find($request->materiales[$i]);
            $nombre_materiales[$i]=$material->nombre;
        }
        return View('admin.ordenpedido.cantidades',compact('codigo','materiales','nombre_materiales'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fecha=date('Y/m/d');
        $orden=OrdenPedido::create([
                'fecha' => $fecha,
                'codigo' => $request->codigo,
                'estado' => 'Sin Aprobar'
            ]);
        for ($i=0; $i <count($request->id_material) ; $i++) { 
            $materialc=MaterialesPedidos::create([
                    'id_ordenp' => $orden->id,
                    'id_material' => $request->id_material[$i],
                    'cantidad' => $request->cantidad[$i]
                ]);
        }
        return redirect()->to('admin/orden_pedido/lista')->with('success', 'Orden de Pedido registrada exitosamente, se debe aprobar por el Administrador o el Jefe de almacén!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $ordenp=OrdenPedido::find($id);

        return View('admin.ordenpedido.show',compact('ordenp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ordenp=OrdenPedido::find($id);

        $ordenp->estado="Cancelada";

        $ordenp->save();

        return redirect()->back()->with('success', 'Orden de Pedido fué cancelada exitosamente!');
    }

    public function aprobar($id)
    {
        $ordenp=OrdenPedido::find($id);

        $ordenp->estado="Aprobada";

        $ordenp->save();

        return redirect()->back()->with('success', 'Orden de Pedido fué aprobada exitosamente!');


    }

    public function ejecutar($id)
    {
        $ordenp=OrdenPedido::find($id);

        $ordenp->estado="Ejecutada";

        $ordenp->save();
        //dd($ordenp->materialespedido);
        foreach ($ordenp->materialespedido as $key) {
            $material=Materiales::find($key->id_material);
            if ($material->existencia>=$key->cantidad) {
               $existencia=$material->existencia-$key->cantidad;
               //dd($material->stock_min);
               if ($existencia>=$material->stock_min) {
                    $material->existencia=$existencia;
                   $material->save();
               } 
               
            
            } 
            
            
        }

        return redirect()->back()->with('success', 'Orden de Pedido fué Ejecutada exitosamente, y actualizado el inventario!');


    }
}
