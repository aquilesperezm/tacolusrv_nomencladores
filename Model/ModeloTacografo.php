<?php

namespace FacturaScripts\Plugins\Nomencladores\Model;

use FacturaScripts\Core\Model\Base\ModelClass;
use FacturaScripts\Core\Model\Base\ModelTrait;
use FacturaScripts\Core\Tools;
class ModeloTacografo extends ModelClass
{
    use ModelTrait;

    /** @var int */
    public $id;

    /** @var string */
    public $modelo_tacografo;

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
        return "modelostacografos";
    }

    public function test(): bool
    {
        $this->modelo_tacografo = Tools::noHtml($this->modelo_tacografo);
        return parent::test();
    }}
