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
        )
    );

    public function getAllProduct()
    {
        return $this->productArray;
    }
}
