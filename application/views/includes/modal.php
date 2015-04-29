<!--BEGIN Modal For Add Room-->
<button class="btn btn-default" data-toggle="modal" data-target="#addDormModal">Add room</button>

<div class="modal fade" id="addDormModal" tabindex="-1" role="dialog" aria-labelledby="addDormModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Room</h4>
      </div>
      <div class="modal-body">
        <!--BEGIN message for showing error/sucess in adding room-->
        <div id="addSuccess" class="row" style="display: none">
              <div id="addSuccessMessage" class="alert alert-info text-center"></div>
        </div>
        <div id="addError" class="row" style="display: none">
              <div id="addErrorMessage" class="alert alert-danger text-center"></div>
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
        <!--END insertion room form-->
      </div>
    </div>
  </div>
</div>
<!--END Modal For Add Room-->