<?php include '../view/header.php'; ?>
<main>

    <h2>Enter Item Price</h2>
    <p style="font-weight:bold;">"<?php echo $item['itemName'];?>"</p>
    
    <form action="index.php" method="post" id="createListForm" class="userIn">
        <input type="hidden" name="itemID" value="<?php echo $item['itemID']; ?>">
        <input type="hidden" name="itemName" value="<?php echo $item['itemName']; ?>">
               
        <label>Item Price:  $</label>
        <input type="text" name="itemPrice" style="width:50px;" />
        <?php if (!empty($priceError)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } // end if ?>
        <br><br>
        
        <label>Quantity: </label>
        <input type="text" name="quantity" style="width:50px;">
        <br><br>
        
        <label>Store: </label>
        <select name="storeName">
            <option value="">None</option>
            <?php foreach($stores as $store) :?>
            <option value="<?php echo $store['storeName']; ?>">
                <?php echo $store['storeName']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        
        <br><br>
        
        <label>Brand: </label>
        <input type="text" name="brandName">
        
        <br><br><br>
        
        <label> </label>     
        <button type="submit" class="link" name="action" value="Add Price">Add</button>
        
    </form>  
    

</main>
<?php include '../view/footer.php'; ?>