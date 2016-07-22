<h1>Админка</h1>
<a href="/admin/default/create" class="btn btn-primary">Создать</a>

<table class="table">

    <thead>
     <tr>
         <td>№</td>
         <td>Название</td>
         <td>Действия</td>
     </tr>
    </thead>

    <tbody>
       <?php foreach ($model as $item): ?>
          <tr>
              <td><?php echo $item->id ?></td>
              <td><?php echo $item->title ?></td>
              <td>
                  <a href="/admin/default/edit/<?php echo $item->id ?>">Редактировать</a>
                  |
                  <a href="/admin/default/delete/<?php echo $item->id ?>">Удалить</a>
              </td>
          </tr>
    <?php endforeach ?>
    </tbody>
</table>