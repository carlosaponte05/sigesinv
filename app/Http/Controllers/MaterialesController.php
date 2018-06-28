<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materiales;
use App\Http\Requests\MaterialesRequest;

class MaterialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales=Materiales::all();

        $row_number = 1;

        return view('admin.materiales.index',compact('materiales','row_number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.materiales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaterialesRequest $request)
    {
        $buscar=Materiales::where('nombre',$request->nombre)->first();
        $cuantos=count($buscar);

        if ($cuantos>0) {
            
            return redirect()->back()->with('warning', 'El Material ya se encuentra registrado!');
        } else {

            if ($request->stock_min>=$request->stock_max) {
                return redirect()->back()->with('warning', 'El Stock Mínimo no puede ser mayor o igual al Stock Máximo!');
            } else {
                
            $materiales=Materiales::create([
                    'nombre' => $request->nombre,
                    'caracteristica' => $request->caracteristica,
                    'existencia' => '0',
                    'unidad' => $request->unidad,
                    'precio_ind' => $request->precio_ind,
                    'precio_und' => $request->precio_und,
                    'stock_min' => $request->stock_min,
                    'stock_max' => $request->stock_max]);

            return redirect()->to('admin/materiales')->with('success', 'El Material fue registrado exitosamente!');
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
        $material=Materiales::find($id);

        return View('admin.materiales.edit',compact('material'));
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
        //dd($request->all());
        $buscar=Materiales::where('nombre',$request->nombre)->where('id','<>',$id)->first();
        $cuantos=count($buscar);

        if ($cuantos>0) {
            
            return redirect()->back()->with('warning', 'El Material ya se encuentra registrado!');
        } else {

            if ($request->stock_min>=$request->stock_max) {
                return redirect()->back()->with('warning', 'El Stock Mínimo no puede ser mayor o igual al Stock Máximo!');
            } else {
                
            $material=Materiales::find($id);
                $material->nombre = $request->nombre;
                $material->caracteristica = $request->caracteristica;
                $material->unidad = $request->unidad;
                $material->precio_ind = $request->precio_ind;
                $material->precio_und = $request->precio_und;
                $material->stock_min = $request->stock_min;
                $material->stock_max = $request->stock_max;
                $material->save();

            return redirect()->to('admin/materiales')->with('success', 'El Material fue actualizado exitosamente!');
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
