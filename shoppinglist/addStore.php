<?php include '../view/header.php'; ?>
<main>

    <h2>Add Store</h2>
    
    <?php foreach ($stores as $store) : ?>
        <form action="." method="post">
            <input type="hidden" name="storeID" value="<?php echo $store['storeID'];?>">
            <input type="hidden" name="listID" value="<?php echo $listID;?>">  
            <button type="submit" name="action" class="link" value="Add Store">
                <?php echo $store['storeName']; ?>
            </button>
        </form>
    <?php endforeach; ?>
    <form action="." method="post">
        <input type="hidden" name="listID" value="<?php echo $listID;?>">      
        <button type="submit" name="action" class="link" value="Edit List">Cancel</button>
    </form>    
    
</main>
<?php include '../view/footer.php'; ?>
