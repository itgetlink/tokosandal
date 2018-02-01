<!-- Content Header (Page header) -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Produk</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
		  <!---Content----------------->
		 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">From Produk</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="tambahProduk" action="javascript:void(0)">
              <div class="box-body">
                
				<div class="form-group">
                  <label for="typeProduk" class="col-sm-2 control-label">Type Produk</label>
					<div class="col-sm-10">
					  <select class="form-control" id="typeProduk" name="typeProduk">
						<option value="">-PILIH TYPE SANDAL-</option>
						<?php 
						foreach($type as $val){
						?>
						<option value="<?php echo $val['ID']?>"><?php echo $val['NAMA_TYPE']?></option>
						<?php } ?>
					  </select>
					</div>
                </div>
                <div class="form-group">
                  <label for="namaProduk" class="col-sm-2 control-label">Nama Produk</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="namaProduk" name="namaProduk" placeholder="namaProduk" type="text"/>
                  </div>
                </div>
				<div class="form-group">
                  <label for="hargaProduk" class="col-sm-2 control-label">Harga Produk</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="hargaProduk" name="hargaProduk" placeholder="hargaProduk" type="text"/>
                  </div>
                </div>
				<div class="form-group">
                  <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
				  <div class="col-sm-10">
					<textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Enter ..."></textarea>
				  </div>
                </div>
				<div class="form-group">
                  <label for="gambar1" class="col-sm-2 control-label">Upload Ganbar 1</label>
					<div class="col-sm-10">
						<input id="gambar1" name="gambar1" type="file">
					</div>
                </div>
				<div class="form-group">
                  <label for="gambar2" class="col-sm-2 control-label">Upload Ganbar 2</label>
					<div class="col-sm-10">
						<input id="gambar2" name="gambar2" type="file">
					</div>
                </div>
				<div class="form-group">
                  <label for="gambar3" class="col-sm-2 control-label">Upload Ganbar 3</label>
					<div class="col-sm-10">
						<input id="gambar3" name="gambar3" type="file">
					</div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!--button type="submit" class="btn btn-default">Cancel</button-->
                <div id="fildButton">
					<button type="button" id="listProduk" class="btn btn-default" onclick="showProduk();">List Produk</button>
					<button type="submit" id="doSubmit" class="btn btn-primary pull-right" >simpan</button>
				</div>
				
				<i id="spinner" class="fa fa-spinner fa-spin pull-right" ></i>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
		  
		  <!---Content----------------->
		  
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

<script>
$(document).ready(function() {
    console.log( "ready!" );
	$('#spinner').hide();
	//aa();	
});

// function save(){
$("form#tambahProduk").submit(function(event){
	var type = $('#typeProduk').val();
	var nama = $('#namaProduk').val();
	var keterangan = $('#keterangan').val();
	var gambar = $('#gambar').val();
	if(type == ''){
		bootbox.alert("gagal type tidak boleh kosong!");
		return false;
	}
	else if(nama == ''){
		bootbox.alert("gagal nama tidak boleh kosong!");
		return false;
	}
	else if(keterangan == ''){
		bootbox.alert("gagal keterangan tidak boleh kosong!");
		return false;
	}
	else if(gambar == ''){
		bootbox.alert("gagal file tidak boleh kosong!");
		return false;
	}
	event.preventDefault();
	var dataVal = new FormData($(this)[0]);
	//alert('aa');
	//var dataVal=$('#tambahProduk').serialize();
	$.ajax({
		url :'<?php echo base_url();?>admin/produk/tambahProduk', 
		type: "post", //form method
		data: dataVal,
		contentType: false,
		processData: false,
		dataType:"json", //misal kita ingin format datanya brupa json
		beforeSend:function(){
			$('#spinner').show();
			$('#fildButton').hide();
		},
		success:function(result){
			console.log(result);
			$('#fildButton').show();
			$('#spinner').hide();
			if(result.code==1){
				$('#tambahProduk')[0].reset();
				bootbox.alert(result.massage);
			}else{
			   bootbox.alert(result.massage);
			}
		}
	});
})

function showProduk(){
	window.location = "<?php echo base_url();?>admin/produk/index";
}

</script>