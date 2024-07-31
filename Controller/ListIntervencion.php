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
class ListIntervencion extends ListController
{
    public function getPageData(): array
    {
        $pageData = parent::getPageData();
        $pageData["menu"] = "Nomencladores";
        $pageData["title"] = "Intervenciones";
        $pageData["icon"] = "fas fa-business-time";
        return $pageData;
    }

    protected function createViews(): void
    {
        $this->createViewsIntervencion();
    }

    protected function createViewsIntervencion(string $viewName = "ListIntervencion"): void
    {
        $this->addView($viewName, "Intervencion", "Interveciones");
        $this->addSearchFields($viewName, ['nombre']);
        $this->addOrderBy($viewName, ['nombre'],'nombre');
        $this->listView($viewName)->addFilterAutocomplete('nombre', 'nombre', 'nombre', 'intervenciones');
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addOrderBy($viewName, ["id"], "id", 2);
        // $this->addOrderBy($viewName, ["name"], "name");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addSearchFields($viewName, ["id", "name"]);
    }
}
