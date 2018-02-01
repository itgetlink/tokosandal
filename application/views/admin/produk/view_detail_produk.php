 
<!-- Content Header (Page header) -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Detail Produk</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
		  <!---Content----------------->
		  <button type="button" class="btn btn-primary" onclick="tambahStok()">Tambah Ukuran</button>
		  	<br/>
				<br/>
		   <!-- /.box-header -->
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Gambar</th>
                  <th>Ukuran</th>
                  <th>Stok</th>
                  <th>Edit Produk</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                
              </table>
			<!-- /.box-body -->
          
		  <!---Content----------------->
		  
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

	   <!-- .modal -->
	  <div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel">Update stok</h4>
			  </div>
			  <div class="modal-body">
				<form>
				  <div class="form-group">
					<input type="hidden" class="form-control" id="id">
					<label for="ukuran" class="control-label">Ukuran</label>
					<input type="text" class="form-control" id="ukuran">
				  </div>
				  <div class="form-group">
					<label for="stok" class="control-label">Stok</label>
					<input type="text" class="form-control" id="stok">
				  </div>
				</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="updateStok()">Update</button>
			  </div>
			</div>
		  </div>
		 </div>
        <!-- /.modal -->
		
		<!-- .modal -->
	  <div class="modal fade" data-backdrop="static" id="tambahStokBaru" tabindex="-1" role="dialog" aria-labelledby="tambahStokBaru">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title" id="tambahStokBaruLabel">Tambah Stok Baru</h4>
			  </div>
			  <div class="modal-body">
				<form>
				  <div class="form-group">
					<label for="nama" class="control-label">Produk</label>
					<input type="text" class="form-control" id="idProduk" value="<?php echo $id ?>">
				  </div>
				  <div class="form-group">
					<label for="ukuran" class="control-label">Ukuran</label>
					<input type="text" class="form-control" id="addukuran">
				  </div>
				  <div class="form-group">
					<label for="stok" class="control-label">Stok</label>
					<input type="text" class="form-control" id="addstok">
				  </div>
				</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="addStok()">Update</button>
			  </div>
			</div>
		  </div>
		 </div>
        <!-- /.modal -->
<script>
$( document ).ready(function() {
    console.log( "ready!" );
	 $("#example1").DataTable();
	 list_data();
});

	/* function formTambahProduk(){
		location.href="<?php echo base_url();?>admin/produk/formProduk";
	} */
	
	function list_data(){
		$('#example1').DataTable().destroy();
		table = $('#example1').DataTable({ 

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('admin/produk/ajax_list_detail')?>",
				"type": "POST",
				"data": {
					"ID" : "<?php echo $id?>"
				}
			},

			//Set column definition initialisation properties.
			 
			"columnDefs": [ {
			  "targets": 0,
			  "searchable": false
			} ]
			/* "columnDefs": [
			{ 
				"targets": [ 0 ], //first column / numbering column
				"orderable": false, //set not orderable
			},
			], */

		});
	}
	
	function show_edit(id){
		location.href="<?php echo base_url();?>admin/produk/formEdit/"+id;
	}
	
	function show_update(id){
		
		$.ajax({
			url :'<?php echo base_url();?>admin/produk/loadStok', 
			type: "post", //form method
			data: {
				id : id
			},
			dataType:"json", //misal kita ingin format datanya brupa json
			beforeSend:function(){
				// $('#spinner').show();
				// $('#fildButton').hide();
				$('#id').val('');
				$('#ukuran').val('');
				$('#stok').val('');
			},
			success:function(result){
				console.log(result);
				$('#id').val(result.ID);
				$('#ukuran').val(result.UKURAN);
				$('#stok').val(result.STOK);
				
			}
		});
		
		$('#exampleModal').modal('show');
	}
	
	function updateStok(){
		var id 		= $('#id').val();
		var ukuran 	= $('#ukuran').val();
		var stok	= $('#stok').val();
		$.ajax({
			url :'<?php echo base_url();?>admin/produk/updateDetail', 
			type: "post", //form method
			data: {
				id : id,
				ukuran : ukuran,
				stok : stok,
			},
			dataType:"json", //misal kita ingin format datanya brupa json
			beforeSend:function(){
				// $('#spinner').show();
				// $('#fildButton').hide();
			},
			success:function(result){
				console.log(result);
				if(result.code==1){
					bootbox.alert(result.massage);
					$('#exampleModal').modal('hide');
					list_data();
				}else{
				   bootbox.alert(result.massage);
				}
			}
		});
	}
	
	function tambahStok(){
		$('#tambahStokBaru').modal('show');
	}
		
	function addStok(){
		var idProduk 	= $('#idProduk').val();
		var addukuran 	= $('#addukuran').val();
		var addstok		= $('#addstok').val();
		$.ajax({
			url :'<?php echo base_url();?>admin/produk/saveDetail', 
			type: "post", //form method
			data: {
				idProduk : idProduk,
				addukuran : addukuran,
				addstok : addstok,
			},
			dataType:"json", //misal kita ingin format datanya brupa json
			beforeSend:function(){
				// $('#spinner').show();
				// $('#fildButton').hide();
			},
			success:function(result){
				console.log(result);
				if(result.code==1){
					bootbox.alert(result.massage);
					$('#tambahStokBaru').modal('hide');
					list_data();
				}else{
				   bootbox.alert(result.massage);
				}
			}
		});
	}
</script>