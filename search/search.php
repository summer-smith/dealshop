<?php include '../view/header.php'; ?>
<main>
    
    <h2>Search</h2><br>
    <!-- Display any errors-->
     <?php if (!empty($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
     <?php } // end if ?>
        
    <!-- Search-->
    <form action ="index.php" method="post" id="itemSearchForm">
        <input type="text" name="searchItem">
        <button type="submit" name="action" value="Search" >Search</button>
        <br>
    </form>
    
     <!-- List all items in database -->
     
         
        <table class='itemList'>
            <tr class="divide">
                <th>Item</th>
                <th>Brand</th>
                <th>Price</th>
                <th></th>
            </tr>
            <?php foreach ($items as $item) : ?>
            <form action="." method="post">
                <input type="hidden" name="itemID" value="<?php echo $item['itemID'];?>"
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="submit" class="bttn" name="action" value="Item Info" >Details</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $item['itemName']; ?>
                        <?php if ($item['quantity'] != NULL) {?>
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
                        <button type="submit" class="bttn" name="action" value="Price Compare" >Price Compare</button>
                    </td>
                </tr>
                <tr class="divide">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="submit" class="bttn" name="action" value="Add to List" >Add to List</button>
                    </td>
                </tr>
            </form>
            <?php endforeach; ?>
        </table>
     
</main>
<?php include '../view/footer.php'; ?>