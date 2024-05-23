<?php

namespace App\Http\Utils;

use App\Models\Productos;



class CalculoPresupuestos
{





    public static function calcularPresupuestoAdmin($isPms, $isGestionCobros, $isCerraduras, $isCheckin, $numHabitaciones)
    {


        $importeTotal=0;

        // Obtener las habitaciones ordenadas por algún criterio (por ejemplo, por ID)
        $habitaciones = Productos::where('PRO_tipo', 'HAB')
            ->orderBy('PRO_id') // Ordenar por ID, puedes cambiarlo según tus necesidades
            ->take($numHabitaciones)
            ->get();

        // Calcular la suma de los precios
        $importeTotal = $habitaciones->sum('PRO_cifra');

        // Obtener los importes adicionales según el nombre de producto
        if ($isPms) {

            $pmsImporte = Productos::where('PRO_nombre', 'PMS')->value('PRO_cifra');
            $importeTotal +=   $importeTotal * ($pmsImporte / 100);

        }

        if ($isGestionCobros) {
            $gestionCobrosImporte = Productos::where('PRO_nombre', 'Gestion cobros')->value('PRO_cifra');
            $importeTotal += $importeTotal *($gestionCobrosImporte / 100);
        }

        if ($isCerraduras) {
            $cerradurasImporte = Productos::where('PRO_nombre', 'Cerraduras')->value('PRO_cifra');
            $importeTotal += $importeTotal *($cerradurasImporte / 100);
        }

        if ($isCheckin) {
            $checkinImporte = Productos::where('PRO_nombre', 'Checkin')->value('PRO_cifra');
            $importeTotal += $importeTotal *($checkinImporte / 100);
        }
        return round($importeTotal, 2);



    }


























}
