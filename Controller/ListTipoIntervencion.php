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
class ListTipoIntervencion extends ListController
{
    public function getPageData(): array
    {
        $pageData = parent::getPageData();
        $pageData["title"] = "Tipo de Intervenciones";
        $pageData["menu"] = "Nomencladores";
        $pageData["submenu"] = "2. Intervenciones";
        $pageData["icon"] = "fas fa-business-time";
        $pageData["ordernum"] = 1;
        return $pageData;
    }

    protected function createViews(): void
    {
        $this->createViewsTipoIntervencion();
    }

    protected function createViewsTipoIntervencion(string $viewName = "ListTipoIntervencion"): void
    {
        $this->addView($viewName, "TipoIntervencion", "Tipo de Intervenciones");
        $this->addSearchFields($viewName, ['nombre']);
        $this->addOrderBy($viewName, ['nombre'],'Tipo de Intervención');
        
        $this->addFilterAutocomplete($viewName, 'nombre', 'nombre', 'nombre', 'tiposintervenciones', 'nombre', 'nombre');

        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addOrderBy($viewName, ["id"], "id", 2);
        // $this->addOrderBy($viewName, ["name"], "name");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addSearchFields($viewName, ["id", "name"]);
    }
}
