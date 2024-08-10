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
class ListModeloVehiculo extends ListController
{
    public function getPageData(): array
    {
        $pageData = parent::getPageData();
        $pageData["title"] = "Modelos de Vehículos";
        $pageData["menu"] = "Nomencladores";
        $pageData["submenu"] = "3. Vehículos";
        $pageData["icon"] = "fas fa-shipping-fast";
       
        return $pageData;
    }

    protected function createViews(): void
    {
        $this->createViewsModeloVehiculo();
    }

    protected function createViewsModeloVehiculo(string $viewName = "ListModeloVehiculo"): void
    {
        $this->addView($viewName, "ModeloVehiculo", "Modelos de Vehículos");
        
        $this->addSearchFields($viewName, ['nombre_modelo']);
        
        $this->addOrderBy($viewName, ['nombre_modelo'],'Modelo del Vehiculo');
        
        $this->addFilterAutocomplete($viewName, 'nombre_modelo', 'Modelo', 'nombre_modelo', 'modelosvehiculos', 'nombre_modelo', 'nombre_modelo');
        // Security Issue: Show id of marca
        $this->addFilterAutocomplete($viewName, 'id_marca', 'Marca', 'id_marca', 'marcasvehiculos', 'id', 'nombre_marca');
    

        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addOrderBy($viewName, ["id"], "id", 2);
        // $this->addOrderBy($viewName, ["name"], "name");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addSearchFields($viewName, ["id", "name"]);
    }
}
