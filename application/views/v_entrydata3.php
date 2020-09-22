          <div id="inputPage" style="margin-left:7%; margin-top:2%;">
          <ul class="nav nav-pills" style="margin-top: 25px; height:60px;">
            <li role="presentation"><a href="<?php echo base_url()?>crud/entry_data"><img src="<?php echo base_url()?>assets/po2.png" style="opacity:0.4"></a></li>
            <li style="width:37.9%;padding-top:3px;"><hr></li>
            <li class ="active"><a href="<?php echo base_url()?>crud/entry_data21"><img src="<?php echo base_url()?>assets/general.png" style="opacity:0.4"></a></li>
            <li style="width:37.3%; padding-top:3px; " ><hr></li>
            <li><a href="<?php echo base_url()?>crud/entry_data3"><img src="<?php echo base_url()?>assets/detail2.png" style="background-color:red; padding:6px 8px 5px 8px; border-radius:80%; box-shadow: 2px 4px 7px; width:80px; height:67px; margin-left:0px"></a></li>
            
          </ul>

          <ul class="nav nav-pills" style="margin-top: 3px; margin-left:-1.2%">
            <li role="presentation">Purchase Order</li>
            <li style="width:35.5%;">&nbsp</li>
            <li class ="active">Asset Generals</li>
            <li style="width:36.3%;">&nbsp</li>
            <li>Asset Details</li>
            
          </ul>
          </div>
    <?php echo $nomorpo ?>
  <?php echo form_open_multipart('crud/updatedetail2')?>
    <div style="margin-top:4px" id="maincontainer">
            PO Number: <select id="choosepo2" class="chozen" name="pogeneral" style="width:90px">
            <option value="a|">--</option>
            <?php foreach($listpo2 as $kf=>$isi){
                    echo "<option value='a|".$isi->no_po."'"; if($isi->no_po == $nomorpo){echo "selected";} echo ">".$isi->no_po."</option>";

            } ?>
            </select>
            &nbsp Asset Name: <select id="choosename" class="chozen" name="namelist" style="width:150px" data-placeholder="Select PO Number">
            <?php foreach($listname2 as $kf=>$isi){
                    echo "<option value='".$isi->id_assetname."'data-chained='a|".$isi->no_po."'>".$isi->name."</option>";

            } ?>
            </select>
            &nbsp<span id="countName" style="color: red">  </span>

            &nbsp Asset ID: <select id="chooseid5" class="chozen" name="assetid" style="width:150px" data-placeholder="Select PO Number">
                
            </select>
            &nbsp<span id="countAsset" style="color: red">  </span>

    </div>
    <br>


     <div class="col-md-8" id="detailForm">
        <fieldset style="border: 1px solid black; padding:0px;">
         <legend style="width:80px; border-color:white; margin-left:10px;"><center>Details</center></legend>
        <div class="col-md-6">
         <table style="margin-left:4%;">
                <tr>
                  <td style="width:100px;">Family</td>
                  <td><select style="width: 125px;" name="familyasset" id="familyasset" readonly>
                    <option value="">--</option><?php foreach($family as $kf=>$isi){echo "<option value='a|".$isi->id_familyasset."'>".$isi->family."</option>";} ?>
                  </select></td>
                </tr>
                <tr>
                  <td style="width:100px;">Sub Family</td>
                  <td><select style="width: 120px;" name="subfamilyasset" id="subfamilyasset">
                    <option value="">--</option><?php foreach($subfamily as $kf=>$isi){echo "<option value='a|".$isi->id_subfamilyasset."' data-chained='a|".$isi->id_familyasset."'>".$isi->subfamily."</option>";} ?>
                  </select></td>
                </tr>
                <tr>
                  <td style="width:100px;">Unit Asset</td>
                  <td><select style="width: 120px;" name="unitasset" id="unitasset">
                   <?php foreach($unitasset as $kf=>$isi){echo "<option value=".$isi->id_unitasset."' data-chained='a|".$isi->id_subfamilyasset."'>".$isi->unitasset."</option>";} ?>
                  </select></td>
                </tr>
                <tr>
                  <td>Barcode</td>
                  <td><input type="text" name="barcode" id="barcode" disabled></td>
                </tr>
                <tr>
                  <td>Brand</td>
                  <td><input type="text" name="brand"></td>
                </tr>
                <tr>
                  <td>Type</td>
                  <td><input type="text" name="type"></td>
                </tr>
                <tr>
                  <td>Dimension</td>
                  <td><input type="text" name="dimension"></td>
                </tr>
                <tr>
                  <td>Serial Number</td>
                  <td><input type="text" name="sernum"></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td id="status">
                    <select class="status" style="width: 100px;" name="status" id="status" disabled>
                      <option value="">--</option>
                      <?php foreach($status as $kf=>$isi){echo "<option value=".$isi->id_status.">".$isi->status."</option>";} ?>
                    </select></td>
                </tr>
              </table>
            </div>
            <div class="col-md-6">
              Purchasing Date<span class="binreq">*</span> <br>
              <input type="date" name="purchDate" id="purchDate">
              <br><br>
              Install Date <br>
              <input type="date" name="instDate">

              <br><br>Used by <br>
              <select class="chozen" name="usedby" id="pic" style="width: 160px;">
                <option value="">--</option>
                  <?php foreach($pic as $kf=>$isi){
                    echo "<option value=".$isi->id_dept." ".set_select('pic',$isi->id_dept).">".$isi->workingunit."</option>";
                  } ?>
              </select>
            </div>

        </fieldset>
      </div>



      <div class="col-md-4" id="photoForm" style="height:330px">
        <fieldset style="border: 1px solid black; padding:0px; height:277px">
         <legend style="width:66px; border-color:white; margin-left:10px;"><center>Photo</center></legend>
           <img id="photo" alt="photo preview" src="" style="width:260px; height:190px; margin-left:13.5%;"/><br>
           <input type="file" id="inputfile" name="berkas" accept=".jpg, .jpeg" style="margin-left:13.5%;" onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0])" disabled > 
           <button type="button" id="btnRem" style="position:absolute; bottom:18%; right:5%; background-color:red; color:white">Remove</button>
        </fieldset>
      </div>



       <div class="col-md-12" id="locationForm" style="height:160px">
        <fieldset style="border: 1px solid black; padding:0px; min-height:150px">
         <legend style="width:90px; border-color:white; margin-left:10px;"><center>Location</center></legend>
           <div class="col-md-3" style="height:100px">
            <center>
              Main Location<span class="binreq" id="binreqLoc"></span><br>
              <select class="mainlocation" style="width: 150px;" name="mainlocation" id="mainlocation">
                      <option value="">--</option>
                      <?php foreach($mainlocation as $kf=>$isi){echo "<option value='a|".$isi->id_mainlocation."'>".$isi->mainlocation."</option>";} ?>
              </select>
            </center>

           </div>
           <div class="col-md-3" style="height:100px">
            <center>
              Sub Location<br>
              <select class="sublocation" style="width: 150px;" name="sublocation" id="sublocation">
                      <option value="">--</option>
                      <?php foreach($sublocation as $kf=>$isi){echo "<option value='a|".$isi->id_sublocation."'data-chained='a|".$isi->id_mainlocation."'>".$isi->sublocation."</option>";} ?>
              </select>
            </center>
          </div>
           <div class="col-md-3" style="height:100px">
            <center>
              Unit Location<br>
              <select class="unitlocation" style="  width: 150px;" name="unitlocation" id="unitlocation">
                      
                      <?php foreach($unitlocation as $kf=>$isi){echo "<option value='".$isi->id_unitlocation."' data-chained='a|".$isi->id_sublocation."'>".$isi->unitlocation."</option>";} ?>
              </select>
            </center>
          </div>
           <div class="col-md-3" style="height:100px">
            <center>
              Address<br>
             <textarea style="background-color:white" id="textareaAddress" readonly></textarea>
            </center>
          </div>
        </fieldset>
      </div>

       <input type="submit" value="SAVE" name="save1" id="submit" style="margin-left:15px"> <input type="submit" value="SAVE & VIEW RESULT" name="save2" id="submit2" style="margin-left:15px">
       <span class="binreq" style="float:right; margin-right:1%">*required</span>

    </form>
    
    <div id="resultpo" hidden><?php if(isset($_GET['po'])) {echo $_GET['po'];} ?></div>
    <div id="resultname" hidden><?php if(isset($_GET['name'])) {echo $_GET['name'];} ?></div>
    <div id="result" hidden><?php if(isset($_GET['id'])) {echo $_GET['id'];} ?></div>

     <script>
     $(function(){
      $('#entrynav').addClass("active");
      $('#pic').attr('disabled', 'disabled').trigger('chosen:updated');

      var po = document.getElementById('resultpo');
      var name = document.getElementById('resultname');
      var id = document.getElementById('result');

      $("[name='namelist']").chained("[name='pogeneral']");

        // buat ganti isi chosen #series menjadi isi yang chained
        $("[name='namelist']").trigger("chosen:updated");
        //buat refresh #series setiap #series diganti
        $("[name='pogeneral']").bind("change", function(){
        $("[name='namelist']").trigger("chosen:updated")
        });

        $('#subfamilyasset').chained('#familyasset');
        $('#unitasset').chained('#subfamilyasset');

         $("#sublocation").chained("#mainlocation");
         $("#unitlocation").chained("#sublocation");

        $('#choosepo2 option[value="a|'+po.innerHTML+'"]').attr('selected', 'selected');
        $('#choosepo2').trigger('chosen:updated');
   
        if($('#choosepo2 option:selected').text() == "--"){
          $('#locationForm input, #locationForm textarea').attr('disabled', 'disabled');
          $('#locationForm select, #detailForm select').attr('disabled', 'disabled');
        }
        var base_url = "<?php echo base_url();?>"
        
        $('#choosename').on('change',function(){
            $('#countAsset').empty();
        
            $('#chooseid5').empty().trigger('chosen:updated');

            $('#mid-content table').empty(); $('#choosepo2 option[value="'+name.innerHTML+'"]').attr('selected', 'selected').trigger('chosen:updated');
            $('#choosename option[value="'+name.innerHTML+'"]').attr('selected', 'selected').trigger('chosen:updated'); 
            pophoto = $('#choosepo2 option:selected').text();
            namephoto = $('#choosename option:selected').val();

            $('#photo').attr("src", "")
            $('#inputfile').val('');

            if($('#choosepo2 option:selected').text() == "--" || $('#chooseid5 option').length == 0){
             $('input, button, #locationForm textarea').attr('disabled', 'disabled');
             $('#locationForm select, #detailForm select').attr('disabled', 'disabled');
             $('#pic').attr('disabled', 'disabled').trigger('chosen:updated');
             $('#maincontainer input').removeAttr('disabled');
            }else{
             $('input, button').removeAttr('disabled');
             $('select').removeAttr('disabled'); 
             $('textarea').removeAttr('disabled'); 
             $('#pic').removeAttr('disabled').trigger('chosen:updated');
            }

            

             
            
                $.ajax({
                type:"POST",
                url: base_url+"/crud/proses_ajax6",
                data: {pophoto:pophoto,
                      namephoto:namephoto},

                success: function(data){
                  var json = jQuery.parseJSON(data);
                  $('#chooseid5').empty();
                   $('#countAsset').empty();
                    $.each(json, function(i, item){
                      $('#chooseid5').append('<option value="'+item.asset_id+'">'+item.asset_id+'</option>').trigger('chosen:updated');

                      $('#assetid').val($('#chooseid5 option:selected').val());
                      //$('#mid-content').append('<tr><td><input type="text" value=""></td></tr>')
                      $('#familyasset option').removeAttr('selected');
                      $('#familyasset option[value="a|'+item.id_family+'"]').attr('selected','selected');
                      $('#familyasset').change();

                      if(item.id_family == 7){
                        $('#binreqLoc').text('*');
                      }

                      $('#barcode').val($('#chooseid5 option:selected').val());
                  });
                     $('#chooseid5 option[value="'+id.innerHTML+'"]').attr('selected', 'selected').trigger('chosen:updated');

                    

                     if($('#chooseid5 option').length == 0){
                      $('#countAsset').empty();
                     }else{
                      $('#countAsset').text($('#chooseid5 option').length +' Asset ID Left');
                      }
                      if($('#chooseid5 option').length == 0){
                        $('input, button, #locationForm textarea').attr('disabled', 'disabled');
                        $('#locationForm select, #detailForm select').attr('disabled', 'disabled');
                        $('#pic').attr('disabled', 'disabled').trigger('chosen:updated');

                        $('#maincontainer input').removeAttr('disabled');
                      }else{
                       $('input, button').removeAttr('disabled');
                       $('select').removeAttr('disabled'); 
                       $('textarea').removeAttr('disabled'); 
                       $('#pic').removeAttr('disabled').trigger('chosen:updated');
                       $('#familyasset').attr('disabled', 'disabled')
                        $('#barcode').attr('disabled', 'disabled')
                      }

                      
                     
                },
                 error: function(data){
                  alert('error');
                }      

                });

                $.ajax({
                type:"POST",
                url: base_url+"/crud/proses_ajax61",
                data: {pophoto:pophoto},

                success: function(data){
                  $('#countName').empty();
                  var json = jQuery.parseJSON(data);
                    $.each(json, function(i, item){

                    if($('#choosepo2 option:selected').text() != "--"){
                      $("#countName").append(item.jumlah+" Asset Name Left")
                    }

                    });
                      
                     
                },
                 error: function(data){
                  alert('error');
                }      

                });
         

        });

        $('#choosepo2').on('change',function(){
            $('#choosename').change();
        });

      $('#choosepo2').change();
      $('#submit').on('click', function(e){
        if($('#purchDate').val() == ""){
          alert("Purchasing Date must be inserted!");
          e.preventDefault();
        }
        if($('#familyasset').val() == "a|7"){
          if($('#mainlocation').val() == ""){
            alert("Main Location must be inserted!");
            e.preventDefault();
          }
        }
      });

      $('#btnRem').on('click',function(){
        $('#photo').attr("src", "")
        $('#inputfile').val('');
      })


      $('#mainlocation').on('change', function(){
        $('#textareaAddress').val('');
        var mainloc = $(this).val().substring(2,4);
         $.ajax({
                type:"POST",
                url: base_url+"/crud/proses_ajax6address",
                data: {mainloc:mainloc},

                success: function(data){
                  if(mainloc == 00){
                    $('#textareaAddress').val('')
                    $('#textareaAddress').removeAttr('readonly')
                  }else{
                    $('#textareaAddress').attr('readonly', 'readonly')
                    var json = jQuery.parseJSON(data);
                      $.each(json, function(i, item){
                        $('#textareaAddress').val(item.address);
                    });
                  }
                    

                      
                     
                },
                 error: function(data){
                  alert('error');
                }      

                });
      })

      $('#submit2').on('click',function(e){
        if($('#purchDate').val() == ""){
          alert("Purchasing Date must be inserted!");
          e.preventDefault();
        }

        if($('#familyasset').val() == "a|7"){
          if($('#mainlocation').val() == ""){
            alert("Main Location must be inserted!");
            e.preventDefault();
          }
        }
      })

    });
        
     </script>

  </html>

