  <!-- banner-bootom-w3-agileits -->
<div class="row" style="margin: auto; padding-left: 30px; padding-top: 40px;">
  	<div class="col-md-4 col-sm-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">custom</h3>
			</div>
			<div class="panel-body">
				<form>
					<div class="form-group">
						<label for="sel1">Sol :</label>
						<select onchange="reload_image();" class="form-control" id="sol">
							<option value="kanawa">kanawa</option>
							<option value="karimata">karimata</option>
							<option value="kei">kei</option>
						</select>
					</div>
				</form>
				<form>
					<div class="form-group">
						<label for="sel1">Tali :</label>
						<select onchange="reload_image();" class="form-control" id="tali">
							<option value="kanawa">kanawa</option>
							<option value="karimata">karimata</option>
							<option value="kei">kei</option>
						</select>
					</div>
				</form>
				<form>
					<div class="form-group">
						<label for="sel1">Warna :</label>
						<select onchange="reload_image();" class="form-control" id="warna">
							<option value="ungu">ungu</option>
							<option value="kuning">kuning</option>
							<option value="hijau">hijau</option>
						</select>
					</div>
				</form>
				<form>
					<div class="form-group">
						<label for="sel1">Ukuran :</label>
						<select onchange="reload_image();" class="form-control" id="ukuran">
							<option value="37">37</option>
							<option value="38">38</option>
							<option value="39">39</option>
							<option value="40">40</option>
							<option value="41">41</option>
							<option value="42">42</option>
							<option value="43">43</option>
							<option value="44">44</option>
							<option value="45">45</option>
							<option value="46">46</option>
						</select>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">view</h3>
			</div>
			<div class="panel-body">
				<img id="product_image" src="<?php echo base_url();?>aset/user/images/custom/kanawa-kanawa-ungu.jpg" style="width: 230px;" class="img-responsive center-block"/>
			</div>
		</div>
	</div>
</div>
<script>
	function reload_image(){
		$('#product_image').attr('src','<?php echo base_url();?>aset/user/images/custom/' + $('#sol').val() + '-' + $('#tali').val() + '-' + $('#warna').val() + '.jpg');
	}
</script>