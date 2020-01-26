<?php
session_start();
require_once("Product.php");
$product = new Product();
$productArray = $product->getAllProduct();
if (!empty($_POST["action"])) {
	switch ($_POST["action"]) {
		case "add":
			if (!empty($_POST["quantity"])) {
				$productByCode = $productArray[$_POST["code"]];
				$itemArray = array($productByCode["code"] => array('name' => $productByCode["name"], 'code' => $productByCode["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode["price"]));

				if (!empty($_SESSION["cart_item"])) {
					$cartCodeArray = array_keys($_SESSION["cart_item"]);
					if (in_array($productByCode["code"], $cartCodeArray)) {
						foreach ($_SESSION["cart_item"] as $k => $v) {
							if ($productByCode["code"] == $k) {
								$_SESSION["cart_item"][$k]["quantity"] = $_SESSION["cart_item"][$k]["quantity"] + $_POST["quantity"];
							}
						}
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
			}
			break;
		case "remove":
			if (!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION["cart_item"] as $k => $v) {
					if ($_POST["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if (empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
				}
			}
			break;
		case "empty":
			unset($_SESSION["cart_item"]);
			break;
	}
}
?>
<?php
if (isset($_SESSION["cart_item"])) {
	$item_total = 0;
?>
	<div class="mos9">
		<div class="mos9-window">
			<div class="mos9-window__header">
				<div class="mos9-window__tools">
					<a href="#" class="mos9-window__close mos9-button"></a>
				</div>
				<div class="mos9-window__title">Shopping Cart</div>
				<div class="mos9-window__tools">
					<a href="#" class="mos9-window__tool--1 mos9-button"></a>
					<a href="#" class="mos9-window__tool--2 mos9-button"></a>
				</div>
			</div>
			<div class="mos9-window__content">
				<table>
					<tbody>
						<tr>
							<th><strong>Name</strong></th>
							<th><strong>Code</strong></th>
							<th><strong>Quantity</strong></th>
							<th><strong>Price</strong></th>
							<th></th>
						</tr>
						<?php
						foreach ($_SESSION["cart_item"] as $item) {
						?>
							<tr>
								<td><strong><?php echo $item["name"]; ?></strong></td>
								<td><?php echo $item["code"]; ?></td>
								<td><?php echo $item["quantity"]; ?></td>
								<td><?php echo "$" . $item["price"]; ?></td>
								<td><a onClick="cartAction('remove','<?php echo $item["code"]; ?>')" class="btnRemoveAction cart-action"><img src="images/icon-delete.png" /></a></td>
							</tr>
						<?php
							$item_total += ($item["price"] * $item["quantity"]);
						}
						?>

						<tr>
							<td colspan="3"><strong>Total:</strong></td>
							<td><?php echo "$" . number_format($item_total, 2); ?></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<a id="btnEmpty" class="cart-action" onClick="cartAction('empty','');"><img src="images/icon-empty.png" /> Empty Cart</a>
<?php
} else {
	?>

<div class="mos9">
  <div class="mos9-window">
    <div class="mos9-window__header">
      <div class="mos9-window__tools">
        <a href="#" class="mos9-window__close mos9-button"></a>
      </div>
      <div class="mos9-window__title">Shopping Cart</div>
      <div class="mos9-window__tools">
        <a href="#" class="mos9-window__tool--1 mos9-button"></a>
        <a href="#" class="mos9-window__tool--2 mos9-button"></a>
      </div>
    </div>
    <div class="mos9-window__content">
      <p>
        You need to add some items to your cart.
      </p>
    </div>
  </div>
</div>

	<?php
}
?>

