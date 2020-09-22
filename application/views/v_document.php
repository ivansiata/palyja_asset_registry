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
            <li><a href="<?php echo base_url()?>crud/document"><img src="<?php echo base_url()?>assets/documents.png" style="background-color:red; padding:6px 8px 5px 8px; border-radius:80%; box-shadow: 2px 4px 7px; width:80px; height:67px; margin-left:-10px"></a></li>
            <li style="width:16%; padding-top:3px;"><hr></li>
            <li><a href="<?php echo base_url()?>crud/upload_photo"><img src="<?php echo base_url()?>assets/upload.png" style="margin-left:-10px"></a></li>
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
          
   <?php echo form_open('crud/document_proses')?>
    <div style="margin-top:4px" id="maincontainer">
            PO Number: <select id="choosepo2" class="chozen" name="podoc" style="width:80px">
            <option val="">--</option>
            <?php foreach($listpo2 as $kf=>$isi){
                    echo "<option value='a|".$isi->no_po."'>".$isi->no_po."</option>";

            } ?>
            </select>
            &nbsp Asset Name: <select id="choosename" class="chozen" name="namedoc" style="width:150px" data-placeholder="Select PO Number">
            <?php foreach($listname2 as $kf=>$isi){
                    echo "<option value='".$isi->id_assetname."'data-chained='a|".$isi->no_po."'>".$isi->name."</option>";

            } ?>
            </select>
          </div>
    <div id="tableDoc">
      <table style="width:100%;">
        <tr style="text-align:center; border-bottom:10pt solid transparent">
          <th style="width:33%;text-align:center">Document</th>
          <th style="width:33%;text-align:center">PIC</th>
          <th style="width:33%;text-align:center">Document Year</th>
        </tr>
      
        <?php foreach($document as $kf=>$isi){
          echo "<tr style='border-bottom:10pt solid transparent;'>
            <td style='padding-left:11%;'><input type='checkbox' name='document[]' class='document' id='document".$kf."' value='".$isi->id_namadoc."' disabled>".$isi->namadocument."</td>
            <td style='padding-left:7.5%;'>
              <select class='chozen pic' name='podept[]' id='pic".$kf."' style='width: 160px;'>
                <option value=''>--</option>";
                  foreach($pic as $kff=>$isi){
                    echo "<option value=".$isi->id_dept." ".set_select('pic',$isi->id_dept).">".$isi->workingunit."</option>";
                  }
                echo "<td style='text-align-last:center'><select name='yearpicker[]' class='yearpicker' id='yearpicker".$kf."'>
                    <option value=''>--</option>
                  </select>
                  </td>";   
                } ?>
              </select>
            
        
        

    </div>

    <tr><td><strong><input type="submit" name="submitDoc" id="buttonSub" value="SUBMIT"></strong> &nbsp <input type="checkbox" value="next" name="next" style="vertical-align:top"> Next to Photo Upload</td></tr>

  </table>
  </form>

  <div id ="result" hidden><?php if(isset($_GET['po'])) {echo $_GET['po'];} ?></div>
  <div id="resultname" hidden><?php if(isset($_GET['name'])) {echo $_GET['name'];} ?></div>

     <script>
     $(function(){
      $("[name='namedoc']").chained("[name='podoc']");

        // buat ganti isi chosen #series menjadi isi yang chained
        $("[name='namedoc']").trigger("chosen:updated");
        //buat refresh #series setiap #series diganti
        $("[name='podoc']").bind("change", function(){
        $("[name='namedoc']").trigger("chosen:updated")
        });

        var po = document.getElementById('result');
        var name = document.getElementById('resultname');

        $('#choosepo2 option[value="a|'+po.innerHTML+'"]').attr('selected', 'selected');
        $('#choosepo2').trigger('chosen:updated');



      for(i=0; i<18; i++){
        if(!$('input #document'+i).is(":checked")){
          $('#pic'+i).attr('disabled','disabled').trigger("chosen:updated");
          $('#yearpicker'+i).attr('disabled','disabled'); 
        }
      }

      var counter = 0;
      for(i=0; i<18; i++){
        $('#document'+i).on('change', function(){
          var la =this.value -1;
          if(this.checked){
            $('#pic'+la).removeAttr('disabled').trigger("chosen:updated");
            $('#yearpicker'+la).removeAttr('disabled'); 
            $('#pic'+la+' option[value=""]').removeAttr('selected').trigger("chosen:updated");
            $('#yearpicker'+la+' option[value=""]').removeAttr('selected'); 
          }
          if(!this.checked){
            $('#pic'+la).attr('disabled','disabled').trigger("chosen:updated");
            $('#yearpicker'+la).attr('disabled','disabled'); 
             
            $('#pic'+la+' option[value=""]').attr('selected','selected').trigger("chosen:updated");
            $('#yearpicker'+la+' option[value=""]').attr('selected','selected'); 
          }
        });
      }

      $('#choosename').on('change', function(){
        $('.document').removeAttr('disabled');
        if($('#choosename option:selected').length == 0){
          $('.document').attr('disabled', 'disabled');
        }
      });

      $('#buttonSub').on('click', function(e){
      
       for(i = 0; i<17 ;i++){
          if($('select#pic'+i+':enabled').val() == ""){
            alert("Select PIC "+(i+1));
            e.preventDefault();
          }else if($('select#yearpicker'+i+':enabled').val() == ""){
            alert("Select Document Year "+(i+1));
            e.preventDefault();
          }
        }
        
      });

      var base_url = "<?php echo base_url();?>";

      $('#choosename').on('change',function(){
        var podoc = $('#choosepo2 option:selected').text();
        var namedoc = $('#choosename option:selected').val();
        $(':checkbox').prop('checked',false);
        $('.pic').attr('disabled','disabled').trigger("chosen:updated");
        $('.yearpicker').attr('disabled','disabled').trigger("chosen:updated");
        $(':checkbox').removeAttr('disabled');
         if(podoc !="--"){
           $.ajax({
            type:"POST",
            url: base_url+"/crud/proses_ajax3",
            data: {podoc:podoc,
                  namedoc:namedoc},

            success: function(data){
              var json = jQuery.parseJSON(data);
              $.each(json,function(i,item){
                $(':checkbox[value='+item.id_namadoc+']').prop('checked',true);
                $(':checkbox[value='+item.id_namadoc+']').attr('disabled','disabled');
                 
              })
            },
            error: function(data){
              alert("error");
            }
         });
        };
      });

        $('#choosepo2').on('change',function(){
        var podoc = $('#choosepo2 option:selected').text();
        var namedoc = $('#choosename option:selected').val();
        $(':checkbox').prop('checked',false);
        $('.pic').attr('disabled','disabled').trigger("chosen:updated");
        $('.yearpicker').attr('disabled','disabled').trigger("chosen:updated");
        $(':checkbox').removeAttr('disabled');
         if(podoc !="--"){
           $.ajax({
            type:"POST",
            url: base_url+"/crud/proses_ajax3",
            data: {podoc:podoc,
                  namedoc:namedoc},

            success: function(data){
              var json = jQuery.parseJSON(data);
              $.each(json,function(i,item){
               
                $(':checkbox[value='+item.id_namadoc+']').prop('checked',true);
                $(':checkbox[value='+item.id_namadoc+']').attr('disabled','disabled');
              })
            },
            error: function(data){
              alert("error");
            }
         });
        }else{
              $('.document').attr('disabled', 'disabled');
        }
      });
       if(po.innerHTML != ""){
        $('#choosepo2').change();
      }
    });
    </script>

  </html>

