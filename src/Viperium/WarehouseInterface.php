<?php

namespace Viperium;

interface WarehouseInterface
{
    public function getStock($productId);
}
