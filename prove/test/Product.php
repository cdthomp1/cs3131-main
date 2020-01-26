<?php

class Product
{

    public $productArray = array(
        "imacg3" => array(
            'id' => '1',
            'name' => 'iMac G3',
            'code' => 'imacg3',
            'image' => 'product-images/imac-g3.png',
            'price' => '200.00'
        ),
        "1984macintosh" => array(
            'id' => '2',
            'name' => '1984 Macintosh',
            'code' => '1984macintosh',
            'image' => 'product-images/macintosh-1984-200x200.jpg',
            'price' => '300.00'
        ),
        "powermacg3" => array(
            'id' => '3',
            'name' => 'Power Mac G3',
            'code' => 'powermacg3',
            'image' => 'product-images/powermac-g3.jpg',
            'price' => '250.00'
        ),
        "powermacg3logicboard" => array(
            'id' => '3',
            'name' => 'Power Mac G3 Logic Board',
            'code' => 'powermacg3logicboard',
            'image' => 'product-images/powermac-g3-logic-board.jpg',
            'price' => '40.00'
        ),
        "1984keyboard" => array(
            'id' => '3',
            'name' => '1984 Macintosh Keyboard',
            'code' => '1984keyboard',
            'image' => 'product-images/macintosh-keyboard.jpg.jpg',
            'price' => '35.00'
        ),
        "imacg3cd" => array(
            'id' => '3',
            'name' => 'iMac G3 CD Drive',
            'code' => 'imacg3cd',
            'image' => 'product-images/imac-g3-cd.jpg',
            'price' => '20.00'
        )
    );

    public function getAllProduct()
    {
        return $this->productArray;
    }
}
