<?php
require_once("Product.php");
$product = new Product();
$productArray = $product->getAllProduct();
?>

<div class="productContainer">
    <?php
    if (!empty($productArray)) {
        foreach ($productArray as $k => $v) {
    ?>
            <div class="product">
                <form id="frmCart">
                    <div class="mos9">
                        <div class="mos9-window">
                            <div class="mos9-window__header">
                                <div class="mos9-window__tools">
                                    <a href="#" class="mos9-window__close mos9-button"></a>
                                </div>
                                <div class="mos9-window__title"><?php echo $productArray[$k]["name"]; ?></div>
                                <div class="mos9-window__tools">
                                    <a href="#" class="mos9-window__tool--1 mos9-button"></a>
                                    <a href="#" class="mos9-window__tool--2 mos9-button"></a>
                                </div>
                                <div class="mos9-window__content">

                                    <img src="<?php echo $productArray[$k]["image"]; ?>">



                                    <p><?php echo "$" . $productArray[$k]["price"]; ?></p>

                                    <button type="button" id="add_<?php echo $productArray[$k]["code"]; ?>" class="btnAddAction cart-action" onClick="cartAction('add','<?php echo $productArray[$k]["code"]; ?>')">
                                        <img src="images/add-to-cart.png" />
                                    </button>
                                    <input type="text" id="qty_<?php echo $productArray[$k]["code"]; ?>" name="quantity" value="1" size="2" />

                                </div>
                            </div>
                        </div>

                </form>
            </div>
    <?php
        }
    }
    ?>
</div>