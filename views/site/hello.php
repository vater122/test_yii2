<a href="/admin"><h3>Вход в админку</h3></a>

<?php foreach($obj as $item): ?>

<p><a href="/site/one/<?php echo $item->id; ?>"><?php echo $item->title; ?></a></p>

<?php endforeach; ?>
