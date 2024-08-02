<?php

namespace FacturaScripts\Plugins\Nomencladores\Model;

use FacturaScripts\Core\Model\Base\ModelClass;
use FacturaScripts\Core\Model\Base\ModelTrait;
use FacturaScripts\Core\Tools;
class TipoTacografo extends ModelClass
{
    use ModelTrait;

    /** @var int */
    public $id;

    /** @var string */
    public $nombre_tipotacografo;

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
        return "tipostacografos";
    }

    public function test(): bool
    {
        $this->nombre_tipotacografo = Tools::noHtml($this->nombre_tipotacografo);
        return parent::test();
    }}
