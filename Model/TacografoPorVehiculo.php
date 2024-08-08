<?php

namespace FacturaScripts\Plugins\Nomencladores\Model;

use FacturaScripts\Core\Model\Base\ModelClass;
use FacturaScripts\Core\Model\Base\ModelTrait;
use FacturaScripts\Core\Tools;
class TacografoPorVehiculo extends ModelClass
{
    use ModelTrait;

    /** @var int */
    public $id;

    /** @var int */
    public $id_tacografo;

    /** @var int */
    public $id_vehiculo;

    public function clear() 
    {
        parent::clear();
        $this->id_tacografo = 0;
        $this->id_vehiculo = 0;
    }

    public static function primaryColumn(): string
    {
        return "id";
    }

    public static function tableName(): string
    {
        return "tacografosporvehiculo";
    }

    public function test(): bool
    {
        return parent::test();
    }}
