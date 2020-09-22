    <div class ="col-md-10" style="padding:0; padding-right:2%">
    <form method="post">
        <div class="row">
            <div class="col-md-6 text-left">
                <strong style="font-size:18pt;"><span class="fa fa-modx"></span> Data Alternatif</strong>
            </div>
            
        </div>
        <br/>

        <table width="100%" class="table table-striped table-bordered" id="tabeldata">
            <thead>
                <tr>
                    <th width="10%">ID Kriteria</th>
                    <th>Keterangan</th>
                    <th>Bobot</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody id="bodytable">
                <?php foreach ($dataAlternatif as $da => $isi) { ?>
                    <tr>
                        <td><?php echo $isi->id_alternatif ?></td>
                        <td><?php echo $isi->nama_alternatif ?></td>
                        <td><?php echo $isi->hasil_akhir ?></td>
                        <td class="text-center" style="vertical-align:middle;">
                              <a href="#" class="btn btn-warning openUpdate" data-toggle="modal" data-target="#myModal" data-id='<?php echo $isi->id_alternatif?>'><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
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
                     <?php echo form_open('ahp/update_alternatif_proses')?>
                      <input type = "text" id="updateIDUp" name="updateIDUp" value="" hidden>
                      <div class="form-group">
                        <label for="kt">Nama Alternatif</label>
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
            url: base_url+"ahp/prosesAjaxdataUbahAlternatif/"+updateID,
            data: "updateID="+updateID,
    
            success: function(data){
              var json = jQuery.parseJSON(data);
              $.each(json,function(i,item){
                $('#ket').val(item.nama_alternatif);
              });
            },
            error: function(data){
              alert('haha');
            },
               

            });

        })
    })
</script>