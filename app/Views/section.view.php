<h1><?= $data['section']->getTitle() ?></h1>

<form action="">
    <input type="text" placeholder="Тема">
    <button type="submit">Створити</button>
</form>

<hr>

<h2>Теми:</h2>

<?php foreach( $data['topics'] as $topic ) { ?>

    <li>
        <a href="/section/<?= $data['section']->getSlug() ?>/<?=$topic->getId()?>">
        <?= $topic->getTitle() ?>
        </a>
    </li>

<?php } ?>
