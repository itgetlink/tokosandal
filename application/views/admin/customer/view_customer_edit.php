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
		 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">From Customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="tambahCustomer" action="javascript:void(0)">
              <div class="box-body">
                
				<div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="nama" name="nama" placeholder="nama" type="text" value="<?php echo $data[0]['NAMA_CUSTOMER']?>" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="alamat" class="col-sm-2 control-label">Alamat</label>
				  <div class="col-sm-10">
					<textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Enter ..."><?php echo $data[0]['ALAMAT']?></textarea>
				  </div>
                </div>
				<div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="username" name="username" placeholder="username" type="text" value="<?php echo $data[0]['USERNAME']?>"/>
                  </div>
                </div>
				<div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="password" name="password" placeholder="password" type="text"/>
                  </div>
                </div>
				<div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="email" name="email" placeholder="email" type="text" value="<?php echo $data[0]['EMAIL']?>" />
                  </div>
                </div>
			  </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!--button type="submit" class="btn btn-default">Cancel</button-->
                <div id="fildButton">
					<button type="button" id="listCustomer" class="btn btn-default" onclick="showCustomer();">List Customer</button>
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
$("form#tambahCustomer").submit(function(event){
	event.preventDefault();
	var dataVal=$('#tambahCustomer').serialize();
	$.ajax({
		url :'<?php echo base_url();?>admin/customer/update', 
		type: "post", //form method
		data: dataVal,
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
				$('#tambahCustomer')[0].reset();
				bootbox.alert(result.massage);
			}else{
			   bootbox.alert(result.massage);
			}
		}
	});
})

function showCustomer(){
	window.location = "<?php echo base_url();?>admin/customer/index";
}

</script>