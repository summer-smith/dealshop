<?php include '../view/header.php'; ?>
<main>
    <?php if($item == NULL){ echo $error; } else { ?>
    
    <p>Select list for "<?php echo $item['itemName'];?>"</p>

    <?php foreach ($lists as $list) : ?>
    <form action="." method="post">
        <input type="hidden" name='listID' value="<?php echo $list['listID']; ?>" >
        <input type="hidden" name='itemID' value="<?php echo $item['itemID']; ?>" >
        <button type="submit" class="link" name="action" value="Add Item To List">
            <?php echo $list['listName']; ?>
        </button>
          
    </form>
    <?php endforeach; ?>

    
    <?php }; //end else?>
</main>
<?php include '../view/footer.php'; ?>