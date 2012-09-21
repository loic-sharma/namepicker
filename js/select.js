function array_shift (inputArr) {
	var props = false,
		shift = undefined,
		pr = '',
		allDigits = /^\d$/,
		int_ct = -1,
		_checkToUpIndices = function (arr, ct, key) {
			// Deal with situation, e.g., if encounter index 4 and try to set it to 0, but 0 exists later in loop (need to
			// increment all subsequent (skipping current key, since we need its value below) until find unused)
			if (arr[ct] !== undefined) {
				var tmp = ct;
				ct += 1;
				if (ct === key) {
					ct += 1;
				}
				ct = _checkToUpIndices(arr, ct, key);
				arr[ct] = arr[tmp];
				delete arr[tmp];
			}
			return ct;
		};


	if (inputArr.length === 0) {
		return null;
	}
	if (inputArr.length > 0) {
		return inputArr.shift();
	}
}


shuffle = function(o) {
	for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
	return o;
};

function select_student()
{
	if(i >= count)
	{
		$('#student_area').html('There are no more students.');
	}

	else
	{
		students = shuffle(students);

		$('#student_area').slideDown();

		$('#student_area').html(function() {
			return students[0];
		});
	}
}

function remove_student()
{
	array_shift(students);
	i++;
}