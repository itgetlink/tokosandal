<style>
.resp-tabs-container
{
  height:300px;
  width:auto;
  overflow:auto;
}
</style>
  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					
					<ul class="slides">
						<li data-thumb="<?php echo base_url();?>aset/upload/<?php echo $data[0]['GAMBAR1']?>">
							<div class="thumb-image"> <img src="<?php echo base_url();?>aset/upload/<?php echo $data[0]['GAMBAR1']?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb="<?php echo base_url();?>aset/upload/<?php echo $data[0]['GAMBAR2']?>">
							<div class="thumb-image"> <img src="<?php echo base_url();?>aset/upload/<?php echo $data[0]['GAMBAR2']?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>	
						<li data-thumb="<?php echo base_url();?>aset/upload/<?php echo $data[0]['GAMBAR3']?>">
							<div class="thumb-image"> <img src="<?php echo base_url();?>aset/upload/<?php echo $data[0]['GAMBAR3']?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
					<h3><?php echo $data[0]['NAMA_PRODUK'];?></h3>
					<?php
					//$contents=$this->cart->contents(); 
					//print_r($contents);
					?>
					<p><span class="item_price">Rp.<?php echo number_format($data[0]['HARGA'],2,'.',',');?></span></p>
					<form id="form_cart">
					<input type="hidden" name="id" value="<?php echo $data[0]['ID'];?>">
					<?php 
					if($data[0]['TYPE_PRODUK']==1){
						if(count($data_stok)>0){?>
						<div>Ukuran : <span><select name="ukuran" id="ukuran" onchange="change_ukuran(this.value)">
							<option value="ukur">Ukuran</option>
							<?php foreach($data_stok as $value){ ?>
								<option value="<?php echo $value['ID'].'-'.$value['STOK'];?>"><?php echo $value['UKURAN'];?></option>
							<?php } ?>
						</select></span></div>
						
						<div id="jumlah"></div>
						<div id="input_jumlah"></div>
						<?php }else{
							echo 'Stok habis';
						}
					?>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
								<fieldset><input type="button" name="submit" value="Add to cart" class="button" onclick="submit_cart()">
								</fieldset>
						</div>
					</div>
					<?php } //end default
					if($data[0]['TYPE_PRODUK']==2){?>
					<div>Ukuran : 
						<!--input type="number" name="ukuran" id="ukuran"-->
						<select name="tali_depan" id="tali_depan">
							<option value="">Ukuran</option>
							<?php
							$arrsize=array('37','38','39','40','41','42','43','44','45','46');
							foreach($arrsize as $size){
								echo '<option value="'.$size.'">'.$size.'</option>';
							}
							?>
						</select>
					</div>
					<br/>
					<div>Tali Depan : 
						<select name="tali_depan" id="tali_depan">
							<option value="">Tali Depan</option>
							<?php
							$arrwarna=array('Abu','Biru','Hijau','Kuning','Merah1');
							foreach($arrwarna as $warna_depan){
								echo '<option value="'.$warna_depan.'">'.$warna_depan.'</option>';
							}
							?>
						</select>
					</div>
					<br/>
					<div>Tali Tengah : 
						<select name="tali_tengah" id="tali_tengah">
							<option value="">Tali Tengah</option>
							<?php
							$arrwarna=array('Abu','Biru','Hijau','Kuning','Merah');
							foreach($arrwarna as $warna_tengah){
								echo '<option value="'.$warna_tengah.'">'.$warna_tengah.'</option>';
							}
							?>
						</select>
					</div>
					<br/>
					<div>Tali Belakang : 
						<select name="tali_belakang" id="tali_belakang">
							<option value="">Tali Belakang</option>
							<?php
							$arrwarna=array('Abu','Biru','Hijau','Kuning','Merah');
							foreach($arrwarna as $warna_belakang){
								echo '<option value="'.$warna_belakang.'">'.$warna_belakang.'</option>';
							}
							?>
						</select>
					</div>
					<br/>
					<div>Jumlah : 
						<input type="number" name="qty" id="qty" value="1" style="width: 50px;" min="0">
					</div>
					<br/>
					<div>Keterangan : 
						<textarea name="keterangan" id="keterangan" class="form-control"></textarea>
					</div>
					<br/>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
								<fieldset><input type="button" name="submit" value="Add to cart" class="button" onclick="submit_cart_cust()">
								</fieldset>
						</div>
					</div>
					<?php }
					?>
					</form>
					<!-- /new_arrivals --> 
					<div class="responsive_tabs_agileits"> 
						<div id="horizontalTab">
								<ul class="resp-tabs-list">
									<li>Description</li>
								</ul>
							<div class="resp-tabs-container">
							<!--/tab_one-->
							   <div class="tab1">
									<div class="single_page_agile_its_w3ls">
									  <?php echo $data[0]['KETERANGAN'];?>
									</div>
								</div>
							</div>
						</div>	
					</div>
				<!-- //new_arrivals --> 
			  </div>
	 		
			<div class="clearfix"> </div>
	  	<!--/slider_owl-->
	
			</div>
 </div>
<!--//single_page-->
<script>
function change_ukuran(val){
	var value = val.split("-");
	$('#jumlah').html('Sisa stok: '+value[1]);
	$('#input_jumlah').html('Loading..');
	
	st=parseInt(value[1]);
	if(st>0){
		ij='Jumlah: <select name="qty" id="qty">';
	
		for(i=1;i<=st;i++){
			ij+='<option value="'+i+'">'+i+'</option>';
		}
		ij+='</select>';
		$('#input_jumlah').html(''+ij);
	}else{
		$('#input_jumlah').html('Stok habis <input type="hidden" name="qty" id="qty" value="0"/>');
	}
	
}
function submit_cart(){
	formData = $('#form_cart').serialize();
	uku=$('#ukuran').val();
	qty=parseInt($('#qty').val());
	if(uku=='ukur'){
		alert("Ukuran Belum dipilih");
	}else{
		if(qty==0){
			alert("Stok habis");
		}else{
			$.ajax({
		  	method: "POST",
		  	url: "<?php echo base_url();?>index.php/user/order/input_order",
		  	data: formData+"&ket=1",
		  	dataType:"json",
		  	success: function(msg){
			  if(msg==1){
					bootbox.alert( "sukses" );
					setTimeout(function(){ location.reload(true);},1500);
				}else{
					bootbox.alert('gagal: '+msg);
				}
		  	}
			});
		}
	}
}
function submit_cart_cust(){
	formData = $('#form_cart').serialize();
	
	uk=parseInt($('#ukuran').val());
	dpn=$('#tali_depan').val();
	tengah=$('#tali_tengah').val();
	belakang=$('#tali_belakang').val();
	qty=parseInt($('#qty').val());
	
	if(qty<1){
		alert("Masukkan jumlah order");
	}else if(uk<1){
		alert("Masukkan ukuran");
	}else if(dpn=='' || tengah=='' || belakang==''){
		alert("Pilih warna tali");
	}else{
		$.ajax({
		  method: "POST",
		  url: "<?php echo base_url();?>index.php/user/order/input_order_custom",
		  data: formData+"&ket=1",
		  dataType:"json",
		  success: function(msg){
			  if(msg==1){
					bootbox.alert( "sukses" );
					setTimeout(function(){ location.reload(true);},1500);
				}else{
					bootbox.alert('gagal: '+msg);
				}
		  }
		});
	}
}
</script>