 <div class="col-sm-9 col-sm-offset-3 col-md-11 col-md-offset-1 main">
          <ul class="nav nav-tabs" style="margin-top:-25px;">
            <li role="presentation"><a href="<?php echo base_url().'crud/' ?>">Main</a></li>
            <li  class ="active"><a href="<?php echo base_url()?>crud/entry_data">Entry Data</a></li>
            <li><a href="<?php echo base_url()?>crud/add_data">Input Data</a></li>
            <li ><a href="">Advance Search</a></li>
          </ul>

          <div id="inputPage" style="margin-left:7%; margin-top:2%;">
          <ul class="nav nav-pills" style="margin-top: 25px; height:65px;">
            <li role="presentation"><a href="<?php echo base_url()?>crud/entry_data"><img src="<?php echo base_url()?>assets/po2.png" style="opacity:0.6"></a></li>
            <li style="width:37.9%;padding-top:3px;"><hr></li>
            <li class ="active"><a href="<?php echo base_url()?>crud/entry_data21"><img src="<?php echo base_url()?>assets/general.png" style="opacity:0.6"></a></li>
            <li style="width:37.3%; padding-top:3px; " ><hr></li>
            <li><a href="<?php echo base_url()?>crud/entry_data3"><img src="<?php echo base_url()?>assets/detail2.png" style="background-color:red; padding:6px 8px 5px 8px; border-radius:80%; box-shadow: 2px 4px 7px; width:80px; height:67px; margin-left:0px"></a></li>
            
          </ul>

          <ul class="nav nav-pills" style="margin-top: 3px; margin-left:-1.2%">
            <li role="presentation">Purchase Order</li>
            <li style="width:35.2%;">&nbsp</li>
            <li class ="active">Asset Generals</li>
            <li style="width:36.3%;">&nbsp</li>
            <li>Asset Details</li>
            
          </ul>
          </div>
    
  <?php echo form_open('crud/updatedetail')?>
    <div style="margin-top:4px" id="maincontainer">
            PO Number: <select id="choosepo2" class="chozen" name="pogeneral" style="width:80px">
            <option>--</option>
            <?php foreach($listpo2 as $kf=>$isi){
                    echo "<option value='a|".$isi->no_po."'>".$isi->no_po."</option>";

            } ?>
            </select>
            &nbsp Asset Name: <select id="choosename" class="chozen" name="namelist" style="width:150px" data-placeholder="Select PO Number">
            <?php foreach($listname2 as $kf=>$isi){
                    echo "<option value='".$isi->id_assetname."'data-chained='a|".$isi->no_po."'>".$isi->name."</option>";

            } ?>
            </select>
          </div>
    <div id="table" style="width:100%px; height:100%; overflow:scroll;">
      <table id ="mainTable" class="custom" border="1" style="width:150%;">
        <tr>
          <th style="width:3%">No</th>
          <th id= "tAsstId">Asset ID</th>
          <th id= "tUnitAsset">Unit Asset</th>
          <th id= "tBarc">Barcode</th>
          <th id= "tBrand">Brand</th>
          <th id= "tType">Type</th>
          <th id= "tDimen">Dimension</th>
          <th id= "tSernum">Serial Number</th>
          <th id= "tStatus">Status</th>
          <th id= "tPurchDate">Purchasing Date</th>
          <th id= "tInstDate">Install Date</th>
        </tr>
    

            <tr class="assetidtr">
             
              
            </tr>
          
         
      </table>
      
    </div>

    <input type="submit" value="SAVE">
    &nbsp &nbsp <input type="checkbox" value="next" name="next" style="vertical-align:top"> Next to Document Entry 

    </form>
     <div id="result" hidden><?php if(isset($_GET['po'])) {echo $_GET['po'];} ?></div>

     <script>
     $(function(){
      $("[name='namelist']").chained("[name='pogeneral']");

        // buat ganti isi chosen #series menjadi isi yang chained
        $("[name='namelist']").trigger("chosen:updated");
        //buat refresh #series setiap #series diganti
        $("[name='pogeneral']").bind("change", function(){
        $("[name='namelist']").trigger("chosen:updated")
        });

        var po = document.getElementById('result');
        $('#choosepo2 option[value="a|'+po.innerHTML+'"]').attr('selected', 'selected');
        $('#choosepo2').trigger('chosen:updated');
        

        var base_url = "<?php echo base_url();?>"
        var po2 = $('#choosepo2 option:selected').text();
        var name2 = $('#choosename option:selected').val();

        
        $('#choosepo2').on('change', function(){
        var po2 = $('#choosepo2 option:selected').text();
        var name2 = $('#choosename option:selected').val();
        if(po2 != "--"){
          $.ajax({
            type:"POST",
            url: base_url+"/crud/proses_ajax2",
            data: {po2:po2,
                  name2:name2},
    
            success: function(data){
              var json = jQuery.parseJSON(data);
              $(".assetidtr").remove();
              $.each(json,function(i,item){
              if(i%2 != 0){
               $(".custom").append('<tr class="assetidtr">'+
                '<td>'+(i+1)+'</td>'+
                '<td class="assetid row10"><input type="text" name="assetid[]" value="'+item.asset_id+'" readonly></td>'+
                '<td id="statuss" class="row1"><select class="status" style="width: 100px;" name="unitasset[]" id="unitasset'+i+'"><option value="">--</option><?php foreach($unitasset as $kf=>$isi){echo "<option value=".$isi->id_unitasset.">".$isi->unitasset."</option>";} ?></select></td>'+
                '<td class="row10"><input type="text" id="barcode" name="barcode[]" value="'+item.barcode+'" class="assetid"></td>'+
                '<td class="row11"><input type="text" id="brand" name="brand[]" class="assetid"></td>'+
                '<td class="row10"><input type="text" id="type" name="type[]" class="assetid"></td>'+
                '<td class="row11"><input type="text" id="dimension" name="dimension[]" class="assetid"></td>'+
                '<td class="row10"><input type="text" id="sernum" name="sernum[]" class="assetid"></td>'+
                '<td id="statuss" class="row10"><select class="status" style="width: 100px;" name="status[]" id="status'+i+'"><option value="">--</option><?php foreach($status as $kf=>$isi){echo "<option value=".$isi->id_status.">".$isi->status."</option>";} ?></select></td>'+
                '<td class="row11"><input type="date" id="purchdate" name="purchdate[]" class="assetid" style="padding-left:35px;"></td>'+
                '<td class="row10"><input type="date" id="instdate" name="instdate[]" class="assetid" style="padding-left:35px;"></td></tr>');
              }else{
                $(".custom").append('<tr class="assetidtr">'+
                '<td>'+(i+1)+'</td>'+
                '<td class="assetid row1"><input type="text" name="assetid[]" value="'+item.asset_id+'" readonly></td>'+
                '<td id="statuss" class="row1"><select class="status" style="width: 100px;" name="unitasset[]" id="unitasset'+i+'"><option value="">--</option><?php foreach($unitasset as $kf=>$isi){echo "<option value=".$isi->id_unitasset.">".$isi->unitasset."</option>";} ?></select></td>'+
                '<td class="row1"><input type="text" id="barcode" name="barcode[]" value="'+item.barcode+'" class="assetid"></td>'+
                '<td><input type="text" id="brand" name="brand[]" class="assetid"></td>'+
                '<td class="row1"><input type="text" id="type" name="type[]" class="assetid"></td>'+
                '<td><input type="text" id="dimension" name="dimension[]" class="assetid"></td>'+
                '<td class="row1"><input type="text" id="sernum" name="sernum[]" class="assetid"></td>'+
                '<td id="statuss" class="row1"><select class="status" style="width: 100px;" name="status[]" id="status'+i+'"><option value="">--</option><?php foreach($status as $kf=>$isi){echo "<option value=".$isi->id_status.">".$isi->status."</option>";} ?></select></td>'+
                '<td><input type="date" id="purchdate" name="purchdate[]" class="assetid" style="padding-left:35px;"></td>'+
                '<td class="row1"><input type="date" id="instdate" name="instdate[]" class="assetid" style="padding-left:35px;"></td></tr>');
              }
                $('#status'+i+' option[value='+item.id_status+']').attr('selected','selected');
                $('#unitasset'+i+' option[value='+item.id_unitasset+']').attr('selected','selected');
                $('input[value=null]').val("");
              });
              $(".status").css({"width":"100%","height":"100%","text-align-last":"center","padding-left":"15px"});
            },
            error: function(data){
              alert('error');
            }
          });
    }
    });

$('#choosename').on('change', function(){
          var po2 = $('#choosepo2 option:selected').text();
          var name2 = $('#choosename option:selected').val();

          if(po2 !="--"){
          $.ajax({
            type:"POST",
            url: base_url+"/crud/proses_ajax2",
            data: {po2:po2,
                  name2:name2},
    
            success: function(data){
              var json = jQuery.parseJSON(data);
              $(".assetidtr").remove();
              $.each(json,function(i,item){
              if(i%2 != 0){
               $(".custom").append('<tr class="assetidtr">'+
                '<td>'+(i+1)+'</td>'+
                '<td class="assetid row10"><input type="text" name="assetid[]" value="'+item.asset_id+'" readonly></td>'+
                '<td id="statuss" class="row1"><select class="status" style="width: 100px;" name="unitasset[]" id="unitasset'+i+'"><option value="">--</option><?php foreach($unitasset as $kf=>$isi){echo "<option value=".$isi->id_unitasset.">".$isi->unitasset."</option>";} ?></select></td>'+
                '<td class="row10"><input type="text" id="barcode" name="barcode[]" class="assetid"></td>'+
                '<td class="row11"><input type="text" id="brand" name="brand[]" class="assetid"></td>'+
                '<td class="row10"><input type="text" id="type" name="type[]" class="assetid"></td>'+
                '<td class="row11"><input type="text" id="dimension" name="dimension[]" class="assetid"></td>'+
                '<td class="row10"><input type="text" id="sernum" name="sernum[]" class="assetid"></td>'+
                '<td id="statuss" class="row10"><select class="status" style="width: 100px;" name="status[]" id="status'+i+'"><option value="">--</option><?php foreach($status as $kf=>$isi){echo "<option value=".$isi->id_status.">".$isi->status."</option>";} ?></select></td>'+
                '<td class="row11"><input type="date" id="purchdate" name="purchdate[]" class="assetid" style="padding-left:35px;"></td>'+
                '<td class="row10"><input type="date" id="instdate" name="instdate[]" class="assetid" style="padding-left:35px;"></td></tr>');
              }else{
                $(".custom").append('<tr class="assetidtr">'+
                '<td>'+(i+1)+'</td>'+
                '<td class="assetid row1"><input type="text" name="assetid[]" value="'+item.asset_id+'" readonly></td>'+
                '<td id="statuss" class="row1"><select class="status" style="width: 100px;" name="unitasset[]" id="unitasset'+i+'"><option value="">--</option><?php foreach($unitasset as $kf=>$isi){echo "<option value=".$isi->id_unitasset.">".$isi->unitasset."</option>";} ?></select></td>'+
                '<td class="row1"><input type="text" id="barcode" name="barcode[]" class="assetid"></td>'+
                '<td><input type="text" id="brand" name="brand[]" class="assetid"></td>'+
                '<td class="row1"><input type="text" id="type" name="type[]" class="assetid"></td>'+
                '<td><input type="text" id="dimension" name="dimension[]" class="assetid"></td>'+
                '<td class="row1"><input type="text" id="sernum" name="sernum[]" class="assetid"></td>'+
                '<td id="statuss" class="row1"><select class="status" style="width: 100px;" name="status[]" id="status'+i+'"><option value="">--</option><?php foreach($status as $kf=>$isi){echo "<option value=".$isi->id_status.">".$isi->status."</option>";} ?></select></td>'+
                '<td><input type="date" id="purchdate" name="purchdate[]" class="assetid" style="padding-left:35px;"></td>'+
                '<td class="row1"><input type="date" id="instdate" name="instdate[]" class="assetid" style="padding-left:35px;"></td></tr>');
              }
                $('#status'+i+' option[value='+item.id_status+']').attr('selected','selected');
                $('#unitasset'+i+' option[value='+item.id_unitasset+']').attr('selected','selected');
                $('input[value=null]').val("");
              });
              $(".status").css({"width":"100%","height":"100%","text-align-last":"center","padding-left":"15px"});
            },
            error: function(data){
              alert('error');
            }
          });
        }

        });


      $('#choosepo2').change();
      });

     </script>

  </html>

