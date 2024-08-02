<?php

namespace FacturaScripts\Plugins\Nomencladores\Model;

use FacturaScripts\Core\Model\Base\ModelClass;
use FacturaScripts\Core\Model\Base\ModelTrait;
use FacturaScripts\Core\Tools;
class Vehiculo extends ModelClass
{
    use ModelTrait;

    /** @var string */
    public $comentarios;

    /** @var string */
    public $fecha_matriculacion;

    /** @var int */
    public $id;

    /** @var string */
    public $matricula;

    /** @var string */
    public $num_chasis;

    public function clear() 
    {
        parent::clear();
        $this->fecha_matriculacion = date(self::DATE_STYLE);
    }

    public static function primaryColumn(): string
    {
        return "id";
    }

    public static function tableName(): string
    {
        return "vehiculos";
    }

    public function test(): bool
    {
        $this->comentarios = Tools::noHtml($this->comentarios);
        $this->matricula = Tools::noHtml($this->matricula);
        $this->num_chasis = Tools::noHtml($this->num_chasis);
        return parent::test();
    }}
