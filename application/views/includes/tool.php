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