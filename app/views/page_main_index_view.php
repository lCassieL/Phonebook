<header>Phonebook</header>
<div class="container">
<nav>
    <ul>
        <li><a href="#">Public phonebook</a></li>
        <li><a href="#">Login</a></li>
    </ul>
</nav>
<div class="content">
    <?php foreach($this->users as $user) :?>
    <h2><?= $user['name'].' '.$user['surname']?></h2>
    <a href="#">View details</a>
    <table>
        <tr>
            <th>ADRESS</th>
            <th>PHONE NUMBERS</th>
            <th>EMAILS</th>
        </tr>
        <tr>
            <td><?= $user['address'] ?></td>
            <td>+1234567890</td>
            <td>mail@gmail.com</td>
        </tr>
        <tr>
            <td><?= $user['city'] ?></td>
            <td>+1234567890</td>
            <td>mail@gmail.com</td>
        </tr>
        <tr>
            <td><?= $user['country'] ?></td>
            <td>+1234567890</td>
            <td>mail@gmail.com</td>
        </tr>
    </table>
    <?php endforeach;?>
</div>
</div>