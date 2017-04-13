<h1>Forum Sections</h1>


<ul>
    <?php foreach($data['sections'] as $section) { ?>

        <li><a href="/section/<?=$section->getSlug()?>"><?=$section->getTitle()?></a></li>

    <?php } ?>
</ul>