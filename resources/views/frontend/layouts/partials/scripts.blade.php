
<!-- Javascript & jquery file --> 
<script type="text/javascript" src="{{ asset('public/js/jquery-3.3.1.min.js') }}"></script> 

<!-- Popper JS For Dropdown Script  --> 
<script type="text/javascript" src="{{ asset('public/js/popper.min.js') }}"></script>  

<!-- Bootstrap Script  --> 
<script type="text/javascript" src="{{ asset('public/js/bootstrap.min.js') }}"></script>

<!-- Carousel Script  --> 
<script type="text/javascript" src="{{ asset('public/js/owl.carousel.min.js') }}"></script> 
<!-- Select2 Script  --> 
<script type="text/javascript" src="{{ asset('public/js/select2.min.js') }}"></script> 


<!-- Datetime Picker JS Script  --> 
{{-- <script type="text/javascript" src="{{ asset('public/js/bootstrap-datepicker.js') }}"></script>  --}}
<script type="text/javascript" src="{{ asset('public/js/jquery-ui.min.js') }}"></script> 


<!-- CkEditor Script Script  --> 
<script type="text/javascript" src="{{ asset('public/js/ckeditor.js') }}"></script> 
<style>
	.ck-editor__editable_inline {
		min-height: 100px;
		text-align: left;
		max-height: 100px;
	}
	.ck-content p {
		line-height: 5px;
	}
	.ck-content ol {
	    list-style: decimal;
	}
	.ck-content ul {
	    list-style: disc;
	}
</style>
<script>
	$('#jobSeekerSignupForm').on('submit', function(event){
		event.preventDefault();

		// return 
		var formAction = $(this).attr("action");
	
		$.ajax({
			url: formAction,
			method:"POST",
			data: new FormData(this),
			contentType: false,
			cache:false,
			processData: false,
			dataType:"json",
			success:function(data)
			{
				// dd(data);
	
				var html = '';
				if(data.errors)
				{
					html = '<div class="alert alert-danger">';
					for(var count = 0; count < data.errors.length; count++){
						html += '<p>' + data.errors[count] + '</p>';
					}
					html += '</div>';
				}
				if(data.success)
				{
					html = '<div class="alert alert-success">' + data.success + '</div>';
					$('#jobSeekerSignupForm')[0].reset();
					// $('#jobSeekerSignupForm').DataTable().ajax.reload();
				}
				// alert(html);
				$('#form_result').html(html);
			}
		});
	});
</script>
	{{-- <script>
		$('#jobSeekerLoginForm').on('submit', function(event){
			event.preventDefault();
			// alert("ddd");

			// return 
			var formAction = $(this).attr("action");
	  
			$.ajax({
				url: formAction,
				method:"POST",
				data: new FormData(this),
				contentType: false,
				cache:false,
				processData: false,
				dataType:"json",
				success:function(data)
				{
					//  console.log(data);
	  
					var html = '';
					if(data.errors)
					{
						html = '<div class="alert alert-danger">';
						for(var count = 0; count < data.errors.length; count++){
						  html += '<p>' + data.errors[count] + '</p>';
						}
						html += '</div>';
					}
					if(data.success)
					{
						html = '<div class="alert alert-success">' + data.success + '</div>';
						$('#jobSeekerLoginForm')[0].reset();
						// $('#jobSeekerSignupForm').DataTable().ajax.reload();
					}
					// alert(html);
					$('#login_form_result').html(html);
				}
			});
		});
	</script> --}}
<!-- Active Script  --> 
<script type="text/javascript" src="{{ asset('public/js/plugin.js') }}?v={{ config('constants.asset_version') }}"></script>