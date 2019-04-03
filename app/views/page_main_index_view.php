<header>Phonebook
    <?php if($_SESSION['login']){ ?>
    <form method="post">
        <input type="hidden" name="action" value="logout">
        <input type="submit" value="logout">
    </form>
    <?php } ?>
</header>
<div class="container">
<nav>
    <ul>
        <li><a href="/main/index">Public phonebook</a></li>
        <li>
            <?php if(!$_SESSION['login']){ ?>
            <a href="/main/login">Login</a>
            <?php } else{ ?>
            <a href="/main/mycontact">My contact</a>
            <?php } ?>
        </li>
    </ul>
</nav>
<!-- <div class="wrapContent"> -->
<div class="content">
    <?php
    $ccount = 0; 
    foreach($this->contacts as $contact){
        if($contact['publish'] === 'no'){
            continue;
        }
    ?>
        <div class="userFullName">
            <h2><?= $contact['name'].' '.$contact['surname']?></h2>
            <a href="#" onclick="displayInform(this,<?= $ccount ?>)">View details</a>
        </div>
        <div class="userInformDisplayNone c<?= $ccount?>">
            <div class="address">
                <h5>ADDRESS</h5>
                <div><?= $contact['address'] ?></div>
                <div><?= $contact['city'] ?></div>
                <div><?= $contact['country'] ?></div>
            </div>

            <div class="phones">
                <h5>PHONE NUMBERS</h5>
                <?php foreach($this->phones as $phone){
                    if($contact['id'] == $phone['contact_id']){ ?>
                        <div><?= $phone['phone'] ?></div>
                    <?php } ?>
                <?php } ?>
            </div>

            <div class="emails">
                <h5>EMAILS</h5>
                <?php foreach($this->emails as $email){
                    if($contact['id'] == $email['contact_id']){ ?>
                        <div><?= $email['email'] ?></div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>    
    <?php
    $ccount++;
    } ?>
</div>
<!-- </div> -->

</div>