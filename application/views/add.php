<html>
<head>
<link rel="stylesheet" href="<?=base_url()?>css/stylesheet.css" type="text/css" media="screen, projection" charset="utf-8" />
</head>
<body>

<div id="wrapper">
	<p><a href="<?=site_url()?>">Home</a> > <a href="#">Add</a></p>

	<?=form_open('add')?>

		<?=validation_errors('<p style="color:red;font-weight:bold;">', '</p>')?>

		Class Name: <?=form_input('name', set_value('name'))?>

		<p>Place the names of the students below, separated by a new line:</p>

		<?=form_textarea('students', set_value('students'))?><br>

		<?=form_submit('submit', 'Submit')?>
	<?=form_close()?>
</div>
</body>
</html>