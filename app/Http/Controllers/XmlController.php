<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;

class XmlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('xml');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $file = $request->XML;
        try{
            $doc = new \DOMDocument();
            $doc->load($file);
            $is_valid_xml = $doc->schemaValidate('validar.xsd');
            $xml=simplexml_load_file($file) or die("Error: Cannot create object");





        }catch (\Exception $exception){
            return "el archivo contiene un error";
        }
        try {


            foreach ($xml as $xmls) {
                $user = new User();
                $user->name = $xmls->Nombre->__toString();
                $user->email = $xmls->Correo->__toString();
                $user->password = bcrypt($xmls->Contrasena->__toString());
                $user->save();

            }
        }catch (\Exception $exception){
            Flash::success("Los usuarios ya estan importados");
            return redirect()->route('principal');
        }

        Flash::success("Los usuarios se han importado correctamente");
//        return view('principal');
        return redirect()->route('principal');

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
        //
    }
}
