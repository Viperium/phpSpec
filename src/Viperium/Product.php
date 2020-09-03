<?php

namespace Viperium;

class Product
{
    private $id;
    private $warehouse;

    public function __construct($id, $warehouse)
    {
        $this->id = $id;
        $this->warehouse = $warehouse;
    }

    public function isInStock()
    {
        $stock = $this->warehouse->getStock($this->id);

        return $stock > 0 ? true : false;

        /*if ($stock > 0) {
            return true;
        }
        return false;*/
    }

}
