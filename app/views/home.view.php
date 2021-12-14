<?php $this->layout('index.view', ['title' => $title]) ?>

<h2>Users</h2>

<?php echo getFlash('success', 'background-color:green;color:white'); ?>
<?php echo getFlash('error', 'background-color:red;color:white'); ?>

<ul>
  <?php foreach ($users as $user) : ?>
      <li>
          <a href="<?php echo URL_ROOT; ?>user/<?php echo $user->id;?>/show">
              <?php echo $user->name; ?>
          </a>
      </li>
  <?php endforeach; ?>
</ul>