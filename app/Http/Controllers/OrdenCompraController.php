<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrdenCompra;
use App\Proveedores;
use App\Materiales;
use App\MaterialesCompra;
use App\Http\Requests\OrdenCompraRequest;
class OrdenCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenc=OrdenCompra::all();

        $row_number=1;

        return View('admin.ordencompra.index',compact('ordenc','row_number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores=Proveedores::all();
        $materiales=Materiales::all();

        return View('admin.ordencompra.create',compact('proveedores','materiales'));
    }

    public function buscarMateriales(OrdenCompraRequest $request)
    {
        $codigo=$request->codigo;
        $proveedor=Proveedores::find($request->id_proveedor);
        
        $materiales=$request->materiales;
        //dd($materiales);
        for ($i=0; $i <count($request->materiales) ; $i++) { 
            $material=Materiales::find($request->materiales[$i]);
            $nombre_materiales[$i]=$material->nombre;
        }
        return View('admin.ordencompra.cantidades',compact('codigo','proveedor','materiales','nombre_materiales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $fecha=date('Y/m/d');
        $orden=OrdenCompra::create([
                'fecha' => $fecha,
                'id_proveedor' => $request->id_proveedor,
                'codigo' => $request->codigo,
                'estado' => 'Sin Aprobar'
            ]);
        for ($i=0; $i <count($request->id_material) ; $i++) { 
            $materialc=MaterialesCompra::create([
                    'id_ordenc' => $orden->id,
                    'id_material' => $request->id_material[$i],
                    'cantidad' => $request->cantidad[$i]
                ]);
        }
        return redirect()->to('admin/orden_compra/lista')->with('success', 'Orden de Compra registrada exitosamente, se debe aprobar por el Administrador!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ordenc=OrdenCompra::find($id);

        return View('admin.ordencompra.show',compact('ordenc'));
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
        $ordenc=OrdenCompra::find($id);

        $ordenc->estado="Cancelada";

        $ordenc->save();

        return redirect()->back()->with('success', 'Orden de Compra fué cancelada exitosamente!');


    }

    public function aprobar($id)
    {
        $ordenc=OrdenCompra::find($id);

        $ordenc->estado="Aprobada";

        $ordenc->save();

        return redirect()->back()->with('success', 'Orden de Compra fué aprobada exitosamente!');


    }

    public function ejecutar($id)
    {
        $ordenc=OrdenCompra::find($id);

        $ordenc->estado="Ejecutada";

        $ordenc->save();

        foreach ($ordenc->materialescompra as $key) {
            $material=Materiales::find($key->id_material);
            $material->existencia=$material->existencia+$key->cantidad;
            $material->save();
        }

        return redirect()->back()->with('success', 'Orden de Compra fué Ejecutada exitosamente, y actualizado el inventario!');


    }
}
