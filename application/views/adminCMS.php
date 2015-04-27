<? $this->load->view('includes/header');?>

<div class="container">
    <div class="content" style="display:none">
	<div class="row clearfix">
		<div class="col-md-12 column">
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
                    <th>Kapasitas</th> 
                    <th>Status</th> 
                    <th>Tool</th> 
                </tr> 
                </thead> 
                <tbody> 
                    <? foreach($dorm_room as $row): ?>
                        <tr> 
                            <td><?=$row['roomid']; ?></td> 
                            <td><?=$row['nomor']; ?></td> 
                            <td><?=$row['fasilitas']; ?></td> 
                            <td><?=$row['kapasitas']; ?></td> 
                            <td>not supported yet</td> 
                            <td><button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editDormModal<?=$row['roomid']; ?>">edit</button> 
                                <button class="btn btn-sm btn-danger" onclick="deleteConfirm(<?=$row['roomid']; ?>)">delete</button>
                            </td> 
                        </tr> 
                    <!--BEGIN Modal For Edit Room-->
                        <div class="modal fade" id="editDormModal<?=$row['roomid']; ?>" tabindex="-1" role="dialog" aria-labelledby="editDormModal" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Room ID : <?=$row['roomid']; ?></h4>
                              </div>
                              <div class="modal-body">
                                <!--BEGIN message for showing error/sucess in adding room-->
                                <div id="success" class="row" style="display: none">
                                      <div id="successMessage" class="alert alert-info text-center"></div>
                                </div>
                                <div id="error" class="row" style="display: none">
                                      <div id="errorMessage" class="alert alert-danger text-center"></div>
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
                                         <input class="form-control" name="Nomor" type="text" placeholder="Nomor kamar" value="<?=$row['nomor']; ?>" />
                                    </div>
                                    <div class="form-group">
                                         <label>Fasilitas kamar</label>
                                         <input class="form-control" name="Fasilitas" type="text" placeholder="Fasilitas kamar" value="<?=$row['fasilitas']; ?>"/>
                                    </div>
                                    <div class="form-group">
                                         <label>Kapasitas kamar</label>
                                         <input class="form-control" name="Kapasitas" type="text" placeholder="Kapasitas kamar" value="<?=$row['kapasitas']; ?>"/>
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
function deleteConfirm($idToDel)
{
    console.log($idToDel);
    var faction = '<?=site_url('admin/deleteRoom/'+$idToDel); ?>';
    $.post(faction, function(rdata) {
      var json = jQuery.parseJSON(rdata);
      if (json.isSuccessful) {
          $('#successMessage').html(json.message);
      } else {
          $('#errorMessage').html(json.message);
      }

  });
}
$(document).ready(function() {
    
    $("#roomTable").tablesorter(); 
    
    /* getting table data with json
    var url = '<?=site_url('admin/getDormData'); ?>';
    $.get(url, function(data){
        var dormData = jQuery.parseJSON(data);

        $.each(dormData['roomData'], function (i,d) {
            
           var row='<tr>';
           $.each(d, function(j, e) {
              row+='<td>'+e+'</td>';
           });
           row+='</tr>';
           $('#roomTable tbody').append(row);
            
        });
    });
    */

    
    $('#formAdd').submit(function() {
      var form = $(this);
      form.children('button').prop('disabled', true);
      $('#success').hide();
      $('#error').hide();

      var faction = '<?=site_url('admin/addRoom'); ?>';
      var fdata = form.serialize();

      $.post(faction, fdata, function(rdata) {
          var json = jQuery.parseJSON(rdata);
          if (json.isSuccessful) {
              $('#successMessage').html(json.message);
              $('#success').show();
          } else {
              $('#errorMessage').html(json.message);
              $('#error').show();
          }

          form.children('button').prop('disabled', false);
          form.children('input[name="name"]').select();
      });

      return false;
    });
    
    $('.formEdit').submit(function() {
      var form = $(this);
      form.children('button').prop('disabled', true);
      $('#success').hide();
      $('#error').hide();

      var faction = '<?=site_url('admin/editRoom'); ?>';
      var fdata = form.serialize();

      $.post(faction, fdata, function(rdata) {
          var json = jQuery.parseJSON(rdata);
          if (json.isSuccessful) {
              $('#successMessage').html(json.message);
              $('#success').show();

          } else {
              $('#errorMessage').html(json.message);
              $('#error').show();
          }

          form.children('button').prop('disabled', false);
          form.children('input[name="name"]').select();
      });

      return false;
    });
    

    $('.content').fadeIn(1000);
});
</script>