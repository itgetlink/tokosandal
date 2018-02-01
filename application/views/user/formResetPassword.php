   <!--/contact-->
   <div class="banner_bottom_agile_info">
	<div class="container">
	   <div class="agile-contact-grids">
				<div class="agile-contact-left">
					<div class="col-md-6 contact-form">
						<h4 class="white-w3ls">Contact <span>Form</span></h4>
						<form id="form_lupaPassword" action="javascript:void(0)">
							<div class="styled-input agile-styled-input-top">
								<input type="hidden" name="id" id="id" required="" value="<?php echo $data[0]['ID']?>">
								<input type="password" name="password" id="password" required="">
								<label>New Password</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="password" name="confirmPassword" id ="confirmPassword" required=""> 
								<label>Confirm Password</label>
								<span></span>
							</div> 
							<input onclick="send();" type="submit" value="send">
						</form>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
       </div>
	</div>
 <!--//contact-->
<script>
 function send(){
	
	if($('#confirmPassword').val() != $('#password').val()){
		bootbox.alert('Password tidak cocok');
		return false;
	}
	
	//var dataVal = $('#formContact').serialize();
	$.ajax({
		url :'<?php echo base_url();?>index.php/user/welcome/resetPassword', 
		type: "post", //form method
		data: {
			password : $('#password').val(),
			id : $('#id').val()
		},
		dataType:"json", //misal kita ingin format datanya brupa json
		beforeSend:function(){
		},
		success:function(result){
			console.log(result);
			if(result.code==1){
			console.log('1');
				//$('#formContact')[0].reset();
				bootbox.alert(result.massage);
				window.location = "<?php echo base_url();?>index.php/user/welcome/index";
			}else{
			console.log('2');
			   bootbox.alert(result.massage);
			}
		}
	});
}
</script>