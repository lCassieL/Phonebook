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
            <input type="text" name="name" value="<?= $this->user[0]['name']?>">
        </div>
        <div>
            <label>Last name</label>
            <input type="text" name="l_name" value="<?= $this->user[0]['surname']?>">
        </div>
        <div>
            <label>Address</label>
            <input type="text" name="address" value="<?= $this->user[0]['address']?>">
        </div>
        <div>
            <label>ZIP City</label>
            <input type="text" name="city" value="<?= $this->user[0]['city']?>">
        </div>
        <div>
            <label>Country</label>
            <select><?= $this->user[0]['country']?>"</select>
        </div>
        <label>PHONE NUMBERS<label>
        <?php foreach($this->phone as $phone_item){ ?>
        <div>
            <?php if($phone_item['publish'] === 'yes'){ ?>
            <input type="checkbox" name="Publish field" checked>
            <?php } else{ ?>
            <input type="checkbox" name="Publish field">
            <?php }?>
            <input type="text" name="phone" value="<?= $phone_item['phone'] ?>">
        </div>
        <?php }?>
        <div>
            <input type="checkbox" name="Publish field" disabled>
            <input type="text" name="phone" disabled>
        </div>
        <div>
            <a href="#">+Add</a>
        </div>
        <label>EMAILS</label>
        <?php foreach($this->email as $email_item){ ?>
        <div>
            <?php if($email_item['publish'] === 'yes'){ ?>
            <input type="checkbox" name="Publish field" checked>
            <?php } else{ ?>
            <input type="checkbox" name="Publish field">
            <?php }?>

            <input type="text" name="email" value="<?= $email_item['email'] ?>">
        </div>
        <?php } ?>
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
            <input type="submit" value="save">
        </div>

    </form>
</div>
</div>