<?php

namespace Database\Seeders;

use App\Models\TblPrograma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TblPrograma::create([
            'prog_Denominacion' => 'ANÁLISIS Y DESARROLLO DE SOFTWARE',
            'prog_codigoPrograma' => 228118,
            'prog_Version' => 1,
            'prog_Estado' => 'Activo',
            'prog_NivelFormacion' => 'Tecnólogo',
            'prog_HorasEstimadas' => 3984,
            'prog_Creditos' => 83,
            'prog_DuracionMeses' => 24,
            'prog_etapaLectiva' => 3120,
            'prog_etapaProductiva' => 864,
            'prog_totalHoras' => 3984,
            'prog_justificacion' => 'Los flujos de nuevas tecnologías llegan al país a un ritmo sin precedentes, haciendo que la demanda interna y las expectativas por nuevos productos y servicios se transformen 
                                    con similar rapidez. De esta forma, la prospectiva de la industria TIC de los países menos desarrollados debe partir de la ubicación de la oferta nacional en el eje definido por las 
                                    tensiones entre el mercado global y el mercado local, que operan como dos polos frente al tema. Esto significa identificar los focos tecnológicos prioritarios tanto a escala 
                                    nacional como internacional, a partir de las fortalezas y
                                    ',
            'prog_metodologia' => ' -Metodologías de desarrollo de software: concepto, clasificación, roles, ejemplos.
                                    - Metodologías tradicionales: Proceso Unificado Racional (RUP)
                                    - Metodologías ágiles: SCRUM, Programación Extrema (XP), Desarrollo Rápido de Aplicaciones (RAD).
                                    ',
            'prog_Descripcion' => 'El programa de formación tecnológica en Análisis y Desarrollo de Software, está enfocado en el desarrollo de habilidades alrededor de las actividades inherentes al proceso de 
                                    creación de aplicaciones informáticas, de acuerdo con los requerimientos funcionales y técnicos para una solución de 
                                    negocio, estableciendo métodos de trabajo individual y en equipo, potenciando los valores éticos, profesionales y 
                                    personales, en beneficio de la sociedad y de la competitividad del país. Por tratarse de un programa del sector de las Tecnologías de 
                                    la Información y las Comunicaciones, presenta una alta pertinencia y demanda en el sector empresarial del país, toda 
                                    vez que se concibe el software y los servicios de TI como uno de los sectores de talla mundial.
                                ',
        ]);
        TblPrograma::create([
            'prog_Denominacion' => 'SERVICIO DE RECEPCION HOTELERA',
            'prog_codigoPrograma' => 633400,
            'prog_Version' => 1,
            'prog_Estado' => 'Activo',
            'prog_NivelFormacion' => 'Técnico',
            'prog_HorasEstimadas' => 2208,
            'prog_Creditos' => 41,
            'prog_DuracionMeses' => 12,
            'prog_etapaLectiva' => 1344,
            'prog_etapaProductiva' => 864,
            'prog_totalHoras' => 2208,
            'prog_justificacion' => '
                                    La industria hotelera colombiana ocupa el segundo lugar en aporte de divisas al país, se ha desarrollado
                                    satisfactoriamente en las últimas décadas siendo responsable de la generación de inversiones por US$14.055
                                    millones, de acuerdo con datos registrados por el segmento de Comercio, Restaurantes y Hoteles en la
                                    Balanza de Pagos del Banco de la República. También es de resaltar que entre 2010 y 2017 se abrieron más
                                    de 200 hoteles en el país, de los cuales 123 pertenecen a cadenas hoteleras internacionales.
                                    En éste sentido el programa ofrece al sector, un perfil de desempeño para la atención de la recepción hotelera
                                    basado en habilidades de gestión del servicio a clientes, manejo de la operación de la recepción desde las
                                    técnicas y procedimientos establecidos.
                                    ',
            'prog_metodologia' => '
                                    Centrada en la construcción de autonomía para garantizar la calidad de la formación en el marco de la
                                    formación por competencias, el aprendizaje por proyectos y el uso de técnicas didácticas activas que
                                    estimulan el pensamiento para la resolución de problemas simulados y reales; soportadas en el utilización de
                                    las tecnologías de la información y la comunicación, integradas, en ambientes abiertos y pluritecnológicos,
                                    que en todo caso recrean el contexto productivo y vinculan al aprendiz con la realidad cotidiana y el desarrollo
                                    de las competencias.
                                    ',
            'prog_Descripcion' => '
                                    EL EGRESADO DE ESTE PROGRAMA TENDRA LA CAPACIDAD DE PRESTAR EL SERVICIO DE RESERVAS,
                                    RECEPCION Y MANEJO DE VALORES EN CAJA; EN IDIOMAS ESPAÑOL E INGLES, DE MANERA OPORTUNA,
                                    MANTENIENDO BUENAS RELACIONES INTERPERSONALES, TRABAJO EN EQUIPO Y RESOLUCION DE
                                    CONFLICTOS , CONTRIBUYENDO AL CUMPLIMIENTO DE LOS ESTANDARES DE CALIDAD SEGUN LAS POLITICAS
                                    DEL ESTABLECIMIENTO.
                                    ',
        ]);
        // TblPrograma::create([
        //     'prog_Denominacion' => 'programa3',
        //     'prog_codigoPrograma' => 470003,
        //     'prog_Version' => 1,
        //     'prog_Estado' => 'Activo',
        //     'prog_NivelFormacion' => 'Tecnólogo',
        //     'prog_HorasEstimadas' => 3984,
        //     'prog_Creditos' => 38,
        //     'prog_DuracionMeses' => 24,
        //     'prog_etapaLectiva' => 44,
        //     'prog_etapaProductiva' => 44,
        //     'prog_totalHoras' => 3984,
        //     'prog_justificacion' => 'zzzzzzzzz',
        //     'prog_metodologia' => 'zzzzzzzzz',
        //     'prog_Descripcion' => 'zzzzzzzzzz',
        // ]);
        // TblPrograma::create([
        //     'prog_Denominacion' => 'programa4',
        //     'prog_codigoPrograma' => 470004,
        //     'prog_Version' => 1,
        //     'prog_Estado' => 'Activo',
        //     'prog_NivelFormacion' => 'Tecnólogo',
        //     'prog_HorasEstimadas' => 3984,
        //     'prog_Creditos' => 38,
        //     'prog_DuracionMeses' => 24,
        //     'prog_etapaLectiva' => 44,
        //     'prog_etapaProductiva' => 44,
        //     'prog_totalHoras' => 3984,
        //     'prog_justificacion' => 'zzzzzzzzz',
        //     'prog_metodologia' => 'zzzzzzzzz',
        //     'prog_Descripcion' => 'zzzzzzzzzz',
        // ]);
    }
}