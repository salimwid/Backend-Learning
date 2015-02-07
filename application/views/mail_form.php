<div class="form-submit-test">
	<form id="post-form" method="post" action="<?php echo base_url();?>posting_form" class="form-test">
		First name:<br>
		<input id="first_name" type="text" class="fields" name="first_name">
		<br>
		Last name:<br>
		<input id="last_name" type="text" class="fields" name="last_name">
		<button id="post-form-btn" class="btn btn-default" type="submit"> Submit Now </button>
	</form>
	<form id="get-form" class="form-test-search">
		Search Name: <br>
		<input type="text" id="search_name" class="fields" name="search_name" placeholder="Name Search">
		<input id="name_id" type="hidden" name="nameID">
		<ul id="name_list" class="name_list">
		</ul>
	</form>
</div>

<script>
	$('#search_name').keyup(get_name);
	$('#post-form').submit(ajax_submit);
	var hello123 = "hellooooo aagaaaain";
	console.log(hello123);

	function validate_fields(form){
		var error = false;
		if (form == 'post-form') {
			if($('#first_name').val() == '' || $('#last_name').val() == '') {
				$('#post-form-btn').html( "<p>Fill in all Fields</p>" );
				$('#post-form-btn').css('background-color','red');
				error = true;
			}
		}
		return error;
	}

	function ajax_submit(){
		var hello = 'hello';
		console.log(hello);
		$form = $(this);
		$btn = $form.find('button');
		var error = validate_fields($form.attr('id'));
		if(!error){
			$btn.html('Notifying...');
			$btn.prop('disabled',true);
			$.ajax({
				url:$form.attr('action'),
				type:$form.attr('method'),
				data:$form.serialize(),
				success:function(data){
					$data = $.parseJSON(data);
					if (data == 200) {
							console.log('hey there');
							$btn.html('Notification Sent');
			 				$btn.prop('disabled',false);
			 				$('.fields').val('');
						}
					else {
							$btn.html('Error');
		 					$btn.prop('disabled',false);
					}
				},
				error:function(data){
		 				console.log(data);
		 				$btn.html('Error');
		 				$btn.prop('disabled',false);
		 		}
		 	});
		 		return false;
		 	}
		 	return false;
		}

		function get_name(){
			$object = $(this);
			$target = $object.parent().find('#name_list');
			if($object.val() == ''){
				$target.html('');
			}
			$.get(baseUrl+'search_names/'+$object.val(), {name: $object.val()}, function(data){
		  		console.log(data);
		  		$names = $.parseJSON(data);
		  		$target.html('');
		  		$.each($names,function(){
		  			$target.append($('<li data-name="'+this.first+' '+this.last+'" data-id="'+this.nameId+'"> '+this.first+' '+this.last+'</li>').click(select_name));
		  		});
		  	});
		}

		function select_name(){
			$object = $(this);
			$target = $object.parent().parent();
			$target.find('input[name="search_name"]').val($object.attr('data-name')); //$('#member-name').val($object.attr('data-name'));
			$target.find('input[name="nameID"]').val($object.attr('data-id'));
			$target.find('#name_list').html('');
		}
	</script>
</script>