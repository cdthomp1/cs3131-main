<div id="shopping-cart">
    <div class="txt-heading">
        <h1>Shopping Cart</h1>
        <a id="btnEmpty" class="cart-action" onClick="cartAction('empty','');"><img src="images/icon-empty.png" /> Empty Cart</a>
    </div>
    <div id="cart-item">
        <?php
        require_once "ajax-action.php";
        ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script src="cartAction.js"></script>