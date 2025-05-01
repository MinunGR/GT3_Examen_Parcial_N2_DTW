<?php

namespace App\Http\Controllers\Backend\SOAP;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoapController extends Controller
{
    //Funcion del formulario
    public function formulario()
    {
        return view('backend.soap.calculadora');
    }

    //Funcion para la calculadora

    public function calcular(Request $request)
    {
        $num1 = (int)$request->input('num1');
        $num2 = (int)$request->input('num2');
        $operacion = $request->input('operacion');
        //Solicitud de SOAP
        $client = new \SoapClient("http://www.dneonline.com/calculator.asmx?wsdl");

        //Operaciones (suma y multiplicacion)
        if ($operacion == 'sumar') {
            $resultado = $client->Add(['intA' => $num1, 'intB' => $num2])->AddResult;
        } elseif ($operacion == 'multiplicar') {
            $resultado = $client->Multiply(['intA' => $num1, 'intB' => $num2])->MultiplyResult;
        } else {
            $resultado = 'Operación no válida';
        }

        return view('backend.soap.calculadora', compact('resultado', 'num1', 'num2', 'operacion'));
    }
}
