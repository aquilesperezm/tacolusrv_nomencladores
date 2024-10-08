<?php

namespace FacturaScripts\Plugins\Nomencladores\Controller;

use FacturaScripts\Core\Lib\ExtendedController\ListController;

/**
 * Este es un controlador específico para listados. Permite una o varias pestañas.
 * Cada una con un listado de los registros de un modelo.
 * Además, hace uso de archivos de XMLView para definir qué columnas mostrar y cómo.
 *
 * https://facturascripts.com/publicaciones/listcontroller-232
 */
class ListVehiculo extends ListController
{
    public function getPageData(): array
    {
        $pageData = parent::getPageData();
        $pageData["title"] = "Vehículos";
        $pageData["menu"] = "Nomencladores";
        $pageData["submenu"] = "3. Vehículos";
        $pageData["icon"] = "fas fa-car";
        return $pageData;
    }

    protected function createViews(): void
    {
        $this->createViewsVehiculo();
    }

    protected function createViewsVehiculo(string $viewName = "ListVehiculo"): void
    {
        $this->addView($viewName, "Vehiculo", "Vehículos");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
         $this->addOrderBy($viewName, ["matricula"], "matricula", 2);
         $this->addOrderBy($viewName, ["num_chasis"], "No. de Chasis");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
         $this->addSearchFields($viewName, ["matricula", "num_chasis"]);
    }
}
