<header><h2>Phonebook</h2></header>
<div class="container">
<nav>
    <ul>
        <li><a href="#" class="usualButton mainIndex">Public phonebook</a></li>
        <li><a href="#" class="activeButton mainLogin">Login</a></li>
    </ul>
</nav>
<div class="content">
<form method="post" class="loginForm">
    <div>
        <label>USERNAME</label>
        <input type="text" name="login" required>
    </div>

    <div>
        <label>PASSWORD</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <input type="hidden" name="action" value="login">
        <input type="submit" value="LOGIN">
    </div>
</form>
<p class="error"><?= $this->error ?></p>
    
</div>
</div>