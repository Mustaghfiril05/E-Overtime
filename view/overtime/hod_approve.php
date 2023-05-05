<!-- Begin Page Content -->
<div class="container-fluid" style="height:800px; background-color: white;">
<ol class="breadcrumb" style="background-color: #3a3a3a;"> 
		<li class="breadcrumb-item">
			<a href="" style="color: white;">Detail Evaluation E-Overtime</a>
		</li>
		<li class="breadcrumb-item active" style="color: white;">Overview</li>
	</ol>
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1> -->

        
       
<style>




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


</style>
    <!-- /.container-fluid -->
    <center>
        <p>
          <b>  .:: Detail Evaluation E-Overtime ::. </b>
        </p>
    </center>
    <hr>
  <form action="<?= base_url('overtime/hod_approve/'. $eovertime['id_overtime']); ?>" method="POST" enctype="multipart/form-data">
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
            <div class="form-group row">
                <a style="color: black;"><b>Overtime Activities &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Aktifitas Lembur ::.</p></b></a>
				    <div class="col-sm-3">
                        <b><textarea class="form-control form-control-user" id="reason_activity" name="reason_activity" value="" readonly><?= $eovertime['reason_activity']; ?> </textarea></b>
				    </div>
			</div>

      <div class="form-group row">
                        <a style="color: black;"><b>Actual Overtime From &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Lembur Aktual Dari ::.</p></b></a>
				    <div class="col-lg-3">
                        <b><input type="text" class="form-control form-control-user" id="start_date" name="start_date" value="<?=date('d M Y (H:i:s)',strtotime($eovertime['start_date']))?>" readonly></b><br>
                        <b><input type="input" class="form-control form-control-user" value="<?= number_format($lembur['jam'])." Jam";  ?> <?= number_format($lembur['menit'])." Menit";  ?>" readonly></b>
				    </div>
                <div class="form-group row">&nbsp;
                        <a style="color: black;"><b>To : <p style="color: red; font-size:60%;" class="text-left">.:: S/d ::.</p></b></a>
				    <div class="col-sm-10">
                        <b><input type="text" class="form-control form-control-user" id="to_date" name="to_date" value="<?=date('d M Y (H:i:s)',strtotime($eovertime['to_date']))?>" readonly></b>
				    </div>
			    </div>
			    </div>

          <div class="form-group row">
                        <a style="color: black;"><b>HR Approve Overtime From &nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Lembur Aktual Dari ::.</p></b></a>
				      <div class="col-lg-3">
                  <b><input type="datetime-local" class="form-control form-control-user" id="approve_start" name="approve_start"></b></br>
                    <!-- <b><input type="text" class="form-control form-control-user" id="jumlah" name="jumlah"></b>  -->
				      </div>
                <div class="form-group row">&nbsp;
                    <a style="color: black;"><b>To : <p style="color: red; font-size:60%;" class="text-left">.:: S/d ::.</p></b></a>
				          <div class="col-sm-10">
                    <b><input type="datetime-local" class="form-control form-control-user" id="approve_to" name="approve_to"></b>
                    <!-- <b><input type="datetime-local" class="form-control form-control-user" id="approve_to" name="approve_to" onchange="getDays()"></b> -->
				          </div>
			          </div>
			      </div>

          <?php
            if($eovertime['id_jabatan'] == 46 OR $eovertime['id_jabatan'] == 3 AND  $eovertime['status'] == 'Evaluation') { ?>
                   
          <?php } elseif ($eovertime['id_jabatan'] == 6 OR $eovertime['id_jabatan'] == 3 AND  $eovertime['status'] == 'Evaluation') {?>
            <div class="form-group row">
                        <a style="color: black;"><b>Approve Evaluation? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Alasan Lembur ::.</p></b></a>
				            <div class="col-sm-3">
                        <select name="status" id="status" class="form-control">
                            <option value=""> --Choose-- </option>
                            <option value="Evaluation Approved">Evaluation Approved</option>
						                <option value="Evaluation Rejected">Evaluation Rejected</option>
                        </select>
				            </div>
			        </div>
            <?php } elseif ($eovertime['status'] == 'Evaluation') {?>

            <?php } ?>

            <?php
            if($eovertime['id_jabatan'] == 46 OR $eovertime['id_jabatan'] == 3 AND  $eovertime['status'] == 'Evaluation Approved') { ?>
                   
          <?php } elseif ($eovertime['status'] == 'Evaluation Approved') {?>
            <div class="form-group row">
                        <a style="color: black;"><b>Approve Overtime? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Alasan Lembur ::.</p></b></a>
				            <div class="col-sm-3">
                        <select name="status" id="status" class="form-control">
                            <option value=""> --Choose-- </option>
                            <option value="HOD Approved">HOD Approved</option>
						    <option value="HOD Rejected">HOD Rejected</option>
                        </select>
				            </div>
			        </div>
            <?php } ?>
     
        <hr style="width: 30rem;">

        <div class="form-group row justify-content-end">
            <div class="col-lg-12">
          <?php
          if($eovertime['id_jabatan'] == 46 OR $eovertime['id_jabatan'] == 3 AND $eovertime['status'] == 'Evaluation') { ?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
          <?php } elseif ($eovertime['id_jabatan'] == 6 AND $eovertime['status'] == 'Evaluation') {?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
            <input type="submit" class="btn btn-success btn-sm" value="save" name="save">
          <?php } elseif ($eovertime['status'] == 'Evaluation') {?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
          <?php } ?>

          <?php
          if($eovertime['id_jabatan'] == 46 OR $eovertime['id_jabatan'] == 3 AND $eovertime['status'] == 'Evaluation Approved') { ?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
          <?php } elseif ($eovertime['status'] == 'Evaluation Approved') {?>
            <a class="btn btn-success btn-sm" href="<?= base_url('overtime/')?>">Kembali</a>
            <input type="submit" class="btn btn-success btn-sm" value="save" name="save">
          <?php } ?>
            </div>
        </div>
        </div>
        </center>
    </fieldset>
    </div>
    </form>

