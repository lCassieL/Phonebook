<header><h2>Phonebook</h2>
    <form method="post">
        <input type="hidden" name="action" value="logout">
        <input type="submit" value="logout">
    </form>
</header>
<div class="container">
<nav>
    <ul>
        <li><a href="/main/index" class="usualButton">Public phonebook</a></li>
        <li><a href="/main/mycontact" class="activeButton">My contact</a></li>
    </ul>
</nav>
<div class="content">
    <form method="post" class="mycontact">
        <input type="hidden" name="id" value="<?= $this->contact[0]['id']?>">
        <div>
        <label>CONTACT</label>
        <div>
            <label>First name</label>
            <input type="text" name="name" value="<?= $this->contact[0]['name']?>">
        </div>
        <div>
            <label>Last name</label>
            <input type="text" name="l_name" value="<?= $this->contact[0]['surname']?>">
        </div>
        <div>
            <label>Address</label>
            <input type="text" name="address" value="<?= $this->contact[0]['address']?>">
        </div>
        <div>
            <label>ZIP City</label>
            <input type="text" name="city" value="<?= $this->contact[0]['city']?>">
        </div>

        <div>
            <label>Country</label>
            <select name="country">
            <?php foreach($this->countries as $country){ ?>
            <option>
                <?= $country['name']?>
            </option>
            <?php }?>
            </select>
        </div>
        </div>
        <div id="phones">        
            <label>PHONE NUMBERS</label>
            <?php
            $pcount=0; 
            foreach($this->phone as $phone_item){ ?>
            <div class="phoneItem">
                <?php if($phone_item['publish'] === 'yes'){ ?>
                <input type="checkbox" name="_pubp<?= $pcount?>" value="yes" checked>
                <?php } else{ ?>
                <input type="checkbox" name="_pubp<?= $pcount ?>" value="yes">
                <?php }?>
                <input type="text" name="p<?= $pcount?>" value="<?= $phone_item['phone'] ?>">
            </div>
            <?php
            $pcount++; 
            }?>
            <div id="disablePhone">
                <input type="checkbox"  disabled>
                <input type="text" name="phone" disabled>
                <input type="hidden" id="pcount" value="<?= $pcount++?>">
            </div>
            <div>
                <a href="#" id="addPhoneInput" onclick="addPhoneField()">+Add</a>
            </div>
        </div>

        <div id="emails">
            <label>EMAILS</label>
            <?php 
            $ecount=0;
            foreach($this->email as $email_item){ ?>
            <div>
                <?php if($email_item['publish'] === 'yes'){ ?>
                <input type="checkbox" name="_pube<?= $ecount ?>" value="yes" checked>
                <?php } else{ ?>
                <input type="checkbox" name="_pube<?= $ecount ?>" value="yes">
                <?php }?>
                <input type="text" name="e<?= $ecount?>" value="<?= $email_item['email'] ?>">
            </div>
            <?php 
            $ecount++;
            } ?>
            <div id="disableEmail">
                <input type="checkbox" disabled>
                <input type="text" name="email" disabled>
                <input type="hidden" id="ecount" value="<?= $ecount++?>">
            </div>
            <div>
                <a href="#" id="addEmailInput" onclick="addEmailField()">+Add</a>
            </div>
        </div>

        <div>
            <label>* Fields are mandatory</label>
            <input type="checkbox" name="cPub" value="yes" checked>
            <label>Publish my contact</label>
            <input type="hidden" name="action" value="save">
            <input type="submit" value="save">
        </div>

    </form>
</div>
</div>