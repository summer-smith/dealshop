<?php include '../view/header.php'; ?>
<main>

    <h2>Item Details</h2>
    <form action="." method="post">
         
        <table class='itemList'>
            <tr class="divide">
                <th>Item</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Store</th>
                <th></th>
            </tr>
            <input type="hidden" name="itemID" value="<?php echo $item['itemID'];?>"
 
            <tr>
                <td>
                    <?php echo $item['itemName']; ?>
                </td>
                <td>
                    <?php echo $item['brand']; ?>  
                </td>
                <td>
                    <?php echo '$'.$item['price']; ?>
                </td>
                <td>
                    <?php echo $item['store']; ?>
                </td>
                <td>
                    <button type="submit" class="bttn" name="action" value="Price Compare" >Price Compare</button>
                </td>
            </tr>
            <tr class="divide">
                <td><?php if ($item['quantity'] != NULL) {?>
                        (<?php echo $item['quantity']; ?>)
                    <?php } //endif?></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="bttn" name="action" value="Add to List" >Add to List</button>
                </td>
            </tr>
        </table>
     </form>
    <br>
    <!-- Search-->
    <form action ="index.php" method="post" id="itemSearchForm">
        <input type="text" name="searchItem" value="<?php echo $item['itemName'] ?>">
        <button type="submit" name="action" value="Search" >Search</button>
        <br>
    </form>

</main>
<?php include '../view/footer.php'; ?>