</div>

<style>
  .row1 {
    display: flex;
    flex-wrap: wrap;
    margin-right: -0.75rem;
    margin-left: 0.25rem;
}
</style>
<div class='modal'  id='progress' tabindex="-1" role="dialog" aria-labelledby="newDepModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content" style="width: 24rem;">
  <div class="modal-header">
  <center>
    <h5 class="modal-title" id="newDepModalLabel" style="font-size: 14px;"><b>Approve Report E-Leave</b></h5>
  </center>  
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <form action="<?= base_url('cuti_karyawan_input/approve/'. $eovertime['id_cuti']); ?>" method="POST" enctype="multipart/form-data">
  <div class="modal-body">
  <?php
    if($user['id_jabatan'] == 3 OR $user['id_jabatan'] == 46 OR $user['id_jabatan'] == 10) { ?>
      <div class="form-group row1">
        <a style="color: black;"><b>Approved? : <p style="color: red; font-size:60%;" class="text-left">.:: Setujui? ::.</p></b></a>
				  <div class="col-sm-6">
            <select name="status" id="status" class="form-control">
              <option value=""> --Pilih Status-- </option>
              <option value="Approved">Approved</option>
						  <option value="Rejected">Rejected</option>
            </select>
				  </div>
      </div>
  <?php } elseif($user['id_jabatan'] == 30 OR $user['id_jabatan'] == 47) { ?>
    <div class="form-group row1">
        <a style="color: black;"><b>Approved? : <p style="color: red; font-size:60%;" class="text-left">.:: Setujui? ::.</p></b></a>
				  <div class="col-sm-6">
            <select name="status" id="status" class="form-control">
              <option value=""> --Pilih Status-- </option>
              <option value="Approve HRD">Approved</option>
						  <option value="Rejected">Rejected</option>
            </select>
				  </div>
      </div>
  <?php } ?>
 

  </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
           <input type="submit" class="btn btn-success btn-sm" value="save" name="save">
        </div>
  </form>
</div>
</div>
</div>

<div class='modal'  id='edit1' tabindex="-1" role="dialog" aria-labelledby="newDepModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
  <center>
    <h5 class="modal-title" id="newDepModalLabel" style="font-size: 14px;"><b>Detail Delegasi</b></h5>
  </center>  
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body" id="content_delegasi">
  </div>
</div>
</div>
</div>

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