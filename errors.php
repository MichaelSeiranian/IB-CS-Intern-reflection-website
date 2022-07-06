<?php if (count($errors) > 0 ): ?>
	<div class="error">
		<?php foreach ($errors as $error): ?>
			<p><?php echo $error; ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if (count($successfuls) > 0 ): ?>
	<div class="successful">
		<?php foreach ($successfuls as $successful): ?>
			<p><?php echo $successful; ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>