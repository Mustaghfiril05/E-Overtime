<!-- Begin Page Content -->
<div class="container-fluid" style="height:800px; background-color: white;">
<ol class="breadcrumb" style="background-color: #3a3a3a;"> 
		<li class="breadcrumb-item">
			<a href="" style="color: white;">Detail Report E-Overtime</a>
		</li>
		<li class="breadcrumb-item active" style="color: white;">Overview</li>
	</ol>
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1> -->

        
       
<style>


.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #000000;
    background-color: #ffffff;
    background-clip: padding-box;
    border: 1px solid #0000002e;
    border-radius: 0.35rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.col-form-label {
    padding-top: calc(0.375rem + 1px);
    padding-bottom: calc(0.375rem + 1px);
    margin-bottom: 0;
    font-size: inherit;
    line-height: 0;
}
.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -17.75rem;
    margin-left: 0.25rem;
	}	

    textarea.form-control {
    height: 7rem;
    width: 35rem;
}

.form-control1 {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #000000;
    background-color: #ffffff;
    background-clip: padding-box;
    border: 1px solid #0000002e;
    border-radius: 0.35rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>
    <!-- /.container-fluid -->
    <center>
        <p>
          <b>  .:: Detail E-Overtime ::. </b>
        </p>
    </center>
    <hr>

<!-- Detail SPV -->
    <?php if($user['id_jabatan'] == 6) { ?>
    <form action="<?= base_url('overtime/detail_overtime/'. $eovertime['id_overtime']); ?>" method="POST" enctype="multipart/form-data">
    <div class="table-responsive" style="height:650px; width: 74rem; overflow-x:hidden;" >
    <fieldset>
        <center>
        <div class="col-lg-10 col-md-6">
            <div class="form-group row">
            <a style="color: black;"><b>Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&nbsp;&ensp;: <p style="color: red; font-size:60%;" class="text-left">.:: Nama ::.</p></b></a>
				<div class="col-sm-3">
                <input class="form-control form-control-user" type="input" class="form-control form-control-user" id="name" name="name" value="<?= $eovertime['name']; ?>" readonly>
				</div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group row">
                <a style="color: black;"><b>No. Badge : <p style="color: red; font-size:60%;" class="text-left">.:: No. Karyawan ::.</p></b></a>
				    <div class="col-sm-4">
                        <b><input type="input" class="form-control form-control-user" id="id_user" name="id_user" value="<?= $eovertime['id_user']; ?>" readonly></b>
				    </div>
			    </div>
			</div>

            <div class="form-group row">
                <a style="color: black;"><b>Position/Dept &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Jabatan/Dept ::.</p></b></a>
				    <div class="col-sm-2">
                        <b><input type="input" class="form-control form-control-user" id="id_dep" name="id_dep" value="<?= $eovertime['jabatan']; ?> / <?= $eovertime['jenis_departement']; ?>" readonly></b>
				    </div>
                    <div class="form-group row">&nbsp;&nbsp;&nbsp;&nbsp;
                <a style="color: black;"><b>Ovetime Date : <p style="color: red; font-size:60%;" class="text-left">.:: Tanggal Lembur ::.</p></b></a>
				    <div class="col-sm-6">
                        <b><input type="input" class="form-control form-control-user" id="tanggal_overtime" name="tanggal_overtime" value="<?=date('d M Y',strtotime($eovertime['tanggal_overtime']))?>" readonly></b>
				    </div>
			</div>
			</div>

            <div class="form-group row">
                <a style="color: black;"><b>Location &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Lokasi ::.</p></b></a>
				    <div class="col-sm-3">
                        <b><input type="input" class="form-control form-control-user" id="id_lokasi" name="id_lokasi" value="<?= $eovertime['lokasi']; ?> " readonly></b>
				    </div>
			</div>
            <div class="form-group row">
                <a style="color: black;"><b>Reason Overtime &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Alasan Lembur ::.</p></b></a>
				    <div class="col-sm-3">
                        <b><textarea class="form-control form-control-user" id="reason" name="reason" value="" readonly><?= $eovertime['reason']; ?> </textarea></b>
				    </div>
			</div>
          
          <?php 
          if ( $eovertime['id_jabatan'] == 6 AND $eovertime['status'] == 'Request' )  { ?>
            
          <?php } elseif ($eovertime['status'] == 'Request' ) {?>
            <div class="form-group row">
                 <a style="color: black;"><b>Approve Planning Overtime? : <p style="color: red; font-size:60%;" class="text-left">.:: Alasan Lembur ::.</p></b></a>
              <div class="col-sm-3">
               <select name="status" id="status" class="form-control1">
                 <option value=""> --Choose-- </option>
                 <option value="Planning Overtime Approved">Planning Overtime Approved</option>
                  <option value="Planning Overtime Rejected">Planning Overtime Rejected</option>
               </select>
              </div>
            </div>
          <?php } ?>

            
        <hr style="width: 30rem;">

        <div class="form-group row justify-content-end">
            <div class="col-lg-12">
          <?php
          if($eovertime['id_jabatan'] == 6 AND $eovertime['status'] == 'Request') { ?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
          <?php } elseif ($eovertime['status'] == 'Request') {?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
            <input type="submit" class="btn btn-success btn-sm" value="save" name="save">
          <?php } ?>

          <?php
          if($eovertime['id_jabatan'] == 6 AND $eovertime['status'] == 'Planning Overtime Rejected') { ?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
          <?php } ?>
            </div>
        </div>
        </div>
        </center>
    </fieldset>
    </div>
    </form>

<!-- Detail SPRD & HOD -->
    <?php } elseif($user['id_jabatan'] == 46 AND $user['id_jabatan'] == 3) { ?>
    <form action="<?= base_url('overtime/detail_overtime/'. $eovertime['id_overtime']); ?>" method="POST" enctype="multipart/form-data">
    <div class="table-responsive" style="height:650px; width: 74rem; overflow-x:hidden;" >
    <fieldset>
        <center>
        <div class="col-lg-10 col-md-6">
            <div class="form-group row">
            <a style="color: black;"><b>Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&nbsp;&ensp;: <p style="color: red; font-size:60%;" class="text-left">.:: Nama ::.</p></b></a>
				<div class="col-sm-3">
                <input class="form-control form-control-user" type="input" class="form-control form-control-user" id="name" name="name" value="<?= $eovertime['name']; ?>" readonly>
				</div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group row">
                <a style="color: black;"><b>No. Badge : <p style="color: red; font-size:60%;" class="text-left">.:: No. Karyawan ::.</p></b></a>
				    <div class="col-sm-4">
                        <b><input type="input" class="form-control form-control-user" id="id_user" name="id_user" value="<?= $eovertime['id_user']; ?>" readonly></b>
				    </div>
			    </div>
			</div>

            <div class="form-group row">
                <a style="color: black;"><b>Position/Dept &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Jabatan/Dept ::.</p></b></a>
				    <div class="col-sm-2">
                        <b><input type="input" class="form-control form-control-user" id="id_dep" name="id_dep" value="<?= $eovertime['jabatan']; ?> / <?= $eovertime['jenis_departement']; ?>" readonly></b>
				    </div>
                    <div class="form-group row">&nbsp;&nbsp;&nbsp;&nbsp;
                <a style="color: black;"><b>Ovetime Date : <p style="color: red; font-size:60%;" class="text-left">.:: Tanggal Lembur ::.</p></b></a>
				    <div class="col-sm-6">
                        <b><input type="input" class="form-control form-control-user" id="tanggal_overtime" name="tanggal_overtime" value="<?=date('d M Y',strtotime($eovertime['tanggal_overtime']))?>" readonly></b>
				    </div>
			</div>
			</div>

            <div class="form-group row">
                <a style="color: black;"><b>Location &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Lokasi ::.</p></b></a>
				    <div class="col-sm-3">
                        <b><input type="input" class="form-control form-control-user" id="id_lokasi" name="id_lokasi" value="<?= $eovertime['lokasi']; ?> " readonly></b>
				    </div>
			</div>
            <div class="form-group row">
                <a style="color: black;"><b>Reason Overtime &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Alasan Lembur ::.</p></b></a>
				    <div class="col-sm-3">
                        <b><textarea class="form-control form-control-user" id="reason" name="reason" value="" readonly><?= $eovertime['reason']; ?> </textarea></b>
				    </div>
			</div>
          
          <?php 
          if ( $eovertime['id_jabatan'] == 46 AND $eovertime['status'] == 'Request' )  { ?>
            
          <?php } elseif ($eovertime['id_jabatan'] == 6 AND  $eovertime['status'] == 'Request' ) {?>
            <div class="form-group row">
                 <a style="color: black;"><b>Approve Planning Overtime? : <p style="color: red; font-size:60%;" class="text-left">.:: Alasan Lembur ::.</p></b></a>
              <div class="col-sm-3">
               <select name="status" id="status" class="form-control1">
                 <option value=""> --Choose-- </option>
                 <option value="Planning Overtime Approved">Planning Overtime Approved</option>
                  <option value="Planning Overtime Rejected">Planning Overtime Rejected</option>
               </select>
              </div>
            </div>
          <?php } elseif  ($eovertime['status'] == 'Request' ){ ?>

          <?php } ?>

            
        <hr style="width: 30rem;">

        <div class="form-group row justify-content-end">
            <div class="col-lg-12">
          <?php
          if($eovertime['id_jabatan'] == 46 AND $eovertime['status'] == 'Request') { ?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
          <?php } elseif ($eovertime['id_jabatan'] == 6 AND $eovertime['status'] == 'Request') {?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
            <input type="submit" class="btn btn-success btn-sm" value="save" name="save">
          <?php } elseif  ($eovertime['status'] == 'Request' ){ ?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
          <?php } ?>

          <?php
          if($eovertime['status'] == 'Planning Overtime Rejected') { ?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
          <?php } ?>
            </div>
        </div>
        </div>
        </center>
    </fieldset>
    </div>
    </form>

<!-- View GM -->
    <?php } elseif($user['id_jabatan'] == 10) { ?>
    <form action="<?= base_url('overtime/detail_overtime/'. $eovertime['id_overtime']); ?>" method="POST" enctype="multipart/form-data">
    <div class="table-responsive" style="height:650px; width: 74rem; overflow-x:hidden;" >
    <fieldset>
        <center>
        <div class="col-lg-10 col-md-6">
            <div class="form-group row">
            <a style="color: black;"><b>Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&nbsp;&ensp;: <p style="color: red; font-size:60%;" class="text-left">.:: Nama ::.</p></b></a>
				<div class="col-sm-3">
                <input class="form-control form-control-user" type="input" class="form-control form-control-user" id="name" name="name" value="<?= $eovertime['name']; ?>" readonly>
				</div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group row">
                <a style="color: black;"><b>No. Badge : <p style="color: red; font-size:60%;" class="text-left">.:: No. Karyawan ::.</p></b></a>
				    <div class="col-sm-4">
                        <b><input type="input" class="form-control form-control-user" id="id_user" name="id_user" value="<?= $eovertime['id_user']; ?>" readonly></b>
				    </div>
			    </div>
			</div>

            <div class="form-group row">
                <a style="color: black;"><b>Position/Dept &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Jabatan/Dept ::.</p></b></a>
				    <div class="col-sm-2">
                        <b><input type="input" class="form-control form-control-user" id="id_dep" name="id_dep" value="<?= $eovertime['jabatan']; ?> / <?= $eovertime['jenis_departement']; ?>" readonly></b>
				    </div>
                    <div class="form-group row">&nbsp;&nbsp;&nbsp;&nbsp;
                <a style="color: black;"><b>Ovetime Date : <p style="color: red; font-size:60%;" class="text-left">.:: Tanggal Lembur ::.</p></b></a>
				    <div class="col-sm-6">
                        <b><input type="input" class="form-control form-control-user" id="tanggal_overtime" name="tanggal_overtime" value="<?=date('d M Y',strtotime($eovertime['tanggal_overtime']))?>" readonly></b>
				    </div>
			</div>
			</div>

            <div class="form-group row">
                <a style="color: black;"><b>Location &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Lokasi ::.</p></b></a>
				    <div class="col-sm-3">
                        <b><input type="input" class="form-control form-control-user" id="id_lokasi" name="id_lokasi" value="<?= $eovertime['lokasi']; ?> " readonly></b>
				    </div>
			</div>
            <div class="form-group row">
                <a style="color: black;"><b>Reason Overtime &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Alasan Lembur ::.</p></b></a>
				    <div class="col-sm-3">
                        <b><textarea class="form-control form-control-user" id="reason" name="reason" value="" readonly><?= $eovertime['reason']; ?> </textarea></b>
				    </div>
			</div>
          
          <?php 
          if ( $eovertime['id_jabatan'] == 10 AND $eovertime['status'] == 'Request' )  { ?>
            
          <?php } elseif ($eovertime['id_jabatan'] == 46 OR $eovertime['id_jabatan'] == 3 AND  $eovertime['status'] == 'Request' ) {?>
            <div class="form-group row">
                 <a style="color: black;"><b>Approve Planning Overtime? : <p style="color: red; font-size:60%;" class="text-left">.:: Alasan Lembur ::.</p></b></a>
              <div class="col-sm-3">
               <select name="status" id="status" class="form-control1">
                 <option value=""> --Choose-- </option>
                 <option value="Planning Overtime Approved">Planning Overtime Approved</option>
                  <option value="Planning Overtime Rejected">Planning Overtime Rejected</option>
               </select>
              </div>
            </div>
          <?php } elseif  ($eovertime['status'] == 'Request' ){ ?>

          <?php } ?>

            
        <hr style="width: 30rem;">

        <div class="form-group row justify-content-end">
            <div class="col-lg-12">
          <?php
          if($eovertime['id_jabatan'] == 10 AND $eovertime['status'] == 'Request') { ?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
          <?php } elseif ($eovertime['id_jabatan'] == 46 OR $eovertime['id_jabatan'] == 3 AND $eovertime['status'] == 'Request') {?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
            <input type="submit" class="btn btn-success btn-sm" value="save" name="save">
          <?php } elseif  ($eovertime['status'] == 'Request' ){ ?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
          <?php } ?>

          <?php
          if($eovertime['status'] == 'Planning Overtime Rejected') { ?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
          <?php } ?>
            </div>
        </div>
        </div>
        </center>
    </fieldset>
    </div>
    </form>

<!-- View User -->
    <?php } else { ?>
      <form action="<?= base_url('overtime/edit_detail_overtime/'. $eovertime['id_overtime']); ?>" method="POST" enctype="multipart/form-data">
    <div class="table-responsive" style="height:650px; width: 74rem; overflow-x:hidden;" >
    <fieldset>
        <center>
        <div class="col-lg-10 col-md-6">
            <div class="form-group row">
            <a style="color: black;"><b>Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&nbsp;&ensp;: <p style="color: red; font-size:60%;" class="text-left">.:: Nama ::.</p></b></a>
				<div class="col-sm-3">
                <input class="form-control form-control-user" type="input" class="form-control form-control-user" id="name" name="name" value="<?= $eovertime['name']; ?>" readonly>
				</div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group row">
                <a style="color: black;"><b>No. Badge : <p style="color: red; font-size:60%;" class="text-left">.:: No. Karyawan ::.</p></b></a>
				    <div class="col-sm-4">
                        <b><input type="input" class="form-control form-control-user" id="id_user" name="id_user" value="<?= $eovertime['id_user']; ?>" readonly></b>
				    </div>
			    </div>
			</div>

            <div class="form-group row">
                <a style="color: black;"><b>Position/Dept &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Jabatan/Dept ::.</p></b></a>
				    <div class="col-sm-2">
                        <b><input type="input" class="form-control form-control-user" id="id_dep" name="id_dep" value="<?= $eovertime['jabatan']; ?> / <?= $eovertime['jenis_departement']; ?>" readonly></b>
				    </div>
                    <div class="form-group row">
                <a style="color: black;"><b>Ovetime Date : <p style="color: red; font-size:60%;" class="text-left">.:: Tanggal Lembur ::.</p></b></a>
				    <div class="col-sm-8">
                <b><input type="datetime-local" class="form-control form-control-user" id="tanggal_overtime" name="tanggal_overtime" value="<?= $eovertime['tanggal_overtime']; ?>" ></b>
				    </div>
			</div>
			</div>

            <div class="form-group row">
                <a style="color: black;"><b>Location &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Lokasi ::.</p></b></a>
				    <div class="col-sm-3">
                <select name="id_lokasi" id="id_lokasi" class="form-control1">
			  					  <?php foreach ($lokasi as $r) : ?>
									      <?php if( $r['id_lokasi'] == $eovertime['id_lokasi'] ) : ?>
				  				    <option value="<?= $r['id_lokasi']; ?>" selected> <?= $r['lokasi']; ?></option>>
									      <?php else : ?>
				  				    <option value="<?= $r['id_lokasi']; ?>"><?= $r['lokasi']; ?></option>
									      <?php endif ; ?>
			  					  <?php endforeach; ?> 
							</select>
                <!-- <b><input type="input" class="form-control form-control-user" id="id_lokasi" name="id_lokasi" value="<?= $eovertime['lokasi']; ?> " readonly></b> -->
				    </div>
			</div>
            <div class="form-group row">
                <a style="color: black;"><b>Reason Overtime &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Alasan Lembur ::.</p></b></a>
				    <div class="col-sm-3">
                <b><textarea class="form-control form-control-user" id="reason" name="reason" value=""><?= $eovertime['reason']; ?> </textarea></b>
				    </div>
			</div>            
        <hr style="width: 30rem;">

        <div class="form-group row justify-content-end">
            <div class="col-lg-12">
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
            <input type="submit" class="btn btn-success btn-sm" value="save" name="save">
            </div>
        </div>
        </div>
        </center>
    </fieldset>
    </div>
    </form>
    <?php } ?>
</div>

<style>
  .row1 {
    display: flex;
    flex-wrap: wrap;
    margin-right: -0.75rem;
    margin-left: 0.25rem;
}
</style>

<script src="<?= base_url('assets/'); ?>home/js/jquery-3.5.1.min.js"></script>
<!-- /.container-fluid -->
<script type="text/javascript">
	$(document).ready(function() {
		$("body").on("change", "#status", function(e) {
			if ($(this).val() == "In Progress") {
				$("#div_kendala").show();
			} else $("#div_kendala").hide();
		});
	});

    $(document).ready(function() {
		$("body").on("change", "#lampiran", function(e) {
			if ($(this).val() == "ya") {
				$("#div_attach").show();
			} else $("#div_attach").hide();
		});
	});

    function open_list_delegasi(id_cuti){
    $("#content_delegasi").html("progress...").load("<?php echo base_url()?>cuti_karyawan_input/detail_delegasi/"+id_cuti);
  }
</script>