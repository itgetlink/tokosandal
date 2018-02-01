
  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="container">
         <!-- mens -->
		 <div class="agile-contact-grids">
			 <div class="agile-contact-left">
				 <div class="col-md-12 address-grid">
					<h4>DETAIL TRANSAKSI</h4>
					<div class="single-pro">
					<button type="button" class="btn btn-primary" onclick="formTambahProduk()">Tambah</button>
						<br/>
						<br/>
						<table class="table">
							<tr>
								<th>No</th>
								<th>Gambar</th>
								<th>HARGA</th>
								<th>JUMLAH</th>
								<th>SUBTOTAL</th>				
								<th>KETERANGAN</th>
							</tr>
							<?php 
							$no = 1;
							foreach ($data as $items){?>
							<tr>
								<td><?php echo $no;?></td>
								<td>
								<img src="<?php echo base_url();?>aset/upload/<?php echo $items['GAMBAR1']?>" width="50px" height="50px"> </td>
								<td><?php echo $items['HARGA'];?></td>
								<td><?php echo $items['JUMLAH'];?></td>
								<td><?php echo $items['SUBTOTAL'];?></td>
								<td><?php echo $items['KETERANGAN'];?></a></td>
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


