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
          <b>  .:: Detail E-Overtime ::. </b>
        </p>
    </center>
    <hr>
    <form action="<?= base_url('overtime/input_evaluation/'. $eovertime['id_overtime']); ?>" method="POST" enctype="multipart/form-data">
    <div class="table-responsive" style="height:650px; width: 74rem; overflow-x:hidden;" >
    <fieldset>
        <center>
        <div class="col-lg-10 col-md-6">
            <div class="form-group row">
            <a style="color: black;"><b>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&nbsp;&ensp;: <p style="color: red; font-size:60%;" class="text-left">.:: Nama ::.</p></b></a>
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
                <a style="color: black;"><b>Position/Dept&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Jabatan/Dept ::.</p></b></a>
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
                <a style="color: black;"><b>Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Lokasi ::.</p></b></a>
				    <div class="col-sm-3">
                        <b><input type="input" class="form-control form-control-user" id="id_lokasi" name="id_lokasi" value="<?= $eovertime['lokasi']; ?> " readonly></b>
				    </div>
			</div>
            <div class="form-group row">
                <a style="color: black;"><b>Reason Overtime&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Alasan Lembur ::.</p></b></a>
				    <div class="col-sm-3">
                        <b><textarea class="form-control form-control-user" id="reason" name="reason" value="" readonly><?= $eovertime['reason']; ?> </textarea></b>
				    </div>
			</div>

      <?php
        if($user['id_jabatan'] == 30 OR $user['id_jabatan'] == 47) { ?>
            <div class="form-group row">
                <a style="color: black;"><b>Overtime Activities&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Aktivitas Lembur ::.</p></b></a>
				      <div class="col-sm-3">
                <textarea class="form-control" id="reason_activity" name="reason_activity" placeholder="Ketik Disini...." readonly></textarea>
				      </div>
			      </div>

            <div class="form-group row">
                  <a style="color: black;"><b>Actual Overtime From : <p style="color: red; font-size:60%;" class="text-left">.:: Lembur Aktual Dari ::.</p></b></a>
				        <div class="col-lg-2">
                  <b><input type="datetime-local" class="form-control form-control-user" id="start_date" name="start_date" readonly></b>
				        </div>
                <div class="form-group row">&nbsp;
                    <a style="color: black;"><b>Overtime To : <p style="color: red; font-size:60%;" class="text-left">.:: Lembur Aktual Sampai ::.</p></b></a>
				          <div class="col-sm-7">
                    <b><input type="datetime-local" class="form-control form-control-user" id="to_date" name="to_date" readonly></b>
				          </div>
			          </div>
			      </div>
        <?php } else {?>
            <?php if ($eovertime['status'] == 'Planning Overtime Approved') {?>
                <div class="form-group row">
                        <a style="color: black;"><b>Overtime Activities&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Aktivitas Lembur ::.</p></b></a>
				    <div class="col-sm-3">
                        <textarea class="form-control" id="reason_activity" name="reason_activity" placeholder="Ketik Disini...."></textarea>
				    </div>
			    </div>

                <div class="form-group row">
                        <a style="color: black;"><b>Actual Overtime From : <p style="color: red; font-size:60%;" class="text-left">.:: Lembur Aktual Dari ::.</p></b></a>
				    <div class="col-sm-3">
                        <b><input type="datetime-local" class="form-control form-control-user" id="start_date" name="start_date"></b>
				    </div>
                    <div class="form-group row">
                        <a style="color: black;"><b>To : <p style="color: red; font-size:60%;" class="text-left">.:: Sampai ::.</p></b></a>
				      <div class="col-sm-9">
                        <b><input type="datetime-local" class="form-control form-control-user" id="to_date" name="to_date" ></b>
				      </div>
			        </div>
			    </div>
            <?php } elseif ($eovertime['status'] == 'Evaluation Rejected') {?>
            <div class="form-group row">
                <a style="color: black;"><b>Overtime Activities&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Aktivitas Lembur ::.</p></b></a>
				      <div class="col-sm-3">
                <textarea class="form-control" id="reason_activity" name="reason_activity" placeholder="Ketik Disini...."><?= $eovertime['reason_activity']; ?></textarea>
				      </div>
			      </div>

            <div class="form-group row">
                  <a style="color: black;"><b>Actual Overtime From : <p style="color: red; font-size:60%;" class="text-left">.:: Lembur Aktual Dari ::.</p></b></a>
				        <div class="col-sm-3">
                  <b><input type="datetime-local" class="form-control form-control-user" id="start_date" name="start_date" value="<?= $eovertime['start_date']; ?>"></b>
				        </div>
                <div class="form-group row">
                    <a style="color: black;"><b>To : <p style="color: red; font-size:60%;" class="text-left">.:: Sampai ::.</p></b></a>
				          <div class="col-sm-9">
                    <b><input type="datetime-local" class="form-control form-control-user" id="to_date" name="to_date" value="<?= $eovertime['to_date']; ?>"></b>
				          </div>
			          </div>
			      </div>
                  <?php } ?>
        <?php }?>
           

            
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