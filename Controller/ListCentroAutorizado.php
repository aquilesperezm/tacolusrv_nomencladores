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
class ListCentroAutorizado extends ListController
{
    public function getPageData(): array
    {
        $pageData = parent::getPageData();
        $pageData["title"] = "1. Centros Autorizados";
        $pageData["menu"] = "Nomencladores";
        $pageData["icon"] = "fas fa-user-tie";
        return $pageData;
    }

    protected function createViews(): void
    {
        $this->createViewsCentroAutorizado();
    }

    protected function createViewsCentroAutorizado(string $viewName = "ListCentroAutorizado"): void
    {
        $this->addView($viewName, "CentroAutorizado", "Centros Autorizados", "fas fa-user-tie");
        $this->addSearchFields($viewName, ['nombre_centroautorizado']);
        $this->addOrderBy($viewName, ['nombre_centroautorizado'],'Centros Autorizados');
        
        $this->addFilterAutocomplete($viewName, 'nombre_centroautorizado', 'Nombre del Centro Autorizado',
                 'nombre_centroautorizado', 'centrosautorizados', 'nombre_centroautorizado', 'nombre_centroautorizado');

        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addOrderBy($viewName, ["id"], "id", 2);
        // $this->addOrderBy($viewName, ["name"], "name");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        // $this->addSearchFields($viewName, ["id", "name"]);
    }
}
