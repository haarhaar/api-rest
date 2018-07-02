<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Persona;

class PersonaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 /*
	public function index()
	{
		//
	}
*/

//Metodo GET
public function index()
	{
		return response()->json(['datos'=>Persona::all()],200);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	 /*
	public function store()
	{
		//
	}
*/


//Metodo POST
public function store(Request $request)
	{
		if(!$request->get('dui') || !$request->get('nombre') || !$request->get('apellido') || !$request->get('fechaNacimiento')){
			return response()->json(['mensaje'=>'Datos incompletos'],400);
		}
		Persona::create($request->all());
		return response()->json(['mensaje'=>'Persona creada'],201);
	}



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 /*
	public function show($id)
	{
		//
	}
*/

//METODO GET CON ID
	public function show($id)
	{
		$persona=Persona::find($id);
		if(!$persona){
			return response()->json(['mensaje'=>'Persona no encontrada'],200);
		}
		return response()->json(['datos'=>$persona],200);
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 /*
	public function update($id)
	{
		//
	}
*/

//Metodo PUT
public function update(Request $request, $id)
	{
		$metodo=$request->method();
		$persona=Persona::find($id);
		if($metodo==="PATCH"){
			$nombre=$request->get('nombre');
			if($nombre!=null && $nombre!=' '){
				$persona->nombre=$nombre;
				$persona->apellido=$apellido;
				$persona->fechaNacimiento=$fechaNacimiento;
			}
			$persona->save();
			return response()->json(['mensaje'=>'Registro actualizado','codigo'=>'204'],204);
		}
		$nombre=$request->get('nombre');
		$apellido=$request->get('apellido');
		if (!$nombre || !$apellido)
		{
			return response()->json(['mensaje'=>'El nombre o apellido no pueden ser nulos','codigo'=>'400'],400);
		}
		$persona->nombre=$nombre;
		$persona->apellido=$apellido;
		$persona->save();
		return response()->json(['mensaje'=>'Persona actualizada','codigo'=>'200'],200);
	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	 /*
	public function destroy($id)
	{
		//
	}
*/


//Metodo DELETE
public function destroy($id)
	{
		$persona=Persona::find($id);
		if(!$persona){
			return response()->json(['mensaje'=>'Persona no existe','codigo'=>'400'],400);
		}
		$persona->delete();
		return response()->json(['mensaje'=>'Persona eliminada','codigo'=>'204'],204);

	}

}
