<?php

namespace App\Http\Controllers\Backend\XML;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class XmlController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Funcion que retorna la vista xml
    public function index()
    {
        return view('backend.xml.json_view');
    }


    // Funcion que retorna datos de tabla basada en el XML
    public function tablaJSON()
    {
        $json = json_decode($this->show(), true); // Se pasa a un array asociativo
        return view('backend.xml.tabla.xml_tabla', ['books' => $json['book']]);
    }

 
    public function show()
    {
        $xmlPath = storage_path('xml/books.xml'); 

        if (!file_exists($xmlPath)) {
            abort(404, 'Archivo XML no encontrado');
        }

        $xmlContent = file_get_contents($xmlPath);
        $xml = simplexml_load_string($xmlContent);

        if ($xml === false) {
            abort(500, 'Error al procesar el XML');
        }

        $json = json_encode($xml, JSON_PRETTY_PRINT);
        return $json;
    }
}