<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
   <!--/contact-->
   <div class="banner_bottom_agile_info">
	<div class="container">
	   <div class="agile-contact-grids">
				<div class="agile-contact-left">
					<div class="col-md-12 address-grid ">
						<h4>Form Pengiriman</h4>
						<div id="info"></div>
						<div id="order_detail"></div>
						<?php 
						$contents=$this->cart->contents(); 
						if(!empty($contents)){ ?>
						<br/> 
						<div class="col-md-6 modal_body_left modal_body_left1"> 
							<div class="info_form" id="info_form"></div>
							<form id="formData" action="javascript:void(0)">
								<div class="form-group row">
								  <label for="example-text-input" class="col-2 col-form-label">Nama Penerima</label>
								  <div class="col-10">
									<input class="form-control" type="text" name="nama_penerima" id="nama_penerima">
								  </div>
								</div>
								<div class="form-group row">
								  <label for="example-search-input" class="col-2 col-form-label">Alamat</label>
								  <div class="col-10">
									<input class="form-control" type="text" name="alamat" id="alamat">
								  </div>
								</div>
								<div class="form-group row">
								  <label for="example-search-input" class="col-2 col-form-label">Provinsi</label>
								  <div class="col-10">
									<select class="form-control" name="provinsi_tujuan" id="provinsi_tujuan">
										<option value="" selected="" disabled="">Pilih Provinsi</option> 
									</select> 
									<input type="hidden" id="provinsi_penerima" name="provinsi_penerima"/>
								  </div>
								</div>
								<div class="form-group row">
								  <label for="example-email-input" class="col-2 col-form-label">Kota</label>
								  <div class="col-10"> 
									<select class="form-control" name="destination" id="destination" onchange="tampil_data()">
										<option value="" selected="" disabled="">Pilih Kota</option>
									</select>
									<input type="hidden" id="kota_penerima" name="kota_penerima"/>
								  </div>
								</div>
								<div class="form-group row">
								  <label for="example-email-input" class="col-2 col-form-label">Kode Pos</label>
								  <div class="col-10">
									<input class="form-control" type="text" name="kode_pos" id="kode_pos">
								  </div>
								</div>
								<div class="form-group row">
								  <label for="example-email-input" class="col-2 col-form-label">No telepon</label>
								  <div class="col-10">
									<input class="form-control" type="text" name="no_tlp" id="no_tlp">
								  </div>
								</div>
								<div class="form-group row">
								  <label for="example-email-input" class="col-2 col-form-label">Ongkos Kirim</label>
								  <div class="col-10">
									<div id="hasil" style="color:red"><strong>Rp. 0</strong></div>
									<input type="hidden" id="ongkir" name="ongkir"/>
								  </div>
								</div>
								<div class="form-group row">
									<input onclick="submit_pengirim();" type="submit" value="Checkout" class="button btn btn-success">
									<a href="<?php echo base_url();?>index.php/user/order/cart" class="button btn btn-default">Lihat cart</a>
								</div>
							</form>  
						</div>
						<div class="clearfix"></div>
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
							</tr>
							<?php  
								$total=0;
								$total_barang=0;
								$i=0;
								
								foreach ($contents as $items){
									$i++;
									$total+=$items['subtotal'];
									$total_barang+=$items['qty'];
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
							</tr>	
							<?php	} //end custom
								} //end foreach
							?>
							<tr>
								<td colspan="7"><b>Total</b></td>
								<td><b>Rp. <?php echo number_format($total,2,'.',',');?></b></td>
							</tr>
						</table>
						<input type="hidden" id="total_barang" value="<?php echo ($total_barang*1000);?>" name="total_barang"/>
						<?php }else{
							echo '<br/><br/></br/><h5>Keranjang masih kosong.</h5>';
						} ?>
					</div>
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
function tampil_data(){ 
  var x = $('#destination').val();
  var y = $('#total_barang').val(); 
	
  $.ajax({
	  url: "<?php echo base_url();?>index.php/user/order/getCost",
	  type: "GET",
	  dataType: 'json',
	  data : { destination: x, berat: y },
	  success: function (ajaxData){
		  if(ajaxData.rajaongkir.status.description=='OK'){ 
			ongkir=ajaxData.rajaongkir.results[0].costs[1].cost[0].value;
			estimasi=ajaxData.rajaongkir.results[0].costs[1].cost[0].etd;  
			
			$("#hasil").html("<strong style='color:red'>Rp. "+ongkir+" , Estimasi: "+estimasi+" hari, Via: JNE</strong>");
			$("#ongkir").val(ongkir);
		  }
	  }
  });
}
function submit_pengirim(){
	conf=confirm("Apakah data yang dimasukkan sudah benar?");
	if(conf){
		 var formData = $('#formData').serialize();
		 $.ajax({
		  method: "POST",
		  url: "<?php echo base_url();?>index.php/user/order/checkout",
		  data: formData,
		  dataType:"json",
		  success: function(data){
			  if(data.message=="1"){
				  $('#order_detail').remove();
					$('#info').html('<div class="alert alert-success">Terima kasih telah melakukan pemesanan, Nomor Transaksi anda: <strong>'+data.trx+'</strong>.<br/> Detail pemesanan dapat dilihat pada menu order anda.</div>');
					
				}else{
					$('#info').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+msg+'</div>');
				}
		  }
		});
	}
}
$(document).ready(function(){ 
	$.ajax({ 
		type: 'GET', 
		url: '<?php echo base_url(); ?>index.php/user/order/getProvince/', 
		data: { }, 
		dataType: 'json',
		success: function (data) {  
			if(data.rajaongkir.status.description=='OK'){
				
				prov=data.rajaongkir.results;
				$.each(prov, function(index, element) {  
					 $('#provinsi_tujuan').append("<option value='"+element.province_id+"'>"+element.province+"</option>");   
				});
			}
			
		}
	});  
	$("#provinsi_tujuan").click(function(){
		$.post("<?php echo base_url(); ?>index.php/user/order/getCity/"+$('#provinsi_tujuan').val(),function(obj){
			$('#destination').html(obj);
		});
		
	}); 
	
});
</script>