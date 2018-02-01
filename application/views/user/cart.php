   <!--/contact-->
   <div class="banner_bottom_agile_info">
	<div class="container">
	   <div class="agile-contact-grids">
				<div class="agile-contact-left">
					<div class="col-md-12 address-grid">
						<h4>KERANJANG BELANJA</h4>
						<?php 
						$contents=$this->cart->contents(); 
						if(!empty($contents)){ ?>
						<br/>
						<br/>
						<div class="pull-right">
						<?php 
						$session = $this->session->userdata('user_login');
						if($session){ ?>
						<a href="<?php echo base_url();?>index.php/user/order/pengiriman"><button class="button btn btn-success">Checkout</button></a>
						<?php }else{
							echo '<button class="button btn btn-success" data-toggle="modal" data-target="#myModal">Checkout</button>';
						} ?>
						<button class="button btn btn-danger" onclick="remove_cart()">Hapus keranjang</button>
						</div>
						<table class="table">
							<tr>
								<th>No</th>
								<th>Gambar</th>
								<th>Produk</th>
								<th>Ukuran</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Keterangan</th>
								<th>Subtotal</th>
								<th>Aksi</th>
							</tr>
							<?php  
								$total=0;
								
								$i=0;
								
								foreach ($contents as $items){
									$total+=$items['subtotal'];
									$i++;
									if($items['options']['custom']==0){ 
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><img width="50px" height="50px" src="<?php echo base_url();?>aset/upload/<?php echo $items['options']['img1'];?>" ></td>
								<td><?php echo $items['name'];?></td>
								<td><?php echo $items['options']['sizeasli'];?></td>
								<td>Rp. <?php echo number_format($items['price'],2,'.',',');?></td>
								<td><?php echo $items['qty'];?></td>
								<td>Default</td>
								<td>Rp. <?php echo number_format($items['subtotal'],2,'.',',');?></td> 
								<td><span class="label label-success" style="cursor: pointer;" onclick="return buy('<?php echo $items['options']['size'];?>','<?php echo $items['id'];?>','2');"><i class="fa fa-plus"></i></span> 
								<span class="label label-danger" style="cursor: pointer;" onclick="return del_product('<?php echo $items['id'];?>',1,'<?php echo $items['rowid'];?>');"><i class="fa fa-minus"></i></span></td>
							</tr>
										
							<?php	}if($items['options']['custom']==1){ //custom
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><img width="50px" height="50px" src="<?php echo base_url();?>aset/upload/<?php echo $items['options']['img1'];?>" ></td>
								<td><?php echo $items['name'];?></td>
								<td><?php echo $items['options']['sizeasli'];?></td>
								<td><?php echo number_format($items['price'],2,'.',',');?></td>
								<td><?php echo $items['qty'];?></td>
								<td><a href="javascript:void(0)" onclick="showCustom('<?php echo $items['rowid'];?>')">Detail custom</a></td>
								<td>Rp. <?php echo number_format($items['subtotal'],2,'.',',');?></td> 
								<td><span class="label label-success" style="cursor: pointer;" onclick="return buycust('<?php echo $items['options']['sizeasli'];?>','<?php echo $items['id'];?>','2');"><i class="fa fa-plus"></i></span> 
								<span class="label label-danger" style="cursor: pointer;" onclick="return del_product('<?php echo $items['id'];?>',1,'<?php echo $items['rowid'];?>');"><i class="fa fa-minus"></i></span></td>
							</tr>	
							<?php	} //end custom
								} //end foreach
							?>
							
							<tr>
								<td colspan="7"><b>Total</b></td>
								<td><b>Rp. <?php echo number_format($total,2,'.',',');?></b></td>
								<td></td>
							</tr>
						</table>
						
						<?php }else{
							echo '<br/><br/></br/><h5>Keranjang masih kosong.</h5>';
						} ?>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
       </div>
	</div>
 <!--//cart-->
 
 
 <!-- .modal -->
	  <div class="modal fade" data-backdrop="static" id="showCustom" tabindex="-1" role="dialog" aria-labelledby="showCustom">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title" id="tambahStokBaruLabel">Detail Custom</h4>
			  </div>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="ukuran" class="control-label">Tali Depan</label>
					<span id="show_depan"></span>
				  </div>
				  <div class="form-group">
					<label for="ukuran" class="control-label">Tali Tengah</label>
					<span id="show_tengah"></span>
				  </div>
				  <div class="form-group">
					<label for="ukuran" class="control-label">Tali Belakang</label>
					<span id="show_belakang"></span>
				  </div>
				  <div class="form-group">
					<label for="ukuran" class="control-label">Keterangan</label>
					<span id="show_keterangan"></span>
				  </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		 </div>
        <!-- /.modal -->
