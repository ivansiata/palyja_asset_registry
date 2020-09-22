    <div class ="col-md-10" style="padding:0; padding-right:2%">
    <form method="post">
        <div class="row">
            <div class="col-md-6 text-left">
                <strong style="font-size:18pt;"><span class="fa fa-modx"></span> Data Nilai</strong>
            </div>
        </div>
        <br/>

        <table width="100%" class="table table-striped table-bordered" id="tabeldata">
            <input type = "text" id="baseurl" value="<?php echo base_url()?>" hidden>

            <thead>
                <tr>
                    <th width="10%">Nilai</th>
                    <th>Keterangan</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody id="bodytable">
                <?php foreach ($dataNilai as $dn => $isi) { ?>
                    <tr>

                        <td><?php echo $isi->jum_nilai ?></td>
                        <td><?php echo $isi->ket_nilai ?></td>
                        <td class="text-center" style="vertical-align:middle;">
                            <a href="#" class="btn btn-warning openUpdate" data-toggle="modal" data-target="#myModal" data-id='<?php echo $isi->id_nilai?>'><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
        </form> 
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times</button>
                    <h4 class="modal-title">Update Data Nilai</h4>
                </div>
                <div class="modal-body" style="max-height: 460px; overflow: auto">
                     <?php echo form_open('ahp/update_nilai_proses')?>
                     <input type = "text" id="updateIDUp" name="updateIDUp" value="" hidden>
                      <div class="form-group">
                        <label for="kt">Jumlah Nilai</label>
                        <input type="text" class="form-control" id="jum" name="jum" value="">
                      </div>
                      <div class="form-group">
                        <label for="kt">Keterangan Nilai</label>
                        <input type="text" class="form-control" id="ket" name="ket" value="">
                      </div>
    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning"><span class="fa fa-edit"></span> SAVE</button>
                </div>
                </form>
                
            </div>
        </div>
    </div>

<script type="text/javascript">
    $(function(){
        var base_url = "<?php echo base_url();?>";
       $(".openUpdate").on("click", function(){
            var updateID = $(this).data('id');
            $('#updateIDUp').val(updateID);
            $.ajax({
            type:"POST",
            url: base_url+"ahp/prosesAjaxdataUbahNilai/"+updateID,
            data: "updateID="+updateID,
    
            success: function(data){
              var json = jQuery.parseJSON(data);
              $.each(json,function(i,item){
                $('#jum').val(item.jum_nilai);
                $('#ket').val(item.ket_nilai);
              });
            },
            error: function(data){
              alert('haha');
            },
               

            });

        })
    })
</script>