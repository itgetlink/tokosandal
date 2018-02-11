<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Buat Pesan Baru</h3>
            </div>
			<form id="formContact" action="javascript:void(0)">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <input class="form-control" id="email" name="email" placeholder="To:" value="<?php echo $email;?>">
              </div>
              <div class="form-group">
                <input class="form-control" id="subject" name="subject" placeholder="Subject:">
              </div>
              <div class="form-group">
                    <textarea id="message"  name="message" class="form-control" style="height: 300px"></textarea>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="submit" onclick="sendMail()" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
              </div>
              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
            </div>
            <!-- /.box-footer -->
			</form>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<script>
  $(function () {
    //Add text editor
    $("#message").wysihtml5();
  });
  
   function sendMail(){
	var dataVal = $('#formContact').serialize();
	$.ajax({
		url :'<?php echo base_url();?>index.php/admin/contact/sendMail', 
		type: "post", //form method
		data: dataVal,
		dataType:"json", //misal kita ingin format datanya brupa json
		beforeSend:function(){
		},
		success:function(result){
			console.log(result);
			if(result.code==1){
				$('#formContact')[0].reset();
				bootbox.alert(result.massage);
				// window.location = "<?php echo base_url();?>index.php/admin/produk/index";
			}else{
			   bootbox.alert(result.massage);
			}
		}
	});
}
</script>
</script>
