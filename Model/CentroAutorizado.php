<?php

namespace FacturaScripts\Plugins\Nomencladores\Model;

use FacturaScripts\Core\Model\Base\ModelClass;
use FacturaScripts\Core\Model\Base\ModelTrait;
use FacturaScripts\Core\Tools;
class CentroAutorizado extends ModelClass
{
    use ModelTrait;

    /** @var int */
    public $id;

    /** @var string */
    public $codigo_centroautorizado;


    /** @var string */
    public $nombre_centroautorizado;

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
        return "centrosautorizados";
    }

    public function test(): bool
    {
        $this->nombre_centroautorizado = Tools::noHtml($this->nombre_centroautorizado);
        return parent::test();
    }}
