      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit</h3>

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
              <h3 class="box-title">From Edit</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="editAbout" action="javascript:void(0)">
              <div class="box-body">
                
				<div class="form-group">
					<input hidden type="text" id="id" name="id" value="<?php echo $data[0]['ID']; ?>"></input>
				  </div>
                </div>
			
				<div class="form-group">
                  <label for="alamat" class="col-sm-2 control-label">Deskripsi</label>
				  <div class="col-sm-10">
					<textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Enter ...">
					<?php echo $data[0]['DESKRIPSI']; ?>
					</textarea>
				  </div>
                </div>
				
			  </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!--button type="submit" class="btn btn-default">Cancel</button-->
                <div id="fildButton">
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
$("form#editAbout").submit(function(event){
	event.preventDefault();
	var dataVal=$('#editAbout').serialize();
	console.log(dataVal);
	$.ajax({
		url :'<?php echo base_url();?>admin/about/update', 
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
				window.location = "<?php echo base_url();?>admin/about/index";
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