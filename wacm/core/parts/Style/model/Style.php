<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 30.06.2016
 * Time: 15:20
 */

namespace model;

use systems\DB;

class Style
{
    public function getstyles($type_block_id)
    {
        {
            $DBase = DB::getInstance();
            $styles = $DBase->select("styles",null,["id_to"=>$type_block_id]);
            return $styles;
        }
    }
    public function getblocks()
    {
        {
            $DBase = DB::getInstance();
            $block = $DBase->select("blocks",null);
            return $block;
        }
    }
}