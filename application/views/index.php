<html>
<head>

<script src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
<script>
$('.target').change(function() {
  alert('Handler for .change() called.');
});
</script>
<link rel="stylesheet" href="<?=base_url()?>css/stylesheet.css" type="text/css" media="screen, projection" charset="utf-8" />
</head>
<body>
	<div id="wrapper">
		<h1>Name Picker</h1>

		<?php if($classes == FALSE): ?>
			<p>You currently have no classes. Please add one.</p>
		<?php else: ?>
			Select a class:

			<form action="../">
				<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
					<option value="index.php" selected="selected">--- SELECT ---</option>
					<?php foreach($classes as $class): ?>
						<option value="<?=site_url('select/' . $class->id)?>"><?=$class->name?></option>
					<?php endforeach; ?>
				</select>
			</form>
		<?php endif; ?>

		<p style="padding-top:5px;"><a href="<?=site_url('add')?>">[+] Add a Class</a></p>
	</div>
</body>
</html>