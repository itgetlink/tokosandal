   <!--/contact-->
   <div class="banner_bottom_agile_info">
	<div class="container">
	   <div class="agile-contact-grids">
				<div class="agile-contact-left">
					<div class="col-md-6 contact-form">
						<h4 class="white-w3ls">Upload</h4>
						<form id="formUpload" action="javascript:void(0)">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="nama" id="name" required="">
								<label>Nama</label>
								<span></span>
							</div>
							<div class="styled-input">
								<textarea name="pesan" id="pesan" required=""></textarea>
								<label>Pesan</label>
								<span></span>
							</div>
						    <input id="buktipembayaran" name="buktipembayaran" type="file" style="color:#ffffff;"></br>	 
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
	var dataVal = $('#formUpload').serialize();
	$.ajax({
		url :'<?php echo base_url();?>index.php/user/welcome/sendUploadPembayaran', 
		type: "post", //form method
		data: dataVal,
		dataType:"json", //misal kita ingin format datanya brupa json
		beforeSend:function(){
		},
		success:function(result){
			console.log(result);
			if(result.code==1){
				$('#formUpload')[0].reset();
				bootbox.alert(result.massage);
				// window.location = "<?php echo base_url();?>admin/produk/index";
			}else{
			   bootbox.alert(result.massage);
			}
		}
	});
}
</script>