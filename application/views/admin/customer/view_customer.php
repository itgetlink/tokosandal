<!-- Content Header (Page header) -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Customer</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
		  <!---Content----------------->
		  <button type="button" class="btn btn-primary" onclick="formTambahCustomer()">Tambah</button>
				<br/>
				<br/>
		   <!-- /.box-header -->
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Customer</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Edit Customer</th>
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

<script>
$( document ).ready(function() {
    console.log( "ready!" );
	 $("#example1").DataTable();
	 list_data();
});

	function formTambahCustomer(){
		location.href="<?php echo base_url();?>index.php/admin/customer/formCustomer";
	}
	
	function list_data(){
		$('#example1').DataTable().destroy();
		table = $('#example1').DataTable({ 

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('index.php/admin/customer/ajax_list')?>",
				"type": "POST"
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
		location.href="<?php echo base_url();?>index.php/admin/customer/formEdit/"+id;
	}
	
</script>