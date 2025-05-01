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

    // retorna vista xml
    public function index()
    {
        return view('backend.xml.json_view');
    }


    // retorna datos de tabla basada en el XML
    public function tablaJSON()
    {
        $json = json_decode($this->show(), true); // lo pasamos a array asociativo
        return view('backend.xml.tabla.xml_tabla', ['books' => $json['book']]);
    }

 
    public function show()
    {
        $xmlPath = storage_path('xml/books.xml'); // Asegúrate de que el nombre coincida con tu archivo XML

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