<div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times</button>
          <h4 class="modal-title">Asset Status Details</h4>
        </div>
        <div class="modal-body" style="max-height: 460px; overflow: auto">
        <table id ="conditionTable" class="table table-hover">
          <tr>
            <th style="width:2%;">No</th>
            <th id= "tCondition">Status</th>
            <th id= "tQuanity">Quantity</th>
            <th id= "tPercentage">Percentage</th>
          </tr>
          <?php foreach($statusAsset as $kf=>$isi){ ?>
            <tr onclick="openInNewTab('<?php echo base_url();?>crud/viewStatusList?status='+<?php echo $kf+1 ?>);">
              <td><?php echo $kf+1 ;?></td>
              <td><?php echo $isi->status ;?></td>
              <td><?php echo $isi->jumlah ;?></td>
              <td><?php foreach($totalAsset as $kf=>$isi2){ echo round($isi->jumlah/$isi2->total *100, 2); echo " %"; }?></td>
            </tr>
          <?php }?>
           
         </table>
        </div>
      </div>
    </div>
</div>

<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times</button>
          <h4 class="modal-title">Asset Condition Details</h4>
        </div>
        <div class="modal-body" style="max-height: 460px; overflow: auto">
          <table id ="conditionTable" class="table table-hover">
              <tr>
                <th style="width:2%;">No</th>
                <th id= "tCondition">Condition</th>
                <th id= "tQuanity">Quantity</th>
                <th id= "tPercentage">Percentage</th>
              </tr>
              <?php foreach($overallScore as $kf=>$isi){ ?>
                <tr onclick="openInNewTab('<?php echo base_url();?>crud/viewConditionList?condition='+<?php echo $kf+1 ?>);">
                  <td><?php echo $kf+1 ;?></td>
                  <td><?php echo $isi->condition ;?></td>
                  <td><?php echo $isi->jumlah ;?></td>
                  <td><?php foreach($totalAsset as $kf=>$isi2){ echo round($isi->jumlah/$isi2->total *100, 2); echo " %"; }?></td>
                </tr>
              <?php }?>
               
             </table>
        </div>
      </div>
    </div>
</div>

<div id="myModal3" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times</button>
          <h4 class="modal-title">Outstanding Purchase Order Details</h4>
        </div>
        <div class="modal-body" style="max-height: 460px; overflow: auto">
          <table id ="conditionTable" class="table table-hover">
                  <tr>
                    <th style="width:2%;">No</th>
                    <th id= "tDepartment">Department</th>
                    <th id= "tQuanity">Quantity</th>
                    <th id= "tPercentage">Percentage</th>
                  </tr>
                  <?php foreach($tabelOutstanding as $kf=>$isi){ ?>
                    <tr>
                      <td><?php echo $kf+1 ;?></td>
                      <td><?php echo $isi->department ;?></td>
                      <td><?php echo $isi->jumlah ;?></td>
                      <td><?php foreach($totalCapexData as $kf=>$isi2){ echo round($isi->jumlah/$isi2->total *100, 2); echo " %"; }?></td>
                    </tr>
                  <?php }?>
                   
                 </table>
        </div>
        <div  class="modal-footer">
          <center onclick="openInNewTab('<?php echo base_url();?>crud/viewCapexOpex?view=3')"><a href="#">View Outstanding Data List</a></center>
        </div>
      </div>
    </div>
</div>

<div id="myModal4" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times</button>
          <h4 class="modal-title">Outstanding Purchase Order Details</h4>
        </div>
        <div class="modal-body" style="max-height: 460px; overflow: auto">
          <table id ="conditionTable" class="table table-hover">
                  <tr>
                    <th style="width:2%;">No</th>
                    <th id= "tDepartment">Department</th>
                    <th id= "tQuanity">Quantity</th>
                    <th id= "tPercentage">Percentage</th>
                  </tr>
                  <?php foreach($tabelOutstanding as $kf=>$isi){ ?>
                    <tr>
                      <td><?php echo $kf+1 ;?></td>
                      <td><?php echo $isi->department ;?></td>
                      <td><?php echo $isi->jumlah ;?></td>
                      <td><?php foreach($totalCapexData as $kf=>$isi2){ echo round($isi->jumlah/$isi2->total *100, 2); echo " %"; }?></td>
                    </tr>
                  <?php }?>
                   
                 </table>
        </div>
        <div  class="modal-footer">
          <center onclick="openInNewTab('<?php echo base_url();?>crud/viewCapexOpex?view=3')"><a href="#">View Outstanding Data List</a></center>
        </div>
      </div>
    </div>
</div>

<div id="myModal5" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times</button>
          <h4 class="modal-title">Building Criticality</h4>
        </div>
        <div class="modal-body" style="max-height: 460px; overflow: auto">
          <table id ="conditionTable" class="table table-hover">
                  <tr>
                    <th style="width:2%;">No</th>
                    <th id= "tDepartment">Nama Bangunan</th>
                    <th id= "tQuanity">Sipil</th>
                    <th id= "tQuanity">Arsitektur</th>
                    <th id= "tQuanity">Mekanikal</th>
                    <th id= "tQuanity">Elektrikal</th>
                    <th id= "tQuanity">Sistem Pemipaan</th>
                    <th id= "tPercentage">Nilai Prioritas</th>
                  </tr>
                  <?php foreach($hasilCriciality as $kf=>$isi){ ?>
                    <tr onclick="openInNewTab('<?php echo base_url();?>crud/search?owner=&family=&keyfac=&loc=&column=d.asset_id&searchBy=like&search='+<?php echo $isi->asset_id; ?>);">
                      <td><?php echo $kf+1 ;?></td>
                      <td><?php echo $isi->nama ;?></td>
                      <?php $obj = $myClass->proses_ajaxHasilCategory($isi->id_building);?>
                      <td><?php echo round($isi->total, 3) ;?></td>
                    </tr>
                  <?php }?>
                   
                 </table>
        </div>
      </div>
    </div>
</div>

<div id="myModal6" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times</button>
                    <h4 class="modal-title">View Assessment Report</h4>
                </div>
                <div class="modal-body" style="max-height: 460px; overflow: auto">
                     <?php echo form_open('dashboard/assessmentSearch')?>
                     <input type = "text" id="updateIDUp" name="updateIDUp" value="" hidden>
                      <div class="form-group">
                        <label for="kt">Asset Family</label>
                        <input type="text" class="form-control" id="jum" name="jum" value="Building" readonly>
                      </div>
                      <div class="form-group">
                        <label for="kt">Asset ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="">
                      </div>
    
                </div>
                <div class="modal-footer">
                  <?php if($this->session->userdata("role") == "manager"){ ?>
                    <div id="assessLink" style="text-align:left"><a href='<?php echo base_url()?>dashboard/search?owner=&family=7&keyfac=&loc=&column=d.asset_id&searchBy=like&search=&submitSearch=Search'>Click here to view list of data</a></div>
                  <?php } else{?>
                    <div id="assessLink" style="text-align:left"><a href='<?php echo base_url()?>crud/search?owner=&family=7&keyfac=&loc=&column=d.asset_id&searchBy=like&search=&submitSearch=Search'>Click here to view list of data</a></div>
                  <?php } ?>  
                    <button type="submit" class="btn btn-warning"></span> Search</button>
                </div>
                </form>
                
            </div>
        </div>
    </div>

    

   <script>
   function openInNewTab(url){
    var win = window.open(url, '_blank');
    win.focus();
   }
   </script>