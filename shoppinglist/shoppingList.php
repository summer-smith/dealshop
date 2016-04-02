<?php include '../view/header.php'; ?>
<main>

    <h2>Shopping Lists</h2>
    <table class="itemList">
        <?php foreach ($lists as $list) : ?>
        <form action="." method="post">
            <input type="hidden" name='listID' value="<?php echo $list['listID']; ?>" >
            <tr>
                <td>
                    <button type="submit" name="action" value="Edit List">
                    <?php echo $list['listName']; ?>
                    </button>
                </td>
                
                <td>
                    <button type="submit" class="bttn" name="action" value="Edit List">
                        Edit
                    </button>
                </td>
                
                <td>
                    <button type="submit" class="bttn" name="action" value="Delete List">
                        Delete
                    </button>
                </td>
            </tr>
            

        </form>
        <?php endforeach; ?>
        
        
    </table>
    
    <br><br>
    <form>
        <button type="submit" class="link" name="action" value="New List" >New List</button>
    </form> 
</main>
<?php include '../view/footer.php'; ?>