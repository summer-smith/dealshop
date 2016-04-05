<?php include '../view/header.php'; ?>
<main>

    <h2>Price Compare</h2>
    <h1><?php echo $compareItem['itemName'];?></h1>
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
            <input type="hidden" name="itemID" value="<?php echo $item['itemID'];?>" >
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
                    <button type="submit" class="bttn" name="action" value="Add to List" >Add to List</button>
                </td>
            </tr>
            <tr class="divide">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
     </form>
    <br><br>
    <form>
        <input type="hidden" name="newPriceItemID" value="<?php echo $compareItemID;?>" >
        <button type="submit" class="link" name="action" value="Add Price Form" >Add New Price</button>  
    </form>

</main>
<?php include '../view/footer.php'; ?>