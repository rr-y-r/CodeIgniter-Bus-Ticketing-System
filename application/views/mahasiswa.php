<? $this->load->view('includes/header'); ?>
<a href="#" class="glyphicon glyphicon-th-list toogleside pull-right" id="menu-toggle"></a>
<h3 class="text-center wuaso">Sistem penguras waktu tidur</h3>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
            <div id="wrapper">

    <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <img class="img-circle img-responsive img-brand" src="<?=base_url('files/1.jpg'); ?>"/>
                <ul class="sidebar-nav">

                    <li>
                        <span class="text-success">
                            <?=anchor('admin', $this->session->userdata('email')); ?> 
                        </span>
                    </li>
                    <li>
                        <a class="text-danger" style="color:#BA1919;" href="<?=site_url('login/logout'); ?>">Logout</a>
                    </li>
                </ul>
            </div>
            <br>
            <br>
            <br>
            <br>
                
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#manual" id="manual-tab" role="tab" data-toggle="tab" aria-controls="manual" aria-expanded="true">Manual Pengguna</a>
                    </li>
                  <li role="presentation" class="">
                      <a href="#data" id="data-tab" role="tab" data-toggle="tab" aria-controls="data" aria-expanded="true">Data Ticket</a>
                    </li>
                  <li role="presentation" class="">
                      <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Tiket yang selesai di proses</a>
                    </li>
                  <!--
                    <li role="presentation" class="dropdown">
                    <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                      <li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">@fat</a></li>
                      <li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">@mdo</a></li>
                    </ul>
                  </li>
-->
                </ul>
                    
                <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="manual" aria-labelledby="manual-tab"></div>
                  <div role="tabpanel" class="tab-pane fade" id="data" aria-labelledby="data-tab">

                   <div id="notif" class="row" style="display: none">
                  <div id="notif" class="alert alert-danger text-center"></div>
            </div>
            <table id="roomTable" class="table table-hover table-striped table-condensed"> 
                <thead style="background-color:#FF6666;"> 
                <tr> 
                    <th>nomor ticket</th> 
                    <th>Jenis</th> 
                    <th>Deskripsi</th> 
                    <th>lampiran</th> 
                    <th>Status</th> 
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
                                            <div class="form-group">
                                                 <label>Jenis ticket</label>
                                                <select class="form-control" name="Jenis">
                                                    <option value="Microsoft Dreamspark">Microsoft Dreamspark</option>
                                                    <option value="Peminjaman Properti">Peminjaman Properti</option>
                                                    <option value="Lain-lain">Lain-lain</option>
                                                </select>
                                            </div>
                                            <div class="form-group">

                                                  <label>Deskripsi ticket</label>
                                                  <textarea class="form-control" rows="3" name="Deskripsi"></textarea>

                                            </div>
                                            <div class="form-group">
                                                 <label>Lampiran ticket</label>

                                                <textarea class="form-control" rows="3" name="Lampiran"></textarea>
                                                <input class="form-control hidden" name="Status" type="text" value="On Progress" />
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
                                                            <button class="btn btn-success btn-sm pull-right upload" type="button" name="upload" id="upload" >upload</button>
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
                  <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                    <table id="roomTable" class="table table-hover table-striped table-condensed"> 
                <thead style="background-color:#FF6666;"> 
                <tr> 
                    <th>nomor ticket</th> 
                    <th>Jenis</th> 
                    <th>Deskripsi</th> 
                    <th>lampiran</th> 
                    <th>Status</th> 
                    <th>file</th> 
                    <th>Action</th> 
                </tr> 
                </thead> 
                <tbody> 
                    
                </tbody> 
            </table> 
                </div>
              </div>
                
           
                
                
            </div>
            <br>

            </div>
        </div>
    </div>
</div>
<script src="<?=base_url('assets/js/jquery.ajaxfileupload.js'); ?>"></script>

<script>
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
function refresh_files()
{
    $.get('./mahasiswa/files/')
    .success(function (data){
        $('#files').html(data);
    });
}
    
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

    
function loadTable()
{
    $('#roomTable tbody').fadeOut(200).empty();
    var url = '<?=site_url("mahasiswa/getTicketData"); ?>';
    $.get(url, function(data){
        var ticketData = jQuery.parseJSON(data);
        $.each(ticketData['ticketData'], function (i,d) {

           if(d["status"]=='On Progress')
            {
                var row='<tr class="danger">';
                row+='<tr class="danger">';
            }
            else
            {
                var row='<tr>';
                row+='<tr>';
            }
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
            row+='<td><button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editTicketModal'+d['ticketid']+'" onclick="return refresh_files()">edit</button> <button class="btn btn-sm btn-danger delete" name="roomid" value="'+d['ticketid']+'" onclick="return test('+d['ticketid']+')">Hapus</button></td>';

           row+='</tr>';
           $('#roomTable tbody').fadeIn(1000).append(row);

        })
    }); 
};
    
function test(x)
{
    var confMsg =  confirm("apakah kamu yakin ingin menghapus data ini ?");

    var deleteURL = '<?=site_url("mahasiswa/deleteTicket"); ?>'+'/'+x;
     if (confMsg == true)
     {
         console.log(deleteURL);
         $.post(deleteURL);
     }
    else
    {
        console.log('b');
    }
    loadTable();
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
              $('#addTicketModal').modal('hide');
          } else {
              $('#addErrorMessage').html(json.message);
              $('#addError').show();
          }

          form.children('button').prop('disabled', false);
          form.children('input[name="name"]').select();
      });
          
      return false;
    });
    
	$('.upload').click(function(e) {
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
    
    $('.formEdit').submit(function() {
      var form = $(this);
      form.children('button').prop('disabled', true);
      $('#editSucess').hide();
      $('#editError').hide();

      var faction = '<?=site_url('mahasiswa/editTicket'); ?>';
      var fdata = form.serialize();

      $.post(faction, fdata, function(rdata) {
          var json = jQuery.parseJSON(rdata);
          if (json.isSuccessful) {
              $('#editSuccessMessage').html(json.message);
              $('#editSuccess').show();
              $('#editTicketModal').modal('hide');
              loadTable();

          } else {
              $('#editErrorMessage').html(json.message);
              $('#editError').show();
          }

          form.children('button').prop('disabled', false);
          form.children('input[name="name"]').select();
      });

      return false;
    });
    

    $('.content').fadeIn(1000);
   
});


</script>