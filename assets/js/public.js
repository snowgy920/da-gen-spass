jQuery(document).ready(function ($){

	$('.da-sec-pass').keyup(function(){
		$pass = $(this);
		jQuery.ajax({
			type: "post",
			dataType: "json",
			url: data_object.ajax_url,
			data: {
				action: "da_gen_check",
				word: $(this).val()
			},
			success: function (res) {
				$pass.next().text(res.score + ":" + res.score_label);
			}
		});
	});
});