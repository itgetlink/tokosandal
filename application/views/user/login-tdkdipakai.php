   <!--/contact-->
   <div class="banner_bottom_agile_info">
	<div class="container">
	   <div class="agile-contact-grids">
				<div class="agile-contact-left">
					<div class="col-md-6 address-grid">
						<h4>For More <span>Information</span></h4>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Telephone </p><span>+1 (100)222-23-33</span>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Mail </p><a href="mailto:info@example.com">info@example.com</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Location</p><span>7784 Diamonds street, California, US.</span>
								</div>
								<div class="clearfix"> </div>
							</div>
					</div>
					<div class="col-md-6 contact-form">
						<h4 class="white-w3ls">Contact <span>Form</span></h4>
						<form id="formContact" action="javascript:void(0)">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="name" id="name" required="">
								<label>Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="email" id="email" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="text" name="subject" id="subject" required="">
								<label>Subject</label>
								<span></span>
							</div>
							<div class="styled-input">
								<textarea name="message" id="message" required=""></textarea>
								<label>Message</label>
								<span></span>
							</div>	 
							<input onclick="send();" type="submit" value="SEND">
							
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
	var dataVal = $('#formContact').serialize();
	$.ajax({
		url :'<?php echo base_url();?>index.php/user/welcome/sendMail', 
		type: "post", //form method
		data: dataVal,
		dataType:"json", //misal kita ingin format datanya brupa json
		beforeSend:function(){
		},
		success:function(result){
			console.log(result);
			if(result.code==1){
				$('#formContact')[0].reset();
				bootbox.alert(result.massage);
				// window.location = "<?php echo base_url();?>admin/produk/index";
			}else{
			   bootbox.alert(result.massage);
			}
		}
	});
}
</script>