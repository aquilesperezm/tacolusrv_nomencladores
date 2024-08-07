<?php

namespace FacturaScripts\Plugins\Nomencladores\Controller;

use mysqli;
//Carga Inicial
use FacturaScripts\Core\DbQuery;
use FacturaScripts\Plugins\Nomencladores\Model\CentroAutorizado;
use FacturaScripts\Plugins\Nomencladores\Model\TipoIntervencion;
use FacturaScripts\Plugins\Nomencladores\Model\CategoriaTacografo;
use FacturaScripts\Plugins\Nomencladores\Model\ModeloTacografo;
use FacturaScripts\Plugins\Nomencladores\Model\Tacografo;
use FacturaScripts\Plugins\Nomencladores\Model\MarcaVehiculo;
use FacturaScripts\Plugins\Nomencladores\Model\ModeloVehiculo;
use FacturaScripts\Plugins\Nomencladores\Model\Vehiculo;

//Plugin OrdenesDeTrabajo
use FacturaScripts\Plugins\OrdenDeTrabajo\Model\OrdenDeTrabajo;
use FacturaScripts\Plugins\OrdenDeTrabajo\Model\IntervencionXOrdenDeTrabajo;



use FacturaScripts\Core\Base\Controller;

/**
 * Un controlador es básicamente una página o una opción del menú de FacturaScripts.
 *
 * https://facturascripts.com/publicaciones/los-controladores-410
 */
class RestaurarDatos extends Controller
{


    private function DeleteAndResetTable($table_name)
    {

        $servername = "localhost";
        $db_name = "facturascripts_dev";
        $username = "root";
        $password = "root";

        $query_delete_all = "DELETE FROM $table_name";
        $query_reset_counters = "ALTER TABLE $table_name AUTO_INCREMENT = 1";

        //Carga Inicial de Datos
        $connection = new mysqli($servername, $username, $password, $db_name);

        mysqli_multi_query($connection, $query_delete_all);
        mysqli_multi_query($connection, $query_reset_counters);

        //close the connection
        mysqli_close($connection);
    }

