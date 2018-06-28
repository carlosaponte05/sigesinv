<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedores;
use App\Http\Requests\ProveedoresRequest;
class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores=Proveedores::all();

         $row_number = 1;

         return View('admin.proveedores.index',compact('proveedores','row_number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedoresRequest $request)
    {
        $buscar=Proveedores::where('razon_social',$request->razon_social)->first();
        if (count($buscar)>0) {
            return redirect()->back()->with('warning', 'La Razón Social de este proveedor ya se encuentra registrado!');
        } else {
            $buscar2=Proveedores::where('rif',$request->rif)->first();
            if (count($buscar2)>0) {
                return redirect()->back()->with('warning', 'El RIF  de este proveedor ya se encuentra registrado!');
            } else {
                $proveedor=Proveedores::create([
                        'razon_social' => $request->razon_social,
                        'rif' => $request->rif,
                        'telefono' => $request->telefono
                    ]);
                return redirect()->back()->with('success', 'El Proveedor se registró exitosamente!');
            }
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor=Proveedores::find($id);

        return View('admin.proveedores.edit',compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedoresRequest $request, $id)
    {
        $buscar=Proveedores::where('razon_social',$request->razon_social)->where('id','<>',$id)->first();
        if (count($buscar)>0) {
            return redirect()->back()->with('warning', 'La Razón Social de este proveedor ya se encuentra registrado!');
        } else {
            $buscar2=Proveedores::where('rif',$request->rif)->where('id','<>',$id)->first();
            if (count($buscar2)>0) {
                return redirect()->back()->with('warning', 'El RIF  de este proveedor ya se encuentra registrado!');
            } else {
                $proveedor=Proveedores::find($id);
                        $proveedor->razon_social = $request->razon_social;
                        $proveedor->rif = $request->rif;
                        $proveedor->telefono = $request->telefono;
                        $proveedor->save();
                    
                return redirect()->back()->with('success', 'El Proveedor se actualizó exitosamente!');
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
