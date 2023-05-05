<!-- Begin Page Content -->
<div class="container-fluid" style="height:800px; background-color: white; ">
<ol class="breadcrumb" style="background-color: #3a3a3a;">
		<li class="breadcrumb-item">
			<a style="color: white;">E - Overtime Input</a>
		</li>
		<li class="breadcrumb-item active" style="color: white;">Overview</li>
	</ol>
	<!-- Page Heading -->
	<!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
<hr>
	<?php if (validation_errors()) : ?>
		<div class="alert alert-danger" role="alert">
			<?= validation_errors(); ?>
		</div>
	<?php endif; ?>

	<?= $this->session->flashdata('message'); ?>
<style>
    textarea.form-control {
    height: 10rem;
	}
	.vscomp-toggle-button{
		border-radius: 11px;
	}

	.form-control {
		border-radius: 11px;
		border: 1px solid #00000014;
	}

	.form-group {
    margin-bottom: 0rem;
	}
	.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -17.75rem;
    margin-left: 0.25rem;
	}	
</style>

	<center>
        <p>
          <b>  .:: Create Report E-Overtime ::. </b>
        </p>
    </center>
    <hr style="width: 20rem;">
	<?= form_open_multipart('overtime/overtime_input'); ?>
	<div class="table-responsive" style="height:650px; width: 74rem; overflow-x:hidden;" >
    <fieldset>
    <center>
         <div class="col-lg-10 col-md-6">
            <div class="form-group row">
            	<a style="color: black;"><b>Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&nbsp;&ensp;: <p style="color: red; font-size:60%;" class="text-left">.:: Nama ::.</p></b></a>
					<div class="col-sm-4">
                		<input class="form-control form-control-user" type="input" class="form-control form-control-user" id="name" name="name" value="<?= $user['name']; ?>" readonly>
					</div>&nbsp;&nbsp;&nbsp;&nbsp;
                		<div class="form-group row">
                				<a style="color: black;"><b>No. Badge : <p style="color: red; font-size:60%;" class="text-left">.:: No. Karyawan ::.</p></b></a>
				    		<div class="col-sm-4">
                        		<input type="input" class="form-control form-control-user" id="id_user" name="id_user" value="<?= $user['id_user']; ?>" readonly>
				    		</div>
			    		</div>
			</div>

      		<div class="form-group row">
        		<a style="color: black;"><b>Position/Dept &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Jabatan/Dept ::.</p></b></a>
        			<div class="col-sm-3">
            			<select name="id_jabatan" id="id_jabatan" class="form-control" readonly>
			  			<?php foreach ($jabatan as $r) : ?>
							<?php if( $r['id_jabatan'] == $user['id_jabatan'] ) : ?>
				  		<option value="<?= $r['id_jabatan']; ?>" selected> <?= $r['jabatan']; ?></option>
							<?php else : ?>
				  		<!-- <option disabled value="<?= $r['id_jabatan']; ?>"><?= $r['jabatan']; ?></option> -->
							<?php endif ; ?>
			  			<?php endforeach; ?>  
					  	</select>
        			</div>
        		<div class="col-sm-3">
            		<select name="id_dep" id="id_dep" class="form-control" readonly>
			  			<?php foreach ($departement as $r) : ?>
							<?php if( $r['id_dep'] == $user['id_dep'] ) : ?>
				  		<option value="<?= $r['id_dep']; ?>" selected> <?= $r['jenis_departement']; ?></option>
							<?php else : ?>
				  		<!-- <option disabled value="<?= $r['id_dep']; ?>"><?= $r['jenis_departement']; ?></option> -->
							<?php endif ; ?>
			  			<?php endforeach; ?>  
					</select>
				</div>
			</div>

      <div class="form-group row">
      <a style="color: black;"><b>Overtime Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;: <p style="color: red; font-size:60%;" class="text-left">.:: Tanggal Lembur ::.</p></b></a>
				<div class="col-sm-4">
            <input type="datetime-local" class="form-control form-control-user" name="tanggal_overtime" id="tanggal_overtime" required>
				</div>
	  </div>

      
		<div class="form-group row">
          <a style="color: black;"><b>Location &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Lokasi ::.</p></b></a>
            <div class="col-sm-4">
				<select name="id_lokasi" id="id_lokasi" class="form-control" required>
						<option value=""> .:: Choose ::. </option>
					<?php foreach ($lokasi as $l) : ?>
						<option value="<?= $l['id_lokasi']; ?>"><?= $l['lokasi']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
        </div>
         
		<div class="form-group row">
        	<a style="color: black;"><b>Reason Overtime &ensp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Alasan Lembur ::.</p></b></a>
        		<div class="col-sm-6">
					<textarea type="text" class="form-control" id="reason" name="reason" placeholder="Ketik Disini...." required></textarea>
				</div>
		</div>
                   <hr>             
      <div class="form-group ">
				<div class="col-sm-3">
					<button type="submit" class="btn btn-success  btn-block">Submit</button>
				</div>
			</div>
</center>
	</fieldset>
	</div>

	</form>
	<br>
</div>
</div>

<script src="<?= base_url('assets/'); ?>home/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url('assets/'); ?>home/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url('assets/'); ?>home/js/virtual-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<!-- /.container-fluid -->
<script type="text/javascript">
	$(document).ready(function() {
		$("body").on("change", "#komponen", function(e) {
			if ($(this).val() == "Website") {
				$("#div_komponen").hide();
			} else $("#div_komponen").show();
		});
	});
	
	$("#id_departement").change(function(){
		load_pic_departemen($(this).val());
	});
	function load_pic_departemen(id_departemen){
		$.ajax({
	        url: "daily_report/pic_per_departemen/"+id_departemen,	       
	        success: function(response) {
	          $("#div_pic").html(response);
	        }
      });
	}

	$("#id_dvc").change(function(){
		load_device_pengguna($(this).val());
	});
	function load_device_pengguna(id){
		$.ajax({
	        url: "daily_report/device_per_pengguna/"+id,	       
	        success: function(response) {
	          $("#div_dvc").html(response);
	        }
      });
	}
</script>
<script>
	var expanded = false;
	function showCheckboxes(){
		var checkboxes = document.getElementById("box");
		if(!expanded){
			checkboxes.style.display = "block";
			expanded = true;
		} else{
			checkboxes.style.display = "none";
			expanded = false;
		}
	}
</script>

<script>
	VirtualSelect.init({ 
  ele: '#multipleSelect' 
});
</script>


