<?php include '../view/header.php'; ?>
<main>

    <h2>Edit Name</h2>
    
    <br>
     <!-- Display any errors-->
     <?php if (!empty($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
     <?php } // end if ?>
    <form action="." method="post">
        <input type="hidden" name="listID" value="<?php echo $listID;?>">  
        
        <input type="text" name="listName" value="<?php echo $listName; ?>">
        <br><br>
        <button type="submit" name="action" class="bttn2" value="Edit Name">
            Change Name
        </button>   
        <button type="submit" name="action" class="bttn2" value="Edit List">Cancel</button>
    </form>    
    
</main>
<?php include '../view/footer.php'; ?>

