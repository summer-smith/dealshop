<?php include '../view/header.php'; ?>
<main>

    <h2>Login</h2>
    <!-- login form -->
    <form action="index.php" method="post" id="log_in_form">
        <input type="hidden" name="action" value="loginSubmit">
        
        <label>Email:</label>
        <input type="text" value="user@gmail.com" name="email" />
        <input type="submit" value="Login" />
        
    </form>
    

</main>
<?php include '../view/footer.php'; ?>