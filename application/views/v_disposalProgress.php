<div class="panel panel-default">
		<div class="panel-body" style="height:auto">
			
	    <?php echo form_open_multipart('crud/insertProgress')?>
	      <div class="form-group">
		    <h4>Asset ID : <?php echo $_GET['id'] ?></h4>
		    <h5>Surplus Progress</h5>
		  </div>
		  <div class="form-group">
		    <label for="jm">Date</label>
		    <input type="text" name="assetid" value="<?php echo $_GET['id'] ?>" hidden>
		    <input type="text" name="tanggal" class="form-control" value="<?php echo date("d-m-y") ?>">
		  </div>
		  <div class="form-group">
		    <label for="kt">Status</label>
		    <select class="form-control" name="progress">
		    	<?php foreach($disposal as $key=>$isi){ 
		    	 echo "<option value='".$isi->id_surplus."'>".$isi->status."</option>";} ?>
		    	} ?>
		    </select>
		  </div>
		  <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
		</form>
		</div>
</div>