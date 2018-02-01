  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="container">
         <!-- mens -->
		<div class="single-pro">
		<?php foreach ($data as $value) {
			// print_r($value);
			?>
			<div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem">
						<a href="<?php echo base_url().'index.php/user/welcome/detailProdukDefault/'.$value['ID']?>"><img src="<?php echo base_url();?>aset/upload/<?php echo $value['GAMBAR1']?> " alt="" class="pro-image-front"></a>
					<!--div class="men-thumb-item">
						<img src="<?php echo base_url();?>aset/upload/<?php echo $value['GAMBAR1']?>" alt="" class="pro-image-back">
							<div class="men-cart-pro">
								<!--div class="inner-men-cart-pro">
									<a href="<?php echo base_url().'index.php/user/welcome/detailProdukDefault/'.$value['ID']?>" class="link-product-add-cart">Quick View</a>
								</div-->
							<!--/div-->
							<!--span class="product-new-top">New</span-->
					<!--/div-->
					<div class="item-info-product ">
						<h4><a href="<?php echo base_url().'index.php/user/welcome/detailProdukDefault/'.$value['ID']?>">"<?php echo $value['NAMA_PRODUK']?>"</a></h4>
						<div class="info-product-price">
							<span class="item_price"><?php echo $value['HARGA']?>"</span>
						</div>
					</div>
				</div>
			</div>
		<?php }?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>	
