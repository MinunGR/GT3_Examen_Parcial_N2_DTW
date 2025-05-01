<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora SOAP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container py-5">

    <h1 class="mb-4">Calculadora usando SOAP</h1>

    <form method="POST" action="{{ route('calcular') }}">
        @csrf

        <div class="mb-3">
            <label for="num1" class="form-label">Número 1</label>
            <input type="number" name="num1" required placeholder="Número 1" value="{{ old('num1', $num1 ?? '') }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label for="num2" class="form-label">Número 2</label>
            <input type="number" name="num2" required placeholder="Número 2" value="{{ old('num2', $num2 ?? '') }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label for="operacion" class="form-label">Operación</label>
            <select name="operacion" id="operacion" class="form-select" required>
                <option value="sumar">Sumar</option>
                <option value="multiplicar">Multiplicar</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Calcular</button>
    </form>
    </br>
    @if (isset($resultado))
        <div class="alert alert-success">
            <h4>Resultado:</h4>
            <p>
            <h3>Resultado de {{ $operacion }}: {{ $resultado }}</h3>
            </p>
        </div>
    @endif

</body>

</html>
