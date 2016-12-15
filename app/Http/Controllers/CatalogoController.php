<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use Illuminate\Http\Request;
use Validator;

class CatalogoController extends Controller
{
    /**
     * Muestra la vista para crear la categoria
     * @return Vista
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('catalogo.formCategory', []);
    }
    /**
     * Funcion que me premitira ingresar las categorias a la base de datos
     */
    public function createCategory(Request $request)
    {
        // Creo un objeto de validacion
        $validator = Validator::make($request->all(), [
            'name'        => 'required|max:24|min:2',
            'description' => 'required|min:2',
        ]);
        // Comprubo que la validacion pase
        if ($validator->fails()) {
            // si no pasa redirije al formulario
            return redirect('/home/createCategory')
            //->wihtInput()
            ->withErrors($validator);
        }

        $data              = new Categories();
        $data->name        = $request->name;
        $data->description = $request->description;
        $data->user_id     = \Auth::user()->id;
        $data->save();

        return redirect('/home');
    }

    /**
     * para mostrar los productos
     */
    public function showProducts()
    {
        $tasks = Products::orderBy('created_at', 'asc')->get();
        return view('catalogo.showProducts', ['tasks' => $tasks]);
    }

    /**
     * para redirigil al formulario de los productos
     * @return String
     */
    public function createProducts()
    {
        return view('catalogo.formProducts', []);
    }

    /**
     * [createProductss description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function createProductss(Request $request)
    {

        $data         = new Products();
        $categoria_id = new Categories();

        $data->name        = $request->nombre;
        $data->description = $request->descripcion;
        $data->tax         = $request->iva;
        $data->price       = $request->precio;
        $data->stock       = $request->unidades;
        $data->category_id = $categoria_id->find();
        $data->user_id     = \Auth::user()->id;

        $data->save();

        return redirect('/home/showProducts');
    }

}
