<?php

namespace spec\Viperium;

use PhpSpec\ObjectBehavior;
use Viperium\Product;
use Viperium\WarehouseInterface;

class ProductSpec extends ObjectBehavior
{
    function let(WarehouseInterface $warehouseMock)
    {
        $id = 123;
        $this->beConstructedWith($id, $warehouseMock);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Product::class);
    }

    /*function it_should_be_in_stock()
    {
        $this->isInStock()->shouldReturn(true);
    }*/

    function it_should_be_in_stock_if_the_warehouse_has_stock(WarehouseInterface $warehouseMock)
    {
        //$warehouseMock->getStock(123)->shouldBeCalled()->willReturn(10);
        $this->setStockExpectations($warehouseMock, 10);
        //$this->isInStock()->shouldReturn(true);
        $this->shouldBeInStock();
    }

    function it_should_not_be_in_stock_if_the_warehouse_does_not_have_stock(WarehouseInterface $warehouseMock)
    {
        //$warehouseMock->getStock(123)->shouldBeCalled()->willReturn(0);
        $this->setStockExpectations($warehouseMock, 10);
        //$this->isInStock()->shouldReturn(false);
        $this->shouldNotBeInStock();
    }

    // Wordt niet meegenomen als een test
    private function setStockExpectations(WarehouseInterface $warehouseMock, $stock)
    {
        $warehouseMock->getStock(123)->shouldBeCalled()->willReturn($stock);
    }

}
