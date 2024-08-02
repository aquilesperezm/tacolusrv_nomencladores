<?php

namespace FacturaScripts\Plugins\Nomencladores\Model;

use FacturaScripts\Core\Model\Base\ModelClass;
use FacturaScripts\Core\Model\Base\ModelTrait;
use FacturaScripts\Core\Tools;
class Tacografo extends ModelClass
{
    use ModelTrait;

    /** @var string */
    public $fecha_fabricacion;

    /** @var int */
    public $id;

    /** @var string */
    public $numero_serie;

    public function clear() 
    {
        parent::clear();
        $this->fecha_fabricacion = date(self::DATE_STYLE);
    }

    public static function primaryColumn(): string
    {
        return "id";
    }

    public static function tableName(): string
    {
        return "tacografos";
    }

    public function test(): bool
    {
        $this->numero_serie = Tools::noHtml($this->numero_serie);
        return parent::test();
    }}
