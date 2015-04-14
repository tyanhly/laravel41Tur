<div class="container">
    <?php 
//     var_dump($users);die; 
    foreach ($users as $user): ?>
    	<div>
        <?php echo $user->email; ?></div>
    <?php endforeach; ?>
</div>

<?php echo $users->links(); ?>