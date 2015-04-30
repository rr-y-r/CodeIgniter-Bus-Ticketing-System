<? $this->load->view('includes/header');?>
<a href="#" class="glyphicon glyphicon-th-list toogleside pull-right" id="menu-toggle">
                    </a>
<h3 class="text-center wuaso">Admin CMS (Coeg Management System)</h3>
<div class="container">
    
    <div class="content" style="display:none">
	<div class="row clearfix">

            
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
            
           
			
                    
            
            <div id="showdata"></div>
                <br>
            <h4 class="text-center headercoeg">lately i've been, i've been losing sleep, <br>coding alone in the middle of the night, <br>lately i've been, i've been, coding hard, <br> care no one about project assigntment.  </h4>
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Manajemen Kamar</a></li>
                  <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Manajemen Pembayaran</a></li>
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
                  <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
<h4 class="text-center">table coeg</h4>
                     <table id="roomTable" class="table table-hover table-striped table-condensed"> 
                        <thead style="background-color:#FF6666;"> 
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
                  <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="dropdown1" aria-labelledby="dropdown1-tab">
                    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="dropdown2" aria-labelledby="dropdown2-tab">
                    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                  </div>
                </div>
              </div>
                
           
                
                
            </div>
        </div>
    </div>
        
</div>

<script>
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
    
 $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

function test(x)
{
    var confMsg =  confirm("apakah kamu yakin ingin menghapus data ini ?");
    var deleteURL = '<?=site_url("admingrace/deleteRoom"); ?>'+'/'+x;
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
    var url = '<?=site_url("admingrace/getDormData"); ?>';
    $.get(url, function(data){
        var dormData = jQuery.parseJSON(data);
        $.each(dormData['roomData'], function (i,d) {

           var row='<tr>';
            row+='<tr>';
           $.each(d, function(j, e) {
               row+='<td>'+e+'</td>';
               console.log(d['roomid']);
           })
            row+='<td><button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editDormModal'+d['roomid']+'" >edit</button> <button class="btn btn-sm btn-danger delete" name="roomid" value="'+d['nomor']+'" onclick="return test('+d['nomor']+')">delete</button></td>';

           row+='</tr>';
           $('#roomTable tbody').fadeIn(1000).append(row);

        })
    }); 
};
    
$(document).ready(function() {
    
    loadTable();
    
    
    /* getting table data with json*/
    
    /*END getting table data with json*/
    
    $('#formAdd').submit(function() {
      var form = $(this);
      form.children('button').prop('disabled', true);
      $('#addSucess').hide();
      $('#addError').hide();

      var faction = '<?=site_url('admingrace/addRoom'); ?>';
      var fdata = form.serialize();
        var notif = '<?=site_url('admingrace/addRoom'); ?>';

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

      var faction = '<?=site_url('admingrace/editRoom'); ?>';
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