<script>
function showCustom(rowid){
	$('#showCustom').modal('show');
	$.ajax({
	  method: "POST",
	  url: "<?php echo base_url();?>index.php/user/order/show_custom",
	  data: {'rowid':rowid},
	  dataType:"json",
	  success: function(msg){
		  console.log(msg);
		  $('#show_depan').html(''+msg.options.tali_depan);
		  $('#show_tengah').html(''+msg.options.tali_tengah);
		  $('#show_belakang').html(''+msg.options.tali_belakang);
		  $('#show_keterangan').html(''+msg.options.keterangan);
	  }
	});
}
function remove_cart(){
	conf=confirm('Apakah anda yakin??');
	if(conf){
		$.ajax({
		  method: "POST",
		  url: "<?php echo base_url();?>index.php/user/order/delete_order",
		  data: {},
		  dataType:"json",
		  success: function(msg){
			  console.log(msg);
			  if(msg=="1"){
					bootbox.alert( "sukses" );
					setTimeout(function(){ location.reload();},1500);
				}else{
					bootbox.alert('gagal: '+msg);
				}
		  }
		});
	}
	return false;
}
function del_product(val,type,rowid){ 
	conf=confirm('Apakah anda yakin??');
	if(conf){
		$.post("<?php echo base_url();?>index.php/user/order/remove_order/",{'val':val,'type':type,'rowid':rowid},function(obj){
			if(obj==1){
				bootbox.alert("Sukses hapus produk.");
				setTimeout(function(){ document.location.reload(); },1500);
			}else{
				bootbox.alert("gagal hapus produk"+obj);
			}
		});
	}
}
function buy(val,prod,ket){  
	$.post("<?php echo base_url();?>index.php/user/order/input_order/",{'ukuran':val,'id':prod,'qty':'1','ket':ket},function(obj){
		if(obj==1){
			bootbox.alert("Produk telah ditambahkan.");
			setTimeout(function(){ document.location.reload(); },1500);
		}else{
			bootbox.alert("Gagal."+obj);	
		}
	}); 
}
function buycust(val,prod,ket){  
	$.post("<?php echo base_url();?>index.php/user/order/input_order_custom/",{'ukuran':val,'id':prod,'qty':'1','ket':ket},function(obj){
		if(obj==1){
			bootbox.alert("Produk telah ditambahkan.");
			setTimeout(function(){ document.location.reload(); },1500);
		}else{
			bootbox.alert("Gagal."+obj);	
		}
	});
}
 
</script>
<!-- Modal1 -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
					<div class="modal-body modal-body-sub_agile">
					<div class="col-md-12 modal_body_left modal_body_left1">
					<h3 class="agileinfo_sign">Login <span>Sekarang</span></h3>
					<div class="info_login" id="info_login"></div>
					<form id="form_login" action="javascript:void(0)">
						<div class="styled-input agile-styled-input-top">
							<input type="text" name="username" required="">
							<label>Username</label>
							<span></span>
						</div>
						<div class="styled-input">
							<input type="password" name="password" required=""> 
							<label>Password</label>
							<span></span>
						</div> 
						<input onclick="login();" type="submit" value="Login">
					</form>
					<div class="clearfix"></div>
						<p><a href="#" data-toggle="modal" data-target="#myModal2" > Buat akun</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
<!-- //Modal1 -->
<script>
function login(){
	$('#info_login').html('<div class="alert alert-warning">Loading...</div>'); 
	formData = $('#form_login').serialize();
	console.log(formData);
	$.ajax({
	  method: "POST",
	  url: "<?php echo base_url();?>index.php/user/welcome/login",
	  data: formData,
	  dataType:"html",
	  success: function(msg){
		  if(msg=="1"){
				$('#info_login').html('<div class="alert alert-success">Login berhasil</div>');
				setTimeout(function(){ window.location.href = '<?php echo base_url();?>index.php/user/order/pengiriman';},1500);
			}else{
				$('#info_login').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+msg+'</div>');
			}
	  }
	});
}
</script>