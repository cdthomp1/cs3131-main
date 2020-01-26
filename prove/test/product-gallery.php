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

                    <p><?php echo $productArray[$k]["name"]; ?></p>
                    <img src="<?php echo $productArray[$k]["image"]; ?>">



                    <p><?php echo "$" . $productArray[$k]["price"]; ?></p>

                    <button type="button" id="add_<?php echo $productArray[$k]["code"]; ?>" class="btnAddAction cart-action" onClick="cartAction('add','<?php echo $productArray[$k]["code"]; ?>')">
                        <img src="images/add-to-cart.png" />
                    </button>
                    <input type="text" id="qty_<?php echo $productArray[$k]["code"]; ?>" name="quantity" value="1" size="2" />

                </form>
            </div>
</div>
<?php
        }
    }
?>