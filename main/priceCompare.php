<?php include '../view/header.php'; ?>
<main>
    <h2>Price Compare</h2>
    <p style="font-style: italic">Select an item to price-compare</p>
 
        
    <!-- List all items in database matching search requirements-->
     <form action="." method="post">
         
        <table class='itemList'>
            <tr class="divide">
                <th>Item</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Store</th>
                <th></th>
            </tr>
            <?php foreach ($items as $item) : ?>
            <input type="hidden" name="itemID" value="<?php echo $item['itemID'];?>"
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="bttn" name="action" value="Item Info" >Details</button>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $item['itemName']; ?><?php if ($item['quantity'] != NULL) {?>
                        (<?php echo $item['quantity']; ?>)
                    <?php } //endif?>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="bttn" name="action" value="Add to List" >Add to List</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
     </form>
</main>
<?php include '../view/footer.php'; ?>