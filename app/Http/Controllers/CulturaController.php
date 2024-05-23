<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use NumberFormatter;
use Carbon\Carbon;

class CulturaController extends Controller
{
    public function index()
    {
        // Obtenemos la configuración de la cultura del usuario
        $locale = app()->getLocale();

        // Obtenemos el código de divisa correspondiente a la cultura del usuario
        $currencyCode = config('app.currencies')[$locale] ?? 'USD';

        // Ejemplo de cantidad para la divisa
        $amount = 12345.67;

        // Realizamos la conversión de la divisa si no es la divisa base (USD)
        if ($currencyCode !== 'USD') {
            $usdAmount = $amount / config('app.currency_exchange_rates')['USD'];
            $amount = $usdAmount * config('app.currency_exchange_rates')[$currencyCode];
        }

        // Creamos un formateador de números para la moneda
        $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);

        // Formateamos la cantidad con la divisa correspondiente
        $formattedCurrency = $formatter->formatCurrency($amount, $currencyCode);

        // Obtenemos la fecha actual
        $currentDate = Carbon::now();

        // Formateamos la fecha según la cultura del usuario
        $formattedDate = $currentDate->isoFormat('LL');

        // Pasamos los valores formateados a la vista
        return view('dashboardMonedas', compact('formattedCurrency', 'formattedDate'));
    }

    public function setLocale(Request $request)
    {
        // Validamos la entrada del formulario
        $request->validate(['locale' => 'required|string|in:en,es,fr,de']);

        // Obtenemos la nueva configuración de la cultura
        $locale = $request->input('locale');

        // Establecemos la nueva configuración de la cultura en la aplicación
        App::setLocale($locale);

        // Almacenamos la nueva configuración de la cultura en la sesión del usuario
        $request->session()->put('locale', $locale);

        // Redirigimos de vuelta al dashboard de monedas
        return redirect()->route('dashboardMonedas');
    }
}
