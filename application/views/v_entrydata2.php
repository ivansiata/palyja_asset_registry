 <div class="col-sm-9 col-sm-offset-3 col-md-11 col-md-offset-1 main">
          <ul class="nav nav-tabs" style="margin-top:-25px;">
            <li role="presentation"><a href="<?php echo base_url().'crud/' ?>">Main</a></li>
            <li  class ="active"><a href="<?php echo base_url()?>crud/entry_data">Entry Data</a></li>
            <li><a href="<?php echo base_url()?>crud/add_data">Input Data</a></li>
            <li ><a href="">Advance Search</a></li>
          </ul>

          <div id="inputPage" style="margin-left:15%; margin-top:2%;">
          	<ul class="nav nav-pills" style="margin-top: 25px;">
            <li role="presentation"><a href="<?php echo base_url()?>crud/entry_data"><span class="glyphicon glyphicon-ok-circle" style="font-size:50px;"></a></span></li>
            <li style="width:20%;padding-top:3px;"><hr></li>
            <li class ="active"><span class="glyphicon glyphicon-ok-sign " style="font-size:50px;"></span></li>
            <li style="width:20%; padding-top:3px;"><hr></li>
            <li><span class="glyphicon glyphicon-ok-circle" style="font-size:50px;"></span></li>
            <li style="width:20.2%; padding-top:3px;"><hr></li>
            <li><span class="glyphicon glyphicon-ok-circle" style="font-size:50px;"></span></li>
          </ul>
          </div>

          <div id="main">
	          <?php echo form_open('crud/entry_data2_proses')?>
            <div id="inputForm2"> 
              <table>
                <tr>
                  <td colspan="2"><span style="margin-left:28%;">PO Number : &nbsp <input type="text" 
                    value="<?php echo $nomorpo ?>" style="border:none; background-color:transparent; width:40px" name="nomorpo" readonly></span></td>
                </tr>
                <tr>
                  <td>Owner</td>
                  <td>
                    <select class="chozen" name="owner" id="owner" style="width: 150px;">
                    <option value="">--</option>
                     <?php foreach($owner as $ow=>$isi){
                        echo "<option value=".$isi->id." ".set_select('owner',$isi->id).">".$isi->owner."</option>";
                      } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Family</td>
                  <td>
                    <select class="chozen" id="family" name="family" id="family" style="width: 150px;">
                    <option value="">--</option>
                     <?php 
                     foreach($family as $fam=>$isi){ 
                      $ostring = $isi->family."|".$isi->id_familyasset;
                      $nstring = str_replace(' ','', $ostring);
                      echo "<option value=".$nstring." ".set_select('family',$nstring).">".$isi->family."</option>";
                      } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td style="width:100px;">Key Facilities</td>
                  <td>
                    <select class="chozen" name="keyfac" id="keyfac" style="width: 150px;">
                    <option value="">--</option>
                     <?php foreach($keyfac as $kf=>$isi){
                        echo "<option value=".$isi->id." ".set_select('keyfac',$isi->id).">".$isi->facilities_name."</option>";
                      } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Asset Name</td>
                  <td>
                    <select class="chozen" name="name" id="name" style="width: 150px;">
                    <option value="">--</option>
                     <?php foreach($assetname as $kf=>$isi){
                        echo "<option value=".$isi->id_assetname." ".set_select('name',$isi->id_assetname).">".$isi->name."</option>";
                      } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Quantity</td>
                  <td><input type="text" name="quan" style="width:40px" maxlength="2"></td>
                </tr>

              <tr>
                <td><br><input type="submit" name="submit" value="SAVE"></td>
              </tr>
              </table>
               </div>
	     </div>
  </div>
	      