<header><h2>Phonebook</h2>
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
        <li><a href="#" class="activeButton mainIndex" id="lol">Public phonebook</a></li>
        <li>
            <?php if(!$_SESSION['login']){ ?>
            <a href="#" class="usualButton mainLogin">Login</a>
            <?php } else{ ?>
            <a href="#" class="usualButton mainContact">My contact</a>
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
            <a href="#" onclick="displayInform(this,<?= $ccount ?>,<?= $contact['id']?>)">View details</a>
        </div>
        <div class="userInformDisplayNone c<?= $ccount?>">
            
        </div>    
    <?php
    $ccount++;
    } ?>
</div>
<!-- </div> -->

</div>