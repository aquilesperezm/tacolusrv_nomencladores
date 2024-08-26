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
class ListModeloTacografo extends ListController
{
    public function getPageData(): array
    {
        $pageData = parent::getPageData();
        $pageData["title"] = "Modelos de Tacógrafos";
        $pageData["menu"] = "Nomencladores";
        $pageData["submenu"] = "4. Tacógrafos";
        $pageData["icon"] = "fas fa-chalkboard-teacher";
        $pageData["ordernum"] = 200;
        return $pageData;
    }

    protected function createViews(): void
    {
        $this->createViewsModeloTacografo();
    }

    protected function createViewsModeloTacografo(string $viewName = "ListModeloTacografo"): void
    {
        $this->addView($viewName, "ModeloTacografo", "Modelos de Tacógrafos","fas fa-chalkboard-teacher");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
         $this->addOrderBy($viewName, ["modelo_tacografo"], "Modelo del Tacógrafo");
         $this->addSearchFields($viewName, ["modelo_tacografo"]);
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addSearchFields($viewName, ["id", "name"]);
    }
}
