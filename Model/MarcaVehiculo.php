<?php

namespace FacturaScripts\Plugins\Nomencladores\Model;

use FacturaScripts\Core\Model\Base\ModelClass;
use FacturaScripts\Core\Model\Base\ModelTrait;
use FacturaScripts\Core\Tools;
class MarcaVehiculo extends ModelClass
{
    use ModelTrait;

    /** @var int */
    public $id;

    /** @var string */
    public $nombre_marca;

    public function clear() 
    {
        parent::clear();
    }

    public static function primaryColumn(): string
    {
        return "id";
    }

    public static function tableName(): string
    {
        return "marcasvehiculos";
    }

    public function test(): bool
    {
        $this->nombre_marca = Tools::noHtml($this->nombre_marca);
        return parent::test();
    }}
