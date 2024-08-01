<?php

namespace FacturaScripts\Plugins\Nomencladores\Model;

use FacturaScripts\Core\Model\Base\ModelClass;
use FacturaScripts\Core\Model\Base\ModelTrait;
use FacturaScripts\Core\Tools;
class ModeloVehiculo extends ModelClass
{
    use ModelTrait;

    /** @var int */
    public $id;

    /** @var int */
    public $id_marca;

    /** @var string */
    public $nombre_modelo;

    public function clear() 
    {
        parent::clear();
        $this->id_marca = 0;
    }

    public static function primaryColumn(): string
    {
        return "id";
    }

    public static function tableName(): string
    {
        return "modelosvehiculos";
    }

    public function test(): bool
    {
        $this->nombre_modelo = Tools::noHtml($this->nombre_modelo);
        return parent::test();
    }}
