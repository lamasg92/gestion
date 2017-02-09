<?php

namespace App\Http\Controllers\Client;

use App\Entities\Client;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Error;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::name($request->get('nombre'))->orderby('id', 'DESC')->paginate();

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation nombre required and email required and unique
        $this->validate($request, [
            'nombre' => 'required',
            'telefono' => 'numeric',
            'email' => 'required|email|max:255|unique:clients'
        ]);
        //saves
        Client::create($request->all());

        flash('Cliente creado exitosamente!!', 'success');

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);

        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $client->fill($request->all());

        $this->validate($request, [
            'nombre' => 'required',
            'telefono' => 'required|numeric',
            'email' => 'required|email|max:255|unique:clients'
        ]);

        $client->save();
        flash('Cliente Actualizado exitosamente!!', 'success');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        try{
            $client->delete();
        }catch (Exception $e){
            flash('El Cliente tiene facturas asociadas!!', 'warning');
            return redirect()->back();
        };
        flash('Cliente borrado exitosamente!!', 'success');
        return redirect()->back();
    }
}
