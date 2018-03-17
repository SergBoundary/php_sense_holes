	function editText (tags) {
		var textarea = document.querySelector("textarea");
			replaceSelection(textarea, tags);
			event.preventDefault();
	};
	function replaceSelection(field, tags) {		
		if (tags == 'p') {
			var tag_start = '<' + tags + ' class="text-justify">'; 
		} else {
			var tag_start = '<' + tags + '>';
		}
		var tag_end = '</' + tags + '>';
		var from = field.selectionStart, to = field.selectionEnd;
		string = field.value.slice(from, to);
		if (tags == 'ol' || tags == 'ul') {
			var list = string.split('\n'), list_tag = '';
			for (i = 0; i < list.length; i++) {
				list_tag += '<li><p class="text-justify">' + list[i] + '</p></li>\n';
			}
			field.value = field.value.slice(0, from) + '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">' + tag_start + '\n' + list_tag + tag_end + '</div>' + field.value.slice(to);
		//} else if (tags == 'img') {
		//	alert(tags);
		} else {
			if (string.charAt(string.length - 1) == " ") {
				var a = string.length;
				var b = string.trim().length;
				var c = a - b;
				field.value = field.value.slice(0, from) + tag_start + field.value.slice(from, to - c) + tag_end + field.value.slice(to - c);
			} else {
				field.value = field.value.slice(0, from) + tag_start + field.value.slice(from, to) + tag_end + field.value.slice(to);
			};
			// Put the cursor after the word
			field.selectionStart = field.selectionEnd = field.value.slice(0, from).length + tag_start.length + field.value.slice(from, to).length + tag_end.length;
		};
	};
