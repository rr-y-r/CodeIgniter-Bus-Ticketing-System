<? $this->load->view('includes/header');?>

<div class="container">
    <div class="content" style="display:none">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<h2 class="form-heading text-center">
				Admin CMS
			</h2>
            <button class="btn btn-default">Add room</button>
            <table id="myTable" class="tablesorter"> 
                <thead> 
                <tr> 
                    <th>Last Name</th> 
                    <th>First Name</th> 
                    <th>Email</th> 
                    <th>Due</th> 
                    <th>Web Site</th> 
                </tr> 
                </thead> 
                <tbody> 
                <tr> 
                    <td>Smith</td> 
                    <td>John</td> 
                    <td>jsmith@gmail.com</td> 
                    <td>$50.00</td> 
                    <td>http://www.jsmith.com</td> 
                </tr> 
                <tr> 
                    <td>Bach</td> 
                    <td>Frank</td> 
                    <td>fbach@yahoo.com</td> 
                    <td>$50.00</td> 
                    <td>http://www.frank.com</td> 
                </tr> 
                <tr> 
                    <td>Doe</td> 
                    <td>Jason</td> 
                    <td>jdoe@hotmail.com</td> 
                    <td>$100.00</td> 
                    <td>http://www.jdoe.com</td> 
                </tr> 
                <tr> 
                    <td>Conway</td> 
                    <td>Tim</td> 
                    <td>tconway@earthlink.net</td> 
                    <td>$50.00</td> 
                    <td>http://www.timconway.com</td> 
                </tr> 
                </tbody> 
                </table> 

            <!--BEGIN message for showing error/sucess in adding room-->
            <div id="success" class="row" style="display: none">
                  <div id="successMessage" class="alert alert-info text-center"></div>
            </div>
            <div id="error" class="row" style="display: none">
                  <div id="errorMessage" class="alert alert-danger text-center"></div>
            </div>
            <!--END message for showing error/sucess in adding room-->
            
            <!--BEGIN insertion room form-->
			<form id="formAdd" role="form" accept-charset="utf-8">
				<div class="form-group">
					 <label>Nomor kamar</label>
                     <input class="form-control" name="Nomor" type="text" placeholder="Nomor kamar" />
				</div>
				<div class="form-group">
					 <label>Fasilitas kamar</label>
                     <input class="form-control" name="Fasilitas" type="text" placeholder="Fasilitas kamar"/>
				</div>
                <div class="form-group">
					 <label>Kapasitas kamar</label>
                     <input class="form-control" name="Kapasitas" type="text" placeholder="Kapasitas kamar"/>
				</div>
                
                <button type="submit" class="btn btn-success btn-large pull-right">Submit</button>
                
			</form>
            <!--END insertion room form-->
		</div>
	</div>
</div>

<script src="<?=base_url('assets/js/jquery.js'); ?>"></script>
<script src="<?=base_url('assets/tablesorter/jquery.tablesorter.js'); ?>"></script>
<script>
$(document).ready(function() {
    
    $("#myTable").tablesorter(); 

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

    $('.content').fadeIn(1000);
});
</script>