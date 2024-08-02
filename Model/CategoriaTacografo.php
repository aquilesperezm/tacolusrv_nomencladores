<?php

namespace FacturaScripts\Plugins\Nomencladores\Model;

use FacturaScripts\Core\Model\Base\ModelClass;
use FacturaScripts\Core\Model\Base\ModelTrait;
use FacturaScripts\Core\Tools;
class CategoriaTacografo extends ModelClass
{
    use ModelTrait;

    /** @var int */
    public $id;

    /** @var string */
    public $nombre_categoriatacografo;

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
        return "categoriastacografos";
    }

    public function test(): bool
    {
        $this->nombre_categoriatacografo = Tools::noHtml($this->nombre_categoriatacografo);
        return parent::test();
    }}
