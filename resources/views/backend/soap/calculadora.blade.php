<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora SOAP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<!--
<body class="container py-5">

    <h1 class="mb-4">Calculadora usando SOAP</h1>

    <form method="POST" action="{{ route('calcular') }}">
        @csrf

        <div class="mb-3">
            <label for="num1" class="form-label">Número 1</label>
            <input type="number" name="num1" required placeholder="Ingrese un número entero" value="{{ old('num1', $num1 ?? '') }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label for="num2" class="form-label">Número 2</label>
            <input type="number" name="num2" required placeholder="Ingrese un número entero" value="{{ old('num2', $num2 ?? '') }}"
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

    @if(isset($resultado))
        <div class="alert alert-success">
            <h4>Resultado de {{ $resultado }}</h4>
            <p>
                {{ $num1 }} {{ $operacion == 'sumar' ? '+' : '×' }} {{ $num2 }} = 
                <strong>{{ $resultado }}</strong>
            </p>
        </div>
    @endif

</body>
-->
<!--
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Calculadora SOAP</h2>

        <form method="POST" action="{{ route('calcular') }}">
            @csrf

            <div class="mb-3">
                <label for="num1" class="form-label">Número 1</label>
                <input type="number" name="num1" required placeholder="Ingrese un número" value="{{ old('num1', $num1 ?? '') }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="num2" class="form-label">Número 2</label>
                <input type="number" name="num2" required placeholder="Ingrese un número" value="{{ old('num2', $num2 ?? '') }}" class="form-control">
            </div>

            <div class="mb-3 text-center">
                <label class="form-label d-block">Operación</label>
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" name="operacion" id="sumar" value="sumar" autocomplete="off" {{ old('operacion', $operacion ?? '') == 'sumar' ? 'checked' : '' }} required>
                    <label class="btn btn-outline-primary" for="sumar">+</label>

                    <input type="radio" class="btn-check" name="operacion" id="multiplicar" value="multiplicar" autocomplete="off" {{ old('operacion', $operacion ?? '') == 'multiplicar' ? 'checked' : '' }} required>
                    <label class="btn btn-outline-primary" for="multiplicar">×</label>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Calcular</button>
            </div>
        </form>

        @if(isset($resultado))
            <div class="alert alert-success mt-4 text-center">
                <h5 class="mb-2">Resultado</h5>
                <p class="mb-0">{{ $num1 }} {{ $operacion == 'sumar' ? '+' : '×' }} {{ $num2 }} = <strong>{{ $resultado }}</strong></p>
            </div>
        @endif
    </div>
</body>
-->
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Calculadora SOAP</h2>

        <form method="POST" action="{{ route('calcular') }}" id="calcForm">
            @csrf

            <!-- Campos ocultos para enviar los valores al servidor -->
            <input type="hidden" name="num1" id="num1" value="{{ old('num1', $num1 ?? '') }}">
            <input type="hidden" name="num2" id="num2" value="{{ old('num2', $num2 ?? '') }}">
            <input type="hidden" name="operacion" id="operacion" value="{{ old('operacion', $operacion ?? '') }}">

            <!-- Pantalla de la calculadora -->
            <div class="mb-3 text-end fs-4 border rounded p-2 bg-white" id="display">
            <!--div class="form-control mb-3 text-end fs-4" id="display"-->
                {{ $num1 ?? '' }} 
                {{ isset($operacion) ? ($operacion == 'sumar' ? '+' : '×') : '' }} 
                {{ $num2 ?? '' }}
                @if(isset($resultado))
                    = <strong>{{ $resultado }}</strong>
                @endif
            </div>

            <!-- Botones numéricos -->
            <div class="d-grid gap-2">
                <div class="d-flex justify-content-between">
                    @for ($i = 1; $i <= 9; $i++)
                        @if ($i % 3 == 1)
                            </div><div class="d-flex justify-content-between mt-2">
                        @endif
                        <button type="button" class="btn btn-secondary w-25" onclick="appendNumber({{ $i }})">{{ $i }}</button>
                    @endfor
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <button type="button" class="btn btn-secondary w-100" onclick="appendNumber(0)">0</button>
                </div>

                <!-- Boton de suma y de multiplicacion-->
                <div class="d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-outline-primary w-50 me-1" onclick="setOperation('+')">+</button>
                    <button type="button" class="btn btn-outline-primary w-50 ms-1" onclick="setOperation('*')">×</button>
                </div>

                <!-- Boton para limpiar los datos y boton para calcular la operación-->
                <div class="d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-danger w-50 me-1" onclick="clearAll()">Limpiar</button>
                    <button type="submit" class="btn btn-success w-50 ms-1" id="btnCalcular">Calcular</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        let currentInput = '';
        let num1Set = false; // Si está en el primer número (num1) o el segundo (num2)

        // Función para actualizar la pantalla
        function updateDisplay() {
            let num1 = document.getElementById('num1').value;
            let num2 = document.getElementById('num2').value;
            let op = document.getElementById('operacion').value;

            let opSymbol = op === 'sumar' ? '+' : (op === 'multiplicar' ? '×' : '');
            let displayText = `${num1} ${opSymbol} ${num2}`;
            document.getElementById('display').textContent = displayText.trim();
        }

        // Función para agregar número
        function appendNumber(num) {
            currentInput += num;

            // Aqui se determina si debe agregar al primer número (num1) o al segundo (num2)
            if (!num1Set) {
                document.getElementById('num1').value = currentInput;
            } else {
                document.getElementById('num2').value = currentInput;
            }

            updateDisplay();
        }

        // Función para establecer operación (+ o ×)
        function setOperation(op) {
            if (!currentInput) return; // No establecer operación sin número

            document.getElementById('operacion').value = op === '+' ? 'sumar' : 'multiplicar';
            num1Set = true; // Ya se ingresó el primer número y se pasa al segundo
            currentInput = ''; // Reset de la entrada para el siguiente número
            updateDisplay();
        }

        // Función para limpiar la calculadora
        function clearAll() {
            currentInput = '';
            num1Set = false;
            document.getElementById('num1').value = '';
            document.getElementById('num2').value = '';
            document.getElementById('operacion').value = '';
            document.getElementById('display').textContent = '';
        }

        document.getElementById('btnCalcular').addEventListener('click', function () {
        if (
            document.getElementById('num1').value &&
            document.getElementById('num2').value &&
            document.getElementById('operacion').value
        ) {
            document.getElementById('calcForm').submit();
        } else {
            alert("Por favor, ingresa ambos números y selecciona una operación.");
        }
    }); 
    </script>
</body>

</html>
