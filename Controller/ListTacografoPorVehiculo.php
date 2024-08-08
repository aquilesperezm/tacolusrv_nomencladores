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
class ListTacografoPorVehiculo extends ListController
{
    public function getPageData(): array
    {
        $pageData = parent::getPageData();
        $pageData["title"] = "5. Vehículos con Tacógrafo";
        $pageData["menu"] = "Nomencladores";
        $pageData["submenu"] = "Vehículos";
        $pageData["icon"] = "fas fa-truck";
        return $pageData;
    }

    protected function createViews(): void
    {
        $this->createViewsTacografoPorVehiculo();
    }

    protected function createViewsTacografoPorVehiculo(string $viewName = "ListTacografoPorVehiculo"): void
    {
        $this->addView($viewName, "TacografoPorVehiculo", "Vehículos con Tacógrafo","fas fa-truck");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addOrderBy($viewName, ["id"], "id", 2);
        // $this->addOrderBy($viewName, ["name"], "name");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addSearchFields($viewName, ["id", "name"]);
    }
}
