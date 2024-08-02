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
class ListTipoTacografo extends ListController
{
    public function getPageData(): array
    {
        $pageData = parent::getPageData();
        $pageData["title"] = "Tipos de Tacógrafos";
        $pageData["menu"] = "Nomencladores";
        $pageData["submenu"] = "Tacógrafos";
        $pageData["icon"] = "fas fa-bezier-curve";
        $pageData["ordernum"] = 1;
        return $pageData;
    }

    protected function createViews(): void
    {
        $this->createViewsTipoTacografo();
    }

    protected function createViewsTipoTacografo(string $viewName = "ListTipoTacografo"): void
    {
        $this->addView($viewName, "TipoTacografo", "Tipos de Tacógrafos","fas fa-bezier-curve");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addOrderBy($viewName, ["id"], "id", 2);
        // $this->addOrderBy($viewName, ["name"], "name");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addSearchFields($viewName, ["id", "name"]);
    }
}
