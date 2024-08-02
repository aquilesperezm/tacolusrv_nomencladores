<?php

namespace FacturaScripts\Plugins\Nomencladores\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;

/**
 * Este es un controlador específico para ediciones. Permite una o varias pestañas.
 * Cada una con un xml y modelo diferente, puede ser de tipo edición, listado, html o panel.
 * Además hace uso de archivos de XMLView para definir qué columnas mostrar y cómo.
 *
 * https://facturascripts.com/publicaciones/editcontroller-642
 */
class EditCentroAutorizado extends EditController
{
    public function getModelClassName(): string
    {
        return "CentroAutorizado";
    }

    public function getPageData(): array
    {
        $pageData = parent::getPageData();
        $pageData["title"] = "Centros Autorizados";
        $pageData["icon"] = "fas fa-user-tie";
        return $pageData;
    }
}