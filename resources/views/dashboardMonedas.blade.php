<!-- resources/views/dashboardMonedas.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Dashboard de Monedas</title>
</head>
<body>
    <h1>Dashboard de Monedas</h1>

    <div>
        <p>Valor de la divisa formateada: {{ $formattedCurrency }}</p>
    </div>

    <div>
        <p>Fecha actual formateada: {{ $formattedDate }}</p>
    </div>

    <div>
        <form method="POST" action="{{ route('setLocale') }}">
            @csrf
            <label for="locale">Seleccionar cultura:</label>
            <select name="locale" id="locale">
                @foreach(config('app.locales') as $localeCode => $localeName)
                    <option value="{{ $localeCode }}" {{ app()->getLocale() === $localeCode ? 'selected' : '' }}>{{ $localeName }}</option>
                @endforeach
            </select>
            <button type="submit">Cambiar Cultura</button>
        </form>
    </div>
</body>
</html>
