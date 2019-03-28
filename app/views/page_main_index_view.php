<header>Phonebook</header>
<div class="container">
<nav>
    <ul>
        <li><a href="/main/index">Public phonebook</a></li>
        <li><a href="/main/login">Login</a></li>
    </ul>
</nav>
<div class="content">
    <?php foreach($this->contacts as $contact) :?>
    <h2><?= $contact['name'].' '.$contact['surname']?></h2>
    <a href="#">View details</a>
    <div class="address">
        <h5>ADDRESS</h5>
        <span><?= $contact['address'] ?></span>
        <span><?= $contact['city'] ?></span>
        <span><?= $contact['country'] ?></span>
    </div>

    <div class="emails">
    <h5>EMAILS</h5>
    <?php foreach($this->emails as $email){
        if($contact['id'] == $email['contact_id']){ ?>
            <span><?= $email['email'] ?></span>
        <?php } ?>
    <?php } ?>
    </div>

    <div class="phones">
    <h5>PHONE NUMBERS</h5>
    <?php foreach($this->phones as $phone){
        if($contact['id'] == $phone['contact_id']){?>
            <span><?= $phone['phone'] ?></span>
        <?php } ?>
    <?php } ?>
    </div>
    <?php endforeach;?>
    
</div>
</div>