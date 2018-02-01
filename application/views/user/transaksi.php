
  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
		<div class="container">
			 <!-- mens -->
			 <div class="agile-contact-grids">
				 <div class="agile-contact-left">
					 <div class="col-md-12 address-grid">
					 <h4>TRANSAKSI</h4>
						<div class="single-pro">
							<table class="table">
								<tr>
									<th>No</th>
									<th>tanggal</th>
									<th>nama penerima</th>
									<th>alamat penerima</th>
									<th>no telepon</th>				
									<th>STATUS</th>				
									<th>Aksi</th>
								</tr>
								<?php 
								$no = 1;
								foreach ($data as $items){?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $items['TGL_TRANSAKSI'];?></td>
									<td><?php echo $items['NAMA_PENERIMA'];?></td>
									<td><?php echo $items['PROVINSI_PENERIMA'].','.$items['KOTA_PENERIMA'].','.$items['ALAMAT_PENERIMA'].','.$items['KODEPOS_PENERIMA'];?></td>
									<td><?php echo $items['NOTLP_PENERIMA'];?></td>
									<td><?php echo $items['STATUS_TRANSAKSI'];?></td>
									<td><a href="<?php echo base_url().'index.php/user/order/listOrderDetail/'.$items['ID']?>">detail</a></td>
								</tr>
								<?php 
								$no++;
								} ?>
							</table>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	


