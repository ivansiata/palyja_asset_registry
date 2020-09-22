<div class="col-sm-9 col-sm-offset-3 col-md-11 col-md-offset-1 main">
          <ul class="nav nav-tabs" style="margin-top:-25px;">
            <li role="presentation"><a href="<?php echo base_url().'crud/' ?>">Main</a></li>
            <li  class ="active"><a href="<?php echo base_url()?>crud/entry_data">Entry Data</a></li>
            <li><a href="<?php echo base_url()?>crud/add_data">Input Data</a></li>
            <li ><a href="">Advance Search</a></li>
          </ul>

           <div id="inputPage" style="margin-left:7%; margin-top:2%;">
          <ul class="nav nav-pills" style="margin-top: 25px;">
            <li role="presentation"><a href="<?php echo base_url()?>crud/entry_data"><img src="<?php echo base_url()?>assets/po2.png"></a></li>
            <li style="width:16%;padding-top:3px;"><hr></li>
            <li class ="active"><a href="<?php echo base_url()?>crud/entry_data21"><img src="<?php echo base_url()?>assets/general.png"></a></li>
            <li style="width:16%; padding-top:3px;"><hr></li>
            <li><a href="<?php echo base_url()?>crud/entry_data3"><img src="<?php echo base_url()?>assets/detail2.png"></a></li>
            <li style="width:16%; padding-top:3px;"><hr></li>
            <li><a href="<?php echo base_url()?>crud/document"><img src="<?php echo base_url()?>assets/documents.png"></a></li>
            <li style="width:16%; padding-top:3px;"><hr></li>
            <li><a href="<?php echo base_url()?>crud/upload_photo"><img src="<?php echo base_url()?>assets/upload.png" style="border:0;background-color:red; padding:6px 8px 5px 8px; border-radius:80%; box-shadow: 2px 4px 7px; width:80px; height:67px; margin-left:-10px"></a></li>
          </ul>
          <ul class="nav nav-pills" style="margin-top: 3px; margin-left:-1%">
            <li role="presentation">Purchase Order</li>
            <li style="width:13.4%;padding-top:3px;"></li>
            <li class ="active">Asset Generals</li>
            <li style="width:14.5%; padding-top:3px;"></li>
            <li>Asset Details</li>
            <li style="width:15.4%; padding-top:3px;"></li>
            <li>Documents</li>
            <li style="width:15%; padding-top:3px;"></li>
            <li>Upload Photo</li>
          </ul>
          </div>


          <?php echo form_open_multipart('crud/upload_action')?>
            <div style="margin-top:4px;" id="maincontainer">
            PO Number: <select id="choosepo5" class="chozen" name="pophoto" style="width:80px">
            <option>--</option>
            <?php foreach($listpo2 as $kf=>$isi){
                    echo "<option value='a|".$isi->no_po."'>".$isi->no_po."</option>";

            } ?>
            </select>
            &nbsp Asset Name: <select id="choosename5" class="chozen" name="namephoto" style="width:150px" data-placeholder="Select PO Number">
            <?php foreach($listname2 as $kf=>$isi){
                    echo "<option value='".$isi->id_assetname."'data-chained='a|".$isi->no_po."'>".$isi->name."</option>";

            } ?>
            </select>
            </select>
            &nbsp Asset ID: <select id="chooseid5" class="chozen" name="idphoto" style="width:150px" data-placeholder="Select PO Number">
                
            </select>
          </div>

          <input type="text" value="" id="assetid" hidden>
          <div id="details"></div>

         
            <div id="left-content" class="col-sm-5" style="margin-top:10px; ">
               <img id="photo" alt="photo preview" src="" style="width:450px; height:350px;"/>
               <input type="file" id="inputfile" name="berkas" onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0])" disabled >
               <input type="submit" id="upPhoto" value="UPLOAD PHOTO">
            </div>
            <div id="mid-content" class="col-sm-5" style="margin-top:10px;">
              <table>
                
              </table>

            </div>
        

          <div id="right-content" class="col-sm-2"></div>
          
        </form>
        <div id="resultpo" hidden><?php if(isset($_GET['po'])) {echo $_GET['po'];} ?></div>
        <div id="resultname" hidden><?php if(isset($_GET['name'])) {echo $_GET['name'];} ?></div>
        <div id="result" hidden><?php if(isset($_GET['id'])) {echo $_GET['id'];} ?></div>
         <script>
          $(function(){

            var po = document.getElementById('resultpo');
            var name = document.getElementById('resultname');
            var id = document.getElementById('result');
            
            var base_url = "<?php echo base_url();?>";

          $("[name='namephoto']").chained("[name='pophoto']");

            // buat ganti isi chosen #series menjadi isi yang chained
            $("[name='namephoto']").trigger("chosen:updated");
            //buat refresh #series setiap #series diganti
            $("[name='pophoto']").bind("change", function(){
            $("[name='namephoto']").trigger("chosen:updated")
            });

            $('#choosepo5 option[value="a|'+po.innerHTML+'"]').attr('selected', 'selected');
            
            $('#choosepo5').trigger('chosen:updated');
            $('#choosepo5').trigger('change');
            


          $('#choosepo5').on('change',function(){
             $('#choosename5 option:first').attr('selected', 'selected').trigger('chosen:updated');
             $('#choosename5').change();
            
          });

          var assetid;
          var pophoto;
          var namephoto;



          $('#choosename5').on('change',function(){
            $('#chooseid5').empty().trigger('chosen:updated');
            $('#mid-content table').empty();
            $('#choosename5 option[value="'+name.innerHTML+'"]').attr('selected', 'selected').trigger('chosen:updated'); 
            pophoto = $('#choosepo5 option:selected').text();
            namephoto = $('#choosename5 option:selected').val();
            if(pophoto != "--"){
                $.ajax({
                type:"POST",
                url: base_url+"/crud/proses_ajax6",
                data: {pophoto:pophoto,
                      namephoto:namephoto},

                success: function(data){
                  var json = jQuery.parseJSON(data);
                  $('#chooseid5').empty();

                    $.each(json, function(i, item){
                      $('#chooseid5').append('<option value="'+item.asset_id+'">'+item.asset_id+'</option>').trigger('chosen:updated');
                      $('#assetid').val($('#chooseid5 option:selected').val());
                      //$('#mid-content').append('<tr><td><input type="text" value=""></td></tr>')
                     
                    });
                 
                  $('#mid-content table').empty();
                  
                  $('#mid-content table').append('<tr><td style="width:100px">Unit Asset</td><td>: '+json[$('#chooseid5 option:selected').index()].unitasset+'</td><tr>'+
                                                 '<tr><td style="width:100px">Barcode</td><td>: '+json[$('#chooseid5 option:selected').index()].barcode+'</td><tr>'+
                                                 '<tr><td style="width:100px">Used By</td><td>: '+json[$('#chooseid5 option:selected').index()].workingunit+'</td><tr>'+
                                                 '<tr><td style="width:80px">Brand</td><td>: '+json[$('#chooseid5 option:selected').index()].brand+'</td></tr>'+
                                                 '<tr><td style="width:80px">Type</td><td>: '+json[$('#chooseid5 option:selected').index()].type+'</td></tr>'+
                                                 '<tr><td style="width:80px">Dimension</td><td>: '+json[$('#chooseid5 option:selected').index()].dimension+'</td></tr>'+
                                                 '<tr><td style="width:80px">Serial Number</td><td>: '+json[$('#chooseid5 option:selected').index()].serial_numb+'</td></tr>'+
                                                 '<tr><td style="width:100px">Status</td><td>: '+json[$('#chooseid5 option:selected').index()].status+'</td><tr>'+
                                                 '<tr><td style="width:80px">Purchasing Date</td><td>: '+json[$('#chooseid5 option:selected').index()].purchasingdate+'</td></tr>'+
                                                 '<tr><td style="width:80px">Install Date</td><td>: '+json[$('#chooseid5 option:selected').index()].installdate+'</td></tr>'
                                                
                                                 );
               
                $('#chooseid5 option[value="'+id.innerHTML+'"]').attr('selected', 'selected').trigger('chosen:updated');
                $('#photo').attr('src','<?php echo base_url()?>photo/'+json[$('#chooseid5 option:selected').index()].photo);
                },

                error: function(data){
                  alert('error');
                }      
                });
              }
              
           

            });

          $('#chooseid5').on('change', function(){
            $('#mid-content table').empty();
            if(pophoto != "--"){
                $.ajax({
                type:"POST",
                url: base_url+"/crud/proses_ajax6",
                data: {pophoto:pophoto,
                      namephoto:namephoto},

                success: function(data){
                  var json = jQuery.parseJSON(data);
              
                  
                  $('#mid-content table').append('<tr><td style="width:100px">Unit Asset</td><td>: '+json[$('#chooseid5 option:selected').index()].unitasset+'</td><tr>'+
                                                 '<tr><td style="width:100px">Barcode</td><td>: '+json[$('#chooseid5 option:selected').index()].barcode+'</td><tr>'+
                                                 '<tr><td style="width:100px">Used By</td><td>: '+json[$('#chooseid5 option:selected').index()].workingunit+'</td><tr>'+
                                                 '<tr><td style="width:80px">Brand</td><td>: '+json[$('#chooseid5 option:selected').index()].brand+'</td></tr>'+
                                                 '<tr><td style="width:80px">Type</td><td>: '+json[$('#chooseid5 option:selected').index()].type+'</td></tr>'+
                                                 '<tr><td style="width:80px">Dimension</td><td>: '+json[$('#chooseid5 option:selected').index()].dimension+'</td></tr>'+
                                                 '<tr><td style="width:80px">Serial Number</td><td>: '+json[$('#chooseid5 option:selected').index()].serial_numb+'</td></tr>'+
                                                 '<tr><td style="width:100px">Status</td><td>: '+json[$('#chooseid5 option:selected').index()].status+'</td><tr>'+
                                                 '<tr><td style="width:80px">Purchasing Date</td><td>: '+json[$('#chooseid5 option:selected').index()].purchasingdate+'</td></tr>'+
                                                 '<tr><td style="width:80px">Install Date</td><td>: '+json[$('#chooseid5 option:selected').index()].installdate+'</td></tr>'
                                                
                                                 );
                $('#photo').attr('src','<?php echo base_url()?>photo/'+json[$('#chooseid5 option:selected').index()].photo);

                },

                error: function(data){
                  alert('error');
                }      
                });
              }

          });

        $('#choosepo5, #choosename5, #chooseid5').on('change', function(){
          if($('#choosepo5').val()){
            $('#inputfile').removeAttr('disabled');
        }

          if($('#choosepo5').val() === "--"){
            $('#photo').attr('src','')
            $('#inputfile').val("");
             $('#inputfile').prop('disabled', true);
          }
        })

        $('#upPhoto').click(function(e){
          if($('#inputfile').val() == ""){
            alert('Choose Photo!');
            e.preventDefault();
          }
        });

        $('#choosename5').trigger('change');
        
      });


        </script>

        </html>