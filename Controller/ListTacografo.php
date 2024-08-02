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
class ListTacografo extends ListController
{
    public function getPageData(): array
    {
        $pageData = parent::getPageData();
        $pageData["title"] = "Tacógrafos";
        $pageData["menu"] = "Nomencladores";
        $pageData["submenu"] = "Tacógrafos";
        $pageData["icon"] = "fas fa-star";
        return $pageData;
    }

    protected function createViews(): void
    {
        $this->createViewsTacografo();
    }

    protected function createViewsTacografo(string $viewName = "ListTacografo"): void
    {
        $this->addView($viewName, "Tacografo", "Tacografos","fas fa-star");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addOrderBy($viewName, ["id"], "id", 2);
        // $this->addOrderBy($viewName, ["name"], "name");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addSearchFields($viewName, ["id", "name"]);
    }
}