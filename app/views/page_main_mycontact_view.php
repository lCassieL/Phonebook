<header>Phonebook
    <form method="post">
        <input type="submit" name="logout">
    </form>
</header>
<div class="container">
<nav>
    <ul>
        <li><a href="/main/index">Public phonebook</a></li>
        <li><a href="/main/mycontact">My contact</a></li>
    </ul>
</nav>
<div class="content">
    <form method="post">
        <label>CONTACT</label>
        <div>
            <label>First name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Last name</label>
            <input type="text" name="l_name">
        </div>
        <div>
            <label>Address</label>
            <input type="text" name="address">
        </div>
        <div>
            <label>ZIP City</label>
            <input type="text" name="city">
        </div>
        <div>
            <label>Country</label>
            <select></select>
        </div>
        <label>PHONE NUMBERS<label>
        <div>
            <input type="checkbox" name="Publish field">
            <input type="text" name="phone">
        </div>
        <div>
            <input type="checkbox" name="Publish field">
            <input type="text" name="phone">
        </div>
        <div>
            <input type="checkbox" name="Publish field" disabled>
            <input type="text" name="phone" disabled>
        </div>
        <div>
            <a href="#">+Add</a>
        </div>
        <label>EMAILS</label>
        <div>
            <input type="checkbox" name="Publish field">
            <input type="text" name="email">
        </div>
        <div>
            <input type="checkbox" name="Publish field">
            <input type="text" name="email">
        </div>
        <div>
            <input type="checkbox" name="Publish field">
            <input type="text" name="email">
        </div>
        <div>
            <input type="checkbox" name="Publish field" disabled>
            <input type="text" name="email" disabled>
        </div>
        <div>
            <a href="#">+Add</a>
        </div>
        <div>
            <label>* Fields are mandatory</label>
            <input type="checkbox" name="Publish my contact">
            <input type="submit" value="SAVE">
        </div>

    </form>
</div>
</div>