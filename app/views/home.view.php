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

<?php $this->start('scripts') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        axios.defaults.headers = { 
            'Content-Type': 'application/json',
            HTTP_X_REQUESTED_WITH: 'XMLHttpRequest',          
        }

        async function loadUsers() {
            await axios.get('<?php echo URL_ROOT; ?>api/users')
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
        loadUsers();
    </script>
<?php $this->stop() ?>