<? $this->load->view('includes/header'); ?>
<? $this->load->view('includes/navbar2'); ?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
            <br>
            <h1><center>NEED SUPPLY KIT</center></h1>
            <table id="roomTable" class="table table-striped table-bordered tablesorter"> 
                <thead> 
                <tr> 
                    <th>nomor ticket</th> 
                    <th>Jenis</th> 
                    <th>Deskripsi</th> 
                    <th>lampiran</th> 
                    <th>file</th> 
                    <th>Action</th> 
                </tr> 
                </thead> 
                <tbody> 
                    
                </tbody> 
            </table> 
            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#addTicketModal" >Buat Ticket</button>
            <div class="modal fade" id="addTicketModal" role="dialog" aria-labelledby="addTicketModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="addTicketModal">Tambah Ticket Baru</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div id="addSuccess" class="row" style="display: none">
                                      <div id="addSuccessMessage" class="alert alert-info text-center"></div>
                                </div>
                                <div id="addError" class="row" style="display: none">
                                      <div id="addErrorMessage" class="alert alert-danger text-center"></div>
                                </div>
                            <form class="formAddTicket" role="form" accept-charset="utf-8">
                                <div class="form-group hidden">
                                     <label>ID ticket</label>
                                     <input class="form-control" name="Roomid" type="text" placeholder="Jenis ticket" />
                                </div>
                                <div class="form-group">
                                     <label>Jenis ticket</label>
                                     <input class="form-control" name="Jenis" type="text" placeholder="Jenis ticket" />
                                </div>
                                <div class="form-group">
                                     <label>Deskripsi ticket</label>
                                     <input class="form-control" name="Deskripsi" type="text" placeholder="Deskripsi ticket" />
                                </div>
                                <div class="form-group">
                                     <label>Lampiran ticket</label>
                                     <input class="form-control" name="Lampiran" type="text" placeholder="Lampiran ticket" />
                                </div>
                                <br>
                                

                                    <div class="upload_file">
                                        <div class="form-group">
                                            <div class="col-md-6 column">
                                                <div class="form-group">
                                                    <label for="userfile"><h5>Attachment File Upload</h5></label>
                                                    <br>
                                                    <label for="title">Title</label>
                                                    <input class="form-control" type="text" name="title" id="title" value="" placeholder="Attachment title"/>
                                                </div>
                                                <input type="file" name="userfile" id="userfile" size="20" />
                                                <button class="btn btn-success btn-sm pull-right" id="upload" type="button" name="upload" id="upload" >upload</button>
                                                <br>
                                            </div>
                                            <div class="col-md-6 column">
                                                <label for="userfile"><h5>uploaded file</h5></label>
                                                <div id="files"></div>
                                                
                                            </div>
                                         </div>
                                    </div>
                                <button type="submit" id="formSubmit" class="btn btn-success btn-large pull-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
</div>
<script src="<?=base_url('assets/js/jquery.ajaxfileupload.js'); ?>"></script>

<script>
function refresh_files()
{
    $.get('./mahasiswa/files/')
    .success(function (data){
        $('#files').html(data);
    });
}
    
function loadTable()
{
    $('#roomTable tbody').fadeOut(200).empty();
    var url = '<?=site_url("mahasiswa/getTicketData"); ?>';
    $.get(url, function(data){
        var ticketData = jQuery.parseJSON(data);
        $.each(ticketData['ticketData'], function (i,d) {

           var row='<tr>';
            row+='<tr>';
           $.each(d, function(j, e) {
               if(e!=d["file"])
               {
                   row+='<td>'+e+'</td>';
                }
               else
               {
                   
               }
           })
           row+='<td><img class="img-responsive img-thumbnail img img-square" src="<?=base_url("files");?>'+'/'+ d["file"]+'" style="width:50px;height:50px;"/></td>';
            row+='<td><button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editDormModal'+d['ticketid']+'" >edit</button> <button class="btn btn-sm btn-danger delete" name="roomid" value="'+d['ticketid']+'" onclick="return test()">delete</button></td>';

           row+='</tr>';
           $('#roomTable tbody').fadeIn(1000).append(row);

        })
    }); 
};
$(function() {
    
    $('.formAddTicket').submit(function() {
      var form = $(this);
      form.children('button').prop('disabled', true);
      $('#addSucess').hide();
      $('#addError').hide();

      var faction = '<?=site_url('mahasiswa/addTicket'); ?>';
      var fdata = form.serialize();
        

      $.post(faction, fdata, function(rdata) {
          var json = jQuery.parseJSON(rdata);
          if (json.isSuccessful) {
              $('#addSuccessMessage').html(json.message);
              $('#addSuccess').show();
              loadTable();
              $('#addDormModal').modal('hide');
          } else {
              $('#addErrorMessage').html(json.message);
              $('#addError').show();
          }

          form.children('button').prop('disabled', false);
          form.children('input[name="name"]').select();
      });
          
      return false;
    });
    
	$('#upload').click(function(e) {
		e.preventDefault();
		$.ajaxFileUpload({
			url 			:'./mahasiswa/upload_file/', 
			secureuri		:false,
			fileElementId	:'userfile',
			dataType		: 'json',
			data			: {
				'title'				: $('#title').val()
			},
			success	: function (data, status)
			{
				if(data.status != 'error')
				{
					$('#files').html('<p>Reloading files...</p>');
					refresh_files();
					$('#title').val('');
				}
				alert(data.msg);
                $('#upload').html('re-upload');
			}
		});
		return false;
	});
    
     
    
});
    
$(document).ready(function() {
    loadTable();
   
});


</script>