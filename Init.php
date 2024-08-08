<?php

namespace FacturaScripts\Plugins\Nomencladores;

use FacturaScripts\Core\Plugins;
use FacturaScripts\Core\Template\InitClass;
use mysqli;

use FacturaScripts\Plugins\Nomencladores\Model\CategoriaTacografo;
use FacturaScripts\Plugins\Nomencladores\Model\CentroAutorizado;
use FacturaScripts\Plugins\Nomencladores\Model\MarcaVehiculo;
use FacturaScripts\Plugins\Nomencladores\Model\ModeloTacografo;
use FacturaScripts\Plugins\Nomencladores\Model\ModeloVehiculo;
use FacturaScripts\Plugins\Nomencladores\Model\Tacografo;
use FacturaScripts\Plugins\Nomencladores\Model\TipoIntervencion;
use FacturaScripts\Plugins\Nomencladores\Model\Vehiculo;



/**
 * Los plugins pueden contener un archivo Init.php en el que se definen procesos a ejecutar
 * cada vez que carga FacturaScripts o cuando se instala o actualiza el plugin.
 *
 * https://facturascripts.com/publicaciones/el-archivo-init-php-307
 */
class Init extends InitClass
{

    public function init(): void
    {
        // se ejecuta cada vez que carga FacturaScripts (si este plugin está activado).
        //Instanciar modelos para crear tablas
        $cat_tacografo = new CategoriaTacografo();
        $centro_autorizo = new CentroAutorizado();
        $marca_vehiculo = new MarcaVehiculo();
        $modelo_tacografo = new ModeloTacografo();
        $modelo_vehiculo = new ModeloVehiculo();
        $tacografo = new Tacografo();
        $tipo_intervencion = new TipoIntervencion();
        $vehiculo = new Vehiculo();
        
    }

    public function uninstall(): void
    {
        // se ejecuta cada vez que se desinstale el plugin. Primero desinstala y luego ejecuta el uninstall.
    }

    public function update(): void
    {
        // se ejecuta cada vez que se instala o actualiza el plugin
        
    }
}
