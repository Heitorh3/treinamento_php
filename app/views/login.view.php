<h2>Login</h2>

<?php echo getFlash('message'); ?>
<form action="/login" method="POST">

    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="heitorh3@gmail.com"/>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="rasmuslerdorf" />

    <button type="submit">Login</button>
</form>