    private function RestoreData($resp = false)
    {

        if ($resp) {


            $this->DeleteAndResetTable('ordenes_de_trabajo');

            $this->DeleteAndResetTable('vehiculos');
            $this->DeleteAndResetTable('modelosvehiculos');
            $this->DeleteAndResetTable('marcasvehiculos');

            $this->DeleteAndResetTable('tacografos');
            $this->DeleteAndResetTable('modelostacografos');
            $this->DeleteAndResetTable('categoriastacografos');


            $this->DeleteAndResetTable('tiposintervenciones');

            $this->DeleteAndResetTable('centrosautorizados');



            // centros autorizados
            $centro_autorizado = new CentroAutorizado(['codigo_centroautorizado' => 'HAS-123', 'nombre_centroautorizado' => 'EMPRESA TACOGRAFIA 2024']);
            $centro_autorizado->save();

            $centro_autorizado = new CentroAutorizado(['codigo_centroautorizado' => 'KLI-541', 'nombre_centroautorizado' => 'EMPRESA EUROPEA 5112']);
            $centro_autorizado->save();

            $centro_autorizado = new CentroAutorizado(['codigo_centroautorizado' => 'RFF-729', 'nombre_centroautorizado' => 'EMPRESA TACOGRAFOS LIBRES']);
            $centro_autorizado->save();

            $centro_autorizado = new CentroAutorizado(['codigo_centroautorizado' => 'RFF-661', 'nombre_centroautorizado' => 'EMPRESA PRIVADA TACORGRAFOS']);
            $centro_autorizado->save();

            $centro_autorizado = new CentroAutorizado(['codigo_centroautorizado' => 'YYQ-911', 'nombre_centroautorizado' => 'TACOGRAFOS SA 2024']);
            $centro_autorizado->save();

            //tipos de intervenciones
            $ti = new TipoIntervencion(['nombre' => 'Instalación de la Unidad Intravehicular']);
            $ti->save();
            $ti = new TipoIntervencion(['nombre' => 'Calibrado de un Tacógrafo']);
            $ti->save();
            $ti = new TipoIntervencion(['nombre' => 'Instalación de un sensor de movimiento']);
            $ti->save();
            $ti = new TipoIntervencion(['nombre' => 'Instalación de un dispositivo GNSS']);
            $ti->save();
            $ti = new TipoIntervencion(['nombre' => 'Sustitución de un sensor de movimiento']);
            $ti->save();
            $ti = new TipoIntervencion(['nombre' => 'Sustitución módulo GNSS']);
            $ti->save();
            $ti = new TipoIntervencion(['nombre' => 'Transferencia de Datos / Sustitución de un Tacógrafo']);
            $ti->save();
            $ti = new TipoIntervencion(['nombre' => 'Activación de un Tacógrafo']);
            $ti->save();
            $ti = new TipoIntervencion(['nombre' => 'Instalación de un dispositivo DSRC']);
            $ti->save();
            $ti = new TipoIntervencion(['nombre' => 'Reparación de la Instalación de un Tacógrafo']);
            $ti->save();
            $ti = new TipoIntervencion(['nombre' => 'Sustitución módulo DSRC']);
            $ti->save();
            $ti = new TipoIntervencion(['nombre' => 'Sustitución de la Unidad Intravehicular']);
            $ti->save();
            $ti = new TipoIntervencion(['nombre' => 'Verificación como Consecuencia de un Control de Carretera']);
            $ti->save();

            //categoria de los tacografos
            $ct = new CategoriaTacografo(['nombre_categoriatacografo' => 'TACOGRAFO DIGITAL (DESDE: 01-05-2016)']);
            $ct->save();
            $ct = new CategoriaTacografo(['nombre_categoriatacografo' => 'TACOGRAFO INTELIGENTE PRIMERA GENERACION (DESDE: 15-06-2019)']);
            $ct->save();
            $ct = new CategoriaTacografo(['nombre_categoriatacografo' => 'TACOGRAFO INTELIGENTE SEGUNDA GENERACION (DESDE: 21-08-2023)']);
            $ct->save();

            //modelos de los tacografos
            $mt = new ModeloTacografo(['modelo_tacografo' => 'HTHA-12', 'id_tipotacografo' => '1']);
            $mt->save();
            $mt = new ModeloTacografo(['modelo_tacografo' => 'KJLII-762', 'id_tipotacografo' => '2']);
            $mt->save();
            $mt = new ModeloTacografo(['modelo_tacografo' => 'POL1J1-90', 'id_tipotacografo' => '3']);
            $mt->save();
            $mt = new ModeloTacografo(['modelo_tacografo' => 'TTQNZ-87', 'id_tipotacografo' => '3']);
            $mt->save();
            $mt = new ModeloTacografo(['modelo_tacografo' => 'LLMN1-YT', 'id_tipotacografo' => '2']);
            $mt->save();

            //tacografos
            /* 100
               125
               140
               180
             * 
             */
            $t = new Tacografo([
                'numero_serie' => 'JDFN-JMASD-1212-MK182-NSNA1',
                'id_modelo' => 2,
                'id_categoria' => 2,
                'fecha_fabricacion' => '2024-05-01',
                'escala_velocidad' => 100,
                'homologacion' => 'Texto Ejemplo 1'
            ]);
            $t->save();
            $t = new Tacografo([
                'numero_serie' => 'TX9XD-98N7V-6WMQ6-BX7FG-H8Q99',
                'id_modelo' => 3,
                'id_categoria' => 3,
                'fecha_fabricacion' => '2024-01-15',
                'escala_velocidad' => 125,
                'homologacion' => 'Texto Ejemplo 2'
            ]);
            $t->save();
            $t = new Tacografo([
                'numero_serie' => '7HNRX-D7KGG-3K4RQ-4WPJ4-YTDFH',
                'id_modelo' => 5,
                'id_categoria' => 1,
                'fecha_fabricacion' => '2024-08-13',
                'escala_velocidad' => 140,
                'homologacion' => 'Texto Ejemplo 3'
            ]);
            $t->save();
            $t = new Tacografo([
                'numero_serie' => 'VK7JG-NPHTM-C97JM-9MPGT-3V66T',
                'id_modelo' => 1,
                'id_categoria' => 2,
                'fecha_fabricacion' => '2024-03-24',
                'escala_velocidad' => 180,
                'homologacion' => 'Texto Ejemplo 4'
            ]);
            $t->save();
            $t = new Tacografo([
                'numero_serie' => 'NPPR9-FWDCX-D2C8J-H872K-2YT43',
                'id_modelo' => 4,
                'id_categoria' => 2,
                'fecha_fabricacion' => '2024-05-17',
                'escala_velocidad' => 125,
                'homologacion' => 'Texto Ejemplo 4'
            ]);
            $t->save();

            //marcas de los vehiculos
            $ma = new MarcaVehiculo(['nombre_marca' => 'FORD']);
            $ma->save();
            $ma = new MarcaVehiculo(['nombre_marca' => 'GEELY']);
            $ma->save();
            $ma = new MarcaVehiculo(['nombre_marca' => 'TOYOTA']);
            $ma->save();


            //modelos de los vehiculos
            $mo = new ModeloVehiculo(['id_marca' => 1, 'nombre_modelo' => 'SUV']);
            $mo->save();
            $mo = new ModeloVehiculo(['id_marca' => 1, 'nombre_modelo' => 'TRANSIT']);
            $mo->save();
            $mo = new ModeloVehiculo(['id_marca' => 1, 'nombre_modelo' => 'BRONCO']);
            $mo->save();
            $mo = new ModeloVehiculo(['id_marca' => 1, 'nombre_modelo' => 'TERRITORY']);
            $mo->save();
            $mo = new ModeloVehiculo(['id_marca' => 1, 'nombre_modelo' => 'ESCAPE']);
            $mo->save();

            $mo = new ModeloVehiculo(['id_marca' => 2, 'nombre_modelo' => 'GX3']);
            $mo->save();
            $mo = new ModeloVehiculo(['id_marca' => 2, 'nombre_modelo' => 'COOLRAY']);
            $mo->save();
            $mo = new ModeloVehiculo(['id_marca' => 2, 'nombre_modelo' => 'AZKARRA']);
            $mo->save();
            $mo = new ModeloVehiculo(['id_marca' => 2, 'nombre_modelo' => 'OKAVANGO']);
            $mo->save();
            $mo = new ModeloVehiculo(['id_marca' => 2, 'nombre_modelo' => 'TUGELLA']);
            $mo->save();

            $mo = new ModeloVehiculo(['id_marca' => 3, 'nombre_modelo' => 'AYGO']);
            $mo->save();
            $mo = new ModeloVehiculo(['id_marca' => 3, 'nombre_modelo' => 'COROLLA']);
            $mo->save();
            $mo = new ModeloVehiculo(['id_marca' => 3, 'nombre_modelo' => 'YARIS']);
            $mo->save();
            $mo = new ModeloVehiculo(['id_marca' => 3, 'nombre_modelo' => 'HILUX']);
            $mo->save();
            $mo = new ModeloVehiculo(['id_marca' => 3, 'nombre_modelo' => 'CAMRY']);
            $mo->save();

            //vehiculos
            $v = new Vehiculo([
                'matricula' => 'HBAS-6811',
                'num_chasis' => '8347-282372-122',
                'id_centroautorizado' => 1,
                'id_cliente' => '1',
                'id_marca' => 1,
                'id_modelo' => 1,
                'id_categoria' => 1,
                'fecha_matriculacion' => '2024-02-20',
                'comentarios' => 'VEHICULO #1'
            ]);
            $v->save();
            $v = new Vehiculo([
                'matricula' => 'MHJAY-5461',
                'num_chasis' => '7234-8978-16234',
                'id_centroautorizado' => 2,
                'id_cliente' => '2',
                'id_marca' => 2,
                'id_modelo' => 3,
                'id_categoria' => 2,
                'fecha_matriculacion' => '2024-03-10',
                'comentarios' => 'VEHICULO #2'
            ]);
            $v->save();
            $v = new Vehiculo([
                'matricula' => 'NVMJA-6561',
                'num_chasis' => '97939-83471-19591-1',
                'id_centroautorizado' => 2,
                'id_cliente' => '3',
                'id_marca' => 1,
                'id_modelo' => 4,
                'id_categoria' => 2,
                'fecha_matriculacion' => '2024-02-20',
                'comentarios' => 'VEHICULO #3'
            ]);
            $v->save();
            $v = new Vehiculo([
                'matricula' => 'KNMK-6651',
                'num_chasis' => '34985-12398-12395-1',
                'id_centroautorizado' => 3,
                'id_cliente' => '3',
                'id_marca' => 3,
                'id_modelo' => 4,
                'id_categoria' => 1,
                'fecha_matriculacion' => '2024-04-11',
                'comentarios' => 'VEHICULO #4'
            ]);
            $v->save();
            $v = new Vehiculo([
                'matricula' => 'YYQIE-6671',
                'num_chasis' => '8883-8389-1110-3123',
                'id_centroautorizado' => 3,
                'id_cliente' => '3',
                'id_marca' => 3,
                'id_modelo' => 2,
                'id_categoria' => 2,
                'fecha_matriculacion' => '2024-06-08',
                'comentarios' => 'VEHICULO #4'
            ]);
            $v->save();
            $v = new Vehiculo([
                'matricula' => 'RREQS-4913',
                'num_chasis' => '996-9032-2395-2',
                'id_centroautorizado' => 4,
                'id_cliente' => '2',
                'id_marca' => 2,
                'id_modelo' => 5,
                'id_categoria' => 1,
                'fecha_matriculacion' => '2024-12-10',
                'comentarios' => 'VEHICULO #5'
            ]);
            $v->save();

            //ordenes de trabajo
            $orden1 = new OrdenDeTrabajo([
                'numero_orden' => '852901-831',
                'id_centroautorizado' => 1,
                'codcliente' => 2,
                'id_vehiculo' => 2,
                'id_tacografo' => 1,
                'fecha_orden' => '2024-01-07'
            ]);
            $orden1->save();
            $orden1 = new OrdenDeTrabajo([
                'numero_orden' => '87631-8721',
                'id_centroautorizado' => 2,
                'codcliente' => 3,
                'id_vehiculo' => 1,
                'id_tacografo' => 3,
                'fecha_orden' => '2024-11-17'
            ]);
            $orden1->save();
            $orden1 = new OrdenDeTrabajo([
                'numero_orden' => '6943-23812',
                'id_centroautorizado' => 3,
                'codcliente' => 1,
                'id_vehiculo' => 3,
                'id_tacografo' => 3,
                'fecha_orden' => '2024-05-12'
            ]);
            $orden1->save();
            $orden1 = new OrdenDeTrabajo([
                'numero_orden' => '9796-8318-11',
                'id_centroautorizado' => 2,
                'codcliente' => 1,
                'id_vehiculo' => 4,
                'id_tacografo' => 4,
                'fecha_orden' => '2024-09-27'
            ]);
            $orden1->save();
            $orden1 = new OrdenDeTrabajo([
                'numero_orden' => '9894-93711-555',
                'id_centroautorizado' => 3,
                'codcliente' => 1,
                'id_vehiculo' => 5,
                'id_tacografo' => 3,
                'fecha_orden' => '2024-04-15'
            ]);
            $orden1->save();
            $orden1 = new OrdenDeTrabajo([
                'numero_orden' => '773-1938-1829',
                'id_centroautorizado' => 1,
                'codcliente' => 2,
                'id_vehiculo' => 1,
                'id_tacografo' => 4,
                'fecha_orden' => '2024-10-01'
            ]);
            $orden1->save();
            $orden1 = new OrdenDeTrabajo([
                'numero_orden' => '88102-7721-2912',
                'id_centroautorizado' => 3,
                'codcliente' => 3,
                'id_vehiculo' => 4,
                'id_tacografo' => 1,
                'fecha_orden' => '2024-03-25'
            ]);
            $orden1->save();
            $orden1 = new OrdenDeTrabajo([
                'numero_orden' => '878-388-192-1',
                'id_centroautorizado' => 1,
                'codcliente' => 1,
                'id_vehiculo' => 4,
                'id_tacografo' => 4,
                'fecha_orden' => '2024-12-01'
            ]);
            $orden1->save();
            $orden1 = new OrdenDeTrabajo([
                'numero_orden' => '4539-2713-2882',
                'id_centroautorizado' => 3,
                'codcliente' => 2,
                'id_vehiculo' => 3,
                'id_tacografo' => 1,
                'fecha_orden' => '2024-03-01'
            ]);
            $orden1->save();
            $orden1 = new OrdenDeTrabajo([
                'numero_orden' => '8783-87213-8237',
                'id_centroautorizado' => 2,
                'codcliente' => 1,
                'id_vehiculo' => 1,
                'id_tacografo' => 5,
                'fecha_orden' => '2024-03-11'
            ]);
            $orden1->save();
            $orden1 = new OrdenDeTrabajo([
                'numero_orden' => '875-938-192-921',
                'id_centroautorizado' => 3,
                'codcliente' => 3,
                'id_vehiculo' => 3,
                'id_tacografo' => 1,
                'fecha_orden' => '2024-10-25'
            ]);
            $orden1->save();

            for ($i = 0; $i < 60; $i++) {
                //relacion orden de trabajo con los tipos de intervención
                $r1 = new IntervencionXOrdenDeTrabajo([
                    'id_ordendetrabajo' => rand(1, 11),
                    'id_tipodeintervencion' => rand(1, 13)
                ]);
                $r1->save();
            }
        }
    }


    public function getPageData(): array
    {
        $pageData = parent::getPageData();
        $pageData["menu"] = "admin";
        $pageData["title"] = "RestaurarDatos";
        $pageData["icon"] = "fas fa-file";
        return $pageData;
    }

    /**
     * Ejecuta la lógica privada del controlador.
     */
    public function privateCore(&$response, $user, $permissions): void
    {
        parent::privateCore($response, $user, $permissions);

        $this->RestoreData(true);
        $this->redirect('Dashboard');
        //echo "Restaurar Datos Privados";
        // tu código aquí
    }

    /**
     * Ejecuta la lógica pública del controlador.
     */
    public function publicCore(&$response): void
    {
        parent::publicCore($response);

        // tu código aquí
    }
}
