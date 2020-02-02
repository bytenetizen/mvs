<aside>
    <nav>
        <ul>
            <li><a href="?lang=ru">Русский</a></li>
            <li><a href="?lang=en">English</a></li>
        </ul>
    </nav>
    <hr>
    <nav>
        <ul>
            <li><a href="/"><?= $Lang['home']?></a></li>
            <? if(!empty($user)) : ?>
                <li><a href="/logout"><?= $Lang['logout']?></a></li>
            <? else :?>
                <li><a href="/register"><?= $Lang['register']?></a></li>
            <? endif;?>
        </ul>
    </nav>
</aside>