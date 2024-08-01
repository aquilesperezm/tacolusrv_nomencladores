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
class ListMarcaVehiculo extends ListController
{
    public function getPageData(): array
    {
        $pageData = parent::getPageData();
        $pageData["title"] = "Marcas de Vehiculo";
        $pageData["menu"] = "Nomencladores";
        $pageData["icon"] = "fas fa-car-side";
        return $pageData;
    }

    protected function createViews(): void
    {
        $this->createViewsMarcaVehiculo();
    }

    protected function createViewsMarcaVehiculo(string $viewName = "ListMarcaVehiculo"): void
    {
        $this->addView($viewName, "MarcaVehiculo", "Marcas de Vehiculo");
        $this->addSearchFields($viewName, ['nombre_marca']);
        $this->addOrderBy($viewName, ['nombre_marca'],'Marca del Vehiculo');
        
        $this->addFilterAutocomplete($viewName, 'nombre_marca', 'nombre_marca', 'nombre_marca', 'marcasvehiculos', 'nombre_marca', 'nombre_marca');

        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addOrderBy($viewName, ["id"], "id", 2);
        // $this->addOrderBy($viewName, ["name"], "name");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addSearchFields($viewName, ["id", "name"]);
    }
}
