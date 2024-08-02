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
class ListCategoriaTacografo extends ListController
{
    public function getPageData(): array
    {
        $pageData = parent::getPageData();
        $pageData["title"] = "Categoría de los Tacografos";
        $pageData["menu"] = "Nomencladores";
        $pageData["submenu"] = "Tacógrafos";
        $pageData["icon"] = "fas fa-dolly-flatbed";
        return $pageData;
    }

    protected function createViews(): void
    {
        $this->createViewsCategoriaTacografo();
    }

    protected function createViewsCategoriaTacografo(string $viewName = "ListCategoriaTacografo"): void
    {
        $this->addView($viewName, "CategoriaTacografo", "Categoría de los Tacografos", "fas fa-dolly-flatbed");
        $this->addSearchFields($viewName, ['nombre_categoriatacografo']);
        $this->addOrderBy($viewName, ['nombre_categoriatacografo'],'Categoría de los Tacografos');
        
        $this->addFilterAutocomplete($viewName, 'nombre_categoriatacografo', 'nombre_categoriatacografo',
                 'nombre_categoriatacografo', 'categoriastacografos', 'nombre_categoriatacografo', 'nombre_categoriatacografo');

        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addOrderBy($viewName, ["id"], "id", 2);
        // $this->addOrderBy($viewName, ["name"], "name");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addSearchFields($viewName, ["id", "name"]);
    }
}
