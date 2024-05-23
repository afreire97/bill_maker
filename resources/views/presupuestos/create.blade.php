<x-app-layout>


    <div class="container mt-5">
        <h2>Crear Presupuesto</h2>
        <form action="{{route('previsualizar')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="numHabitaciones">Habitaciones:</label>
                <input type="number" class="form-control" id="numHabitaciones" name="numHabitaciones" value="1" min="1">
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="isCheckin" name="isCheckin" value="1">
                <label class="form-check-label" for="isCheckin">Check-in</label>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="isPMS" name="isPMS" value="1">
                <label class="form-check-label" for="isPMS">PMS</label>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="isCerraduras" name="isCerraduras" value="1">
                <label class="form-check-label" for="isCerraduras">Cerraduras</label>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="isGestionCobros" name="isGestionCobros" value="1">
                <label class="form-check-label" for="isGestionCobros">Gestión de Cobros</label>
            </div>



            <div class="form-group">
                <label for="PRE_cliente_id">Cliente:</label>
                <select class="form-control" id="PRE_cliente_id" name="PRE_cliente_id">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->CLI_id }}">{{ $cliente->CLI_nombre }}</option>
                    @endforeach
                </select>
            </div>

            @if($distribuidor)
                <input type="hidden" id="PRE_distribuidor_id" name="PRE_distribuidor_id" value="{{ $distribuidor->DIS_id }}">
            @endif

            <button type="submit" class="btn btn-primary mt-3">Crear Presupuesto</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</x-app-layout>
