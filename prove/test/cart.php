<div id="shopping-cart">
    <div class="txt-heading">Shopping Cart <a id="btnEmpty" class="cart-action" onClick="cartAction('empty','');"><img src="images/icon-empty.png" /> Empty Cart</a></div>
    <div id="cart-item">
        <?php
        require_once "ajax-action.php";
        ?>
    </div>
</div>
<script src="./home/prove/test/cartAction.js"></script>