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
							<input id="doSubmit" type="submit" value="SEND">
						</form>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
       </div>
	</div>
 <!--//contact-->
<script>
window.onload = function(){
$("form#formUpload").submit(function(event){
	
	var nama = $('#name').val();
	var pesan = $('#pesan').val();
	var file = $('#buktipembayaran').val();

	if(nama == ''){
		bootbox.alert("gagal nama tidak boleh kosong!");
		return false;
	}
	else if(pesan == ''){
		bootbox.alert("gagal pesan tidak boleh kosong!");
		return false;
	}
	else if(file == ''){
		bootbox.alert("gagal file tidak boleh kosong!");
		return false;
	}
	event.preventDefault();
	var dataVal = new FormData($(this)[0]);
	//alert('aa');
	//var dataVal=$('#tambahProduk').serialize();
	$.ajax({
		url :'<?php echo base_url();?>index.php/user/welcome/sendUploadPembayaran', 
		type: "post", //form method
		data: dataVal,
		contentType: false,
		processData: false,
		dataType:"json", //misal kita ingin format datanya brupa json
		success:function(result){
			console.log(result);
			if(result.code==1){
				$('#formUpload')[0].reset();
				bootbox.alert(result.massage);
			}else{
			   bootbox.alert(result.massage);
			}
		}
	});
});
}

</script>