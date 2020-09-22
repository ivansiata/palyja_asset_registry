          <script>
           $(function(){
           $('#entrynav').addClass("active");
         });
           </script>

          <div id="inputPage" style="margin-left:7%; margin-top:2%;">
          <ul class="nav nav-pills" style="margin-top: 25px; height:60px;">
            <li role="presentation"><a href="<?php echo base_url()?>crud/entry_data"><img src="<?php echo base_url()?>assets/po2.png" style="opacity:0.4"></a></li>
            <li style="width:37.4%;padding-top:3px;"><hr></li>
            <li class ="active"><a href="<?php echo base_url()?>crud/entry_data21"><img src="<?php echo base_url()?>assets/general.png" style="background-color:red; padding:6px 8px 5px 8px; border-radius:80%; box-shadow: 2px 4px 7px; width:80px; height:67px; margin-left:-7px"></a></li>
            <li style="width:37.35%; padding-top:3px; " ><hr></li>
            <li><a href="<?php echo base_url()?>crud/entry_data3"><img src="<?php echo base_url()?>assets/detail2.png" style="opacity:0.4"></a></li>
            
          </ul>
          <ul class="nav nav-pills" style="margin-top: 3px; margin-left:-1.2%">
            <li role="presentation">Purchase Order</li>
            <li style="width:35.4%;padding-top:3px;"></li>
            <li class ="active">Asset Generals</li>
            <li style="width:36.3%; padding-top:3px;"></li>
            <li>Asset Details</li>
           
          </ul>
          </div>
          
    <?php echo form_open('crud/insertgeneral')?>
    <div style="margin-top:4px">
            PO Number: <select id="choosepo" class="chozen" name="pogeneral" style="width:103px">
            <option value="">--</option>
            <option value="NULL">Without PO</option>
            <?php foreach($listpo as $kf=>$isi){
                    echo "<option value=".$isi->no_po;
                    
                    echo ">".$isi->no_po."</option>";

            } ?>
            </select>
          </div>
    <div id="table">
      <table id ="mainTable" class="custom" border="1">
        <tr>
          <th style="width:3%">No</th>
          <th style="width:10%" id= "tName">Asset Name</th>
          <th id= "tD">Owner</th>
          <th id= "tSurv">Family</th>
          <th id= "tFam">Quantity</th>
          <th style="width:15%" id= "tPoDept">PO Department</th>
          <th style="width:15%" id= "tPoPic">PO PIC</th>
        </tr>
        <?php
        $counter = 0;
        for($i = 0; $i<10; $i++){
            $bla = $counter%2;
            if($bla != 0){
            ?>

            <tr>
              <td><?php echo $i+1 ?></td>
              <td class="row10"><select class="chozen required name" name="name[]" id="name<?php echo $i ?>">
                      <option value="">--</option>
                       <?php foreach($assetname as $kf=>$isi){
                          echo "<option value=".$isi->id_assetname." ".set_select('name',$isi->id_assetname).">".$isi->name."</option>";
                        } ?>
                      </select></td>
              <td class="row11"><select class="chozen required" name="owner[]" id="owner<?php echo $i ?>">
                      <option value="">--</option>
                       <?php foreach($owner as $ow=>$isi){
                          echo "<option value=".$isi->id." ".set_select('owner',$isi->id).">".$isi->owner."</option>";
                        } ?>
                      </select></td>
              <td class="row10"><select class="chozen required" name="family[]" id="family<?php echo $i ?>">
                      <option value="">--</option>
                       <?php 
                       foreach($family as $fam=>$isi){ 
                        $ostring = $isi->family."|".$isi->id_familyasset;
                        $nstring = str_replace(' ','', $ostring);
                        echo "<option value=".$nstring." ".set_select('family',$nstring).">".$isi->family."</option>";
                        } ?>
                      </select></td>
              
              <td class="row11"><input type="number" max="100" name="quan[]" id="quan<?php echo $i ?>"></td>
              <td id="PoDept" class="row10 PoDept"></td>
              <td  class="row11 PoPic"></td>
            </tr>
          
          <?php
              
            }else{
            ?>  
            <tr>
              <td><?php echo $i+1 ?></td>
              <td id= "tAssetName" class="row1"><select class="chozen required name" name="name[]" id="name<?php echo $i ?>">
                      <option value="">--</option>
                       <?php foreach($assetname as $kf=>$isi){
                          echo "<option value=".$isi->id_assetname." ".set_select('name',$isi->id_assetname).">".$isi->name."</option>";
                        } ?>
                      </select></td></td>
              <td id= "tOwner"><select class="chozen required" name="owner[]" id="owner<?php echo $i ?>">
                      <option value="">--</option>
                       <?php foreach($owner as $ow=>$isi){
                          echo "<option value=".$isi->id." ".set_select('owner',$isi->id).">".$isi->owner."</option>";
                        } ?>
                      </select></td>
              <td id= "tFam" class="row1"><select class="chozen required" name="family[]" id="family<?php echo $i ?>">
                      <option value="">--</option>
                       <?php 
                       foreach($family as $fam=>$isi){ 
                        $ostring = $isi->family."|".$isi->id_familyasset;
                        $nstring = str_replace(' ','', $ostring);
                        echo "<option value=".$nstring." ".set_select('family',$nstring).">".$isi->family."</option>";
                        } ?>
                      </select></td>
            
              <td id= "tQuan"><input type="number" max="100" name="quan[]" id="quan<?php echo $i ?>"></td>
              <td id= "tPoDept" class="row1 PoDept"></td>
              <td id= "tPoPic" class="PoPic"></td>
            </tr>

          <?php
            }
            $counter++;
            }
          ?>
      </table>
      <input type="submit" value="SAVE" id="buttonSub">
      <span class="binreq" style="float:right;">*all columns per inserted row are required</span>
    </div>
    </form>
    
    <div id="result" hidden><?php if(isset($_GET['po'])) {echo $_GET['po'];} ?></div>
    <div id="error" hidden><?php if(isset($_GET['error'])) {echo $_GET['error'];} ?></div>

   <script>
  $(function(){

      $('#realWrapper').css("min-height", "148vh");
      $('#entrynav').addClass("active");
      if($('#error').text() == 'true'){
        alert('Cannot insert multiple asset on one PO number!');
      }

      var base_url = "<?php echo base_url();?>";
      $('#choosepo').on('change', function(){
          var po = $('#choosepo option:selected').text();

          
          $(' table input').removeAttr('disabled');
          $(' table select').removeAttr('disabled').trigger('chosen:updated');

          if(this.value == ""){
            $(' table input').attr('disabled', 'disabled');
            $(' table select').attr('disabled', 'disabled').trigger('chosen:updated');
          }

          if(this.value == "NULL" || this.value == ""){
            $(".PoDept").text("");
            $(".PoPic").text("");
          }


          $.ajax({
            type:"POST",
            url: base_url+"/crud/proses_ajax/"+po,
            data: "po="+po,
    
            success: function(data){
              var json = jQuery.parseJSON(data);
              $.each(json,function(i,item){
                $('.PoDept').text(item.workingunit);
              });
               $.each(json,function(i,item){
                $('.PoPic').text(item.porequestor);
              });
            },
            error: function(data){
              alert('error');
            }
          });
        });

    var popilih = document.getElementById('result');
    $('#choosepo option[value="'+popilih.innerHTML+'"]').attr('selected', 'selected');
    $('#choosepo').trigger('chosen:updated');
    $('#choosepo').change();

    if($('#choosepo').val() == ""){
      $(' table input').attr('disabled', 'disabled');
      $(' table select').attr('disabled', 'disabled').trigger('chosen:updated');
    }

    $('#buttonSub').on('click', function(e){
      for(i=0; i<10; i++){
        if($('#name'+i).val() != ""){
          if($('#owner'+i).val() == "" || $('#family'+i).val() == "" || $('#quan'+i).val() == ""){
            alert('Asset '+(i+1)+' Attributes are Mandatory!');
            e.preventDefault();
          }
        }else if($('#owner'+i).val() != ""){
          if($('#nama'+i).val() == "" || $('#family'+i).val() == "" || $('#quan'+i).val() == ""){
            alert('Asset '+(i+1)+' Attributes are Mandatory!');
            e.preventDefault();
          }
        }else if($('#family'+i).val() != ""){
          if($('#nama'+i).val() == "" || $('#owner'+i).val() == "" || $('#quan'+i).val() == ""){
            alert('Asset '+(i+1)+' Attributes are Mandatory!');
            e.preventDefault();
          }
        }else if($('#quan'+i).val() != ""){
          if($('#nama'+i).val() == "" || $('#owner'+i).val() == "" || $('#family'+i).val() == ""){
            alert('Asset '+(i+1)+' Attributes are Mandatory!');
            e.preventDefault();
          }
        }
      }
    });
    $('#mainTable .chosen-container').css('width', '240px');
  });

</script> 
  </html>

