<?php include '../view/header.php'; ?>
<main>

    <h2>New Shopping List</h2>
    
    <form action="index.php" method="post" id="createListForm" class="userIn">
        <label>List name:  </label>
        <input type="text" name="listName">
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
        <br><br><br>
        
        <label> </label>     
        <button type="submit" class="link" name="action" value="Create List">Create</button>
        
    </form>  
    
    
    
</main>
<?php include '../view/footer.php'; ?>
