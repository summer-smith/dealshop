<?php include '../view/header.php'; ?>
<main>
    <?php if($error != NULL){ 
     echo $error; 
     }//endif ?>
    
    <p>Edit Shopping List</p>
    <form action="." method="post">
       <input type="hidden" name="listID" value="<?php echo $listID;?>">  
    <h2><?php echo $listName; ?></h2>
    <ul>
        <li>
            <button type="submit" class="bttn2" name="action" value="Delete List" >Delete List</button>
        </li>
        <li>
            <button type="submit" class="bttn2" name="action" value="Edit Name" >Edit Name</button>
        </li>
        <li>
            <button type="submit" class="bttn2" name="action" value="Item Search" >Add Items</button>
        </li>
    </ul>
    
    <p>
    <?php if($storeName == NULL) { ?>
                <button type="submit" class="bttn2" name="action" value="Edit Store" >Add Store</button>
            <?php }else{ ?>
                <?php echo $storeName; ?>
            <?php } ?></p>
    
    </form>
     <!-- List all items in list -->
     <?php if($items != NULL) { ?>

    <table class='itemList'>
        <tr class="divide">
            <th>Item</th>
            <th>Brand</th>
            <th>Price</th>
            <th></th>
        </tr>
        <?php foreach ($items as $item) : ?>
        <form action="." method="post">
            <input type="hidden" name="listID" value="<?php echo $listID;?>" >
            <input type="hidden" name="itemID" value="<?php echo $item['itemID'];?>" >
            
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="bttn" name="action" value="Edit" >Edit</button>
                </td>
            </tr>
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
                    <button type="submit" class="bttn" name="action" value="Price Compare" >Price Compare</button>
                </td>
            </tr>
            <tr class="divide">
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="bttn" name="action" value="Remove Item" >Remove</button>
                </td>
            </tr>
        </form>
        <?php endforeach; ?>
    </table>

     <?php } else { ?>
     <p style="font-style: italic">No Items in List</p>
     <?php } ?>
     
     <form>
         <button type="submit" name="action" class="link" value="List Page">Back to Lists</button>
     </form>
</main>
<?php include '../view/footer.php'; ?>