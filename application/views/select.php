<html>
<head>
<script src="<?=base_url()?>js/jquery.js"></script>
<script src="<?=base_url()?>js/select.js"></script>
<script>
	var i        = 0;
	var count    = <?=count($students); ?>;
	var students = <?=json_encode($students); ?>;
</script>
<link rel="stylesheet" href="<?=base_url()?>css/stylesheet.css" type="text/css" media="screen, projection" charset="utf-8" />
</head>
<body>

<div id="wrapper">
	<p><a href="<?=site_url()?>">Home</a> > <a href="#">Select Students</a></p>

	<input type="submit" value="Select a Student" onClick="select_student()">
	<input type="submit" value="Remove Student" onClick="remove_student()">

	<p style="padding-top:20px;">Click <b>Select a Student</b> to start selecting students. Once you have chosen a student, you can remove him or her by pressing <b>Remove Student</b>. Refreshing the page will bring back all the students.</p>

	<div id="student_area" style="padding-top:10px;font-size: 200px;">
	</div>
</div>
</body>
</html>