<? $this->load->view('includes/header');?>

<div class="container">
    <div class="content" style="display:none">
	<div class="row clearfix">
		<div class="col-md-12 column">
            <? $this->load->view('includes/navbar'); ?>
            
           
			<h2 class="form-heading text-center">
				Admin CMS
			</h2>
            <div id="showdata"></div>
            <table id="roomTable" class="table table-striped table-bordered tablesorter"> 
                <thead> 
                <tr> 
                    <th>ID kamar</th> 
                    <th>Nomor</th> 
                    <th>Fasilitas</th> 
                    <th>Status</th> 
                    <th>Kapasitas</th> 
                    <th>Tool</th>
                </tr> 
                </thead> 
                <tbody> 
                    <? foreach($dorm_room as $row): ?>
                        <tr> 
                        </tr> 
                    <!--BEGIN Modal For Edit Room-->
                        <div class="modal fade" id="editDormModal<?=$row['roomid']; ?>" tabindex="-1" role="dialog" aria-labelledby="editDormModal" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Room ID : <?=$row['roomid']; ?></h4>
                              </div>
                              <div class="modal-body">
                                <!--BEGIN message for showing error/sucess in adding room-->
                                <div id="editSuccess" class="row" style="display: none">
                                      <div id="editSuccessMessage" class="alert alert-info text-center"></div>
                                </div>
                                <div id="editError" class="row" style="display: none">
                                      <div id="editErrorMessage" class="alert alert-danger text-center"></div>
                                </div>
                                <!--END message for showing error/sucess in adding room-->

                                <!--BEGIN EDIT room form-->
                                <form class="formEdit" role="form" accept-charset="utf-8">
                                    <div class="form-group hidden">
                                         <label>ID kamar</label>
                                         <input class="form-control" name="Roomid" type="text" placeholder="Nomor kamar" value="<?=$row['roomid']; ?>" />
                                    </div>
                                    <div class="form-group">
                                         <label>Nomor kamar</label>
                                         <input class="form-control" name="Nomor" type="paragraph" placeholder="Nomor kamar" value="<?=$row['nomor']; ?>" />
                                    </div>
                                    <div class="form-group">
                                         <label>Fasilitas kamar</label>
                                         <input class="form-control" name="Fasilitas" type="text" placeholder="Fasilitas kamar" value="<?=$row['fasilitas']; ?>"/>
                                    </div>
                                    <div class="form-group">
                                         <label>Kapasitas kamar</label>
                                         <input class="form-control" name="Kapasitas" type="text" placeholder="Kapasitas kamar" value="<?=$row['kapasitas']; ?>"/>
                                    </div>
                                    <div class="form-group">
                                         <label>Status kamar</label>
                                         <input class="form-control" name="Status" type="text" placeholder="Status kamar" value="<?=$row['status']; ?>"/>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-large pull-right">Submit</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </form>
                                <!--END EDIT room form-->
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--END Modal For EDIT Room-->
                    <? endforeach; ?>
                </tbody> 
            </table> 
                
            <? $this->load->view('includes/modal');?>
                
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url('assets/tablesorter/jquery.tablesorter.js'); ?>"></script>
<script>

function test()
{
    var confMsg =  confirm("apakah kamu yakin ingin menghapus data ini ?");
    var roomData = $('.delete').val();
    var deleteURL = '<?=site_url("admin/deleteRoom"); ?>'+'/'+roomData;
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
    
function loadTable()
{
    $('#roomTable tbody').fadeOut(200).empty();
    var url = '<?=site_url("admin/getDormData"); ?>';
    $.get(url, function(data){
        var dormData = jQuery.parseJSON(data);
        $.each(dormData['roomData'], function (i,d) {

           var row='<tr>';
            row+='<tr>';
           $.each(d, function(j, e) {
               row+='<td>'+e+'</td>';
               console.log(d['roomid']);
           })
            row+='<td><button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editDormModal'+d['roomid']+'" >edit</button> <button class="btn btn-sm btn-danger delete" name="roomid" value="'+d['nomor']+'" onclick="return test()">delete</button></td>';

           row+='</tr>';
           $('#roomTable tbody').fadeIn(1000).append(row);

        })
    }); 
};
    
$(document).ready(function() {
    
    loadTable();
    
    $("#roomTable").tablesorter(); 
    
    /* getting table data with json*/
    
    /*END getting table data with json*/
    
    $('#formAdd').submit(function() {
      var form = $(this);
      form.children('button').prop('disabled', true);
      $('#addSucess').hide();
      $('#addError').hide();

      var faction = '<?=site_url('admin/addRoom'); ?>';
      var fdata = form.serialize();

      $.post(faction, fdata, function(rdata) {
          var json = jQuery.parseJSON(rdata);
          if (json.isSuccessful) {
              $('#addSuccessMessage').html(json.message);
              $('#addSuccess').show();
              $('#addDormModal').modal('hide');
              loadTable();
          } else {
              $('#addErrorMessage').html(json.message);
              $('#addError').show();
          }

          form.children('button').prop('disabled', false);
          form.children('input[name="name"]').select();
      });

      return false;
    });
    
    $('.formEdit').submit(function() {
      var form = $(this);
      form.children('button').prop('disabled', true);
      $('#editSucess').hide();
      $('#editError').hide();

      var faction = '<?=site_url('admin/editRoom'); ?>';
      var fdata = form.serialize();

      $.post(faction, fdata, function(rdata) {
          var json = jQuery.parseJSON(rdata);
          if (json.isSuccessful) {
              $('#editSuccessMessage').html(json.message);
              $('#editSuccess').show();
              $('#editDormModal').modal('hide');
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