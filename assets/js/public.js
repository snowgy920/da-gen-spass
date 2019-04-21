jQuery(document).ready(function ($){
	$.fn.removeClassRegex = function(regex) {
		return $(this).removeClass(function(index, classes) {
			return classes.split(/\s+/).filter(function(c) {
			return regex.test(c);
			}).join(' ');
		});
	};

	function checkStrength(password) {
		$.ajax({
			type: "post",
			dataType: "json",
			url: data_object.ajax_url,
			data: {
				action: "da_gen_check",
				word: password
			},
			success: function (res) {
				$('#da_sec_password').removeClassRegex(/^da-str-/).addClass("da-str-"+res.score_label);
				// $('#da_sec_password').next().text(res.score + ":" + res.score_label);
			}
		});
	}

	$('#da_sec_password').keyup(function(){
		var word = $(this).val();
		checkStrength(word);
		$('#pass_length').val(word.length);
		$('#pass_length_value').val(word.length);
	});

	var rotate_angle = 0;
	$('#btn_gen_pass').click(function(){
		$.ajax({
			type: "post",
			dataType: "json",
			url: data_object.ajax_url,
			data: {
				action: "da_gen_rand_pass",
				length: $('#pass_length_value').val(),
				easy_to_read: $('#chk_easy_to_read').is(':checked') ? 1 : 0,
				allow_uppers: $('#chk_allow_uppers').is(':checked') ? 1 : 0,
				allow_lowers: $('#chk_allow_lowers').is(':checked') ? 1 : 0,
				allow_numbers: $('#chk_allow_numbers').is(':checked') ? 1 : 0,
				allow_symbols: $('#chk_allow_symbols').is(':checked') ? 1 : 0
			},
			success: function (res) {
				$('#da_sec_password').val(res.password);
				$('#da_sec_password').removeClassRegex(/^da-str-/).addClass("da-str-"+res.score_label);
				// $('#da_sec_password').next().text(res.score + ":" + res.score_label);
				
				// $('#btn_gen_pass').css("transform", "rotate(180deg)");
				// setTimeout(function(){
				// 	$('#btn_gen_pass').css("transform", "rotate(0deg)");
				// }, 300);
			}
		});
	});

	$('#generator-form').submit(function(e){
		e.preventDefault();
		return false;
	});

	$('.da-generator-container .customization .da-low-header').click(function(){
		$('.da-generator-container .customization').toggleClass("collapsed");
	});

	$('#pass_length').on('input', function () {
		$(this).trigger('change');
	});
	$('#pass_length').change(function(){
		$('#pass_length_value').val($(this).val());
		$('#btn_gen_pass').click();
	});
	$('#pass_length_value').change(function(){
		$('#pass_length').val($(this).val());
		$('#btn_gen_pass').click();
	});

	$('.da-pass-types input:checkbox').click(function(){
		$('.da-pass-types input:checkbox:checked').prop('checked', false);
		$(this).prop('checked', true);

		switch ($(this).attr('id')) {
			case 'chk_easy_to_read':
				$('.da-allow-characters input:checkbox').prop('disabled', false);
				$('#chk_allow_numbers').prop('checked', false);
				$('#chk_allow_symbols').prop('checked', false);
				break;
			case 'chk_easy_to_say':
				$('#chk_allow_numbers').prop('checked', false).prop('disabled', true);
				$('#chk_allow_symbols').prop('checked', false).prop('disabled', true);
				break;
			case 'chk_all_char':
				$('.da-allow-characters input:checkbox').prop('disabled', false).prop('checked', true);
				break;
		}
		$('#btn_gen_pass').click();
	});

	$('.da-allow-characters input:checkbox').change(function(){
		$('#btn_gen_pass').click();
	});

	$('.da-clipboard-copy').click(function(){
		copyToClipboard($('#da_sec_password').val());
	});

	$('#btn_gen_pass').click();

});

function copyToClipboard(str) {
	const el = document.createElement('textarea');
	el.value = str;
	el.setAttribute('readonly', '');
	el.style.position = 'absolute';
	el.style.left = '-9999px';
	document.body.appendChild(el);
	el.select();
	document.execCommand('copy');
	document.body.removeChild(el);
}
