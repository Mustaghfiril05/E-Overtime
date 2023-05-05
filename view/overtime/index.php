<!-- Begin Page Content -->
<style>
  body {
     background-color: #f9f9fa
 }

 .flex {
     -webkit-box-flex: 1;
     -ms-flex: 1 1 auto;
     flex: 1 1 auto
 }

 @media (max-width:991.98px) {
     .padding {
         padding: 1.5rem
     }
 }

 @media (max-width:767.98px) {
     .padding {
         padding: 1rem
     }
 }

 .padding {
     padding: 5rem
 }

 .container {
     margin-top: 100px
 }

 .progress.progress-md {
     height: 5px
 }

 .template-demo .progress {
     margin-top: 1.5rem
 }

 .progress {
     border-radius: 10px;
     height: 10px
 }
</style>
<div class="container-fluid" style="background-color: white; height: 800px;">
<ol class="breadcrumb" style="background-color: #3a3a3a;"> 
            <li class="breadcrumb-item">
              <a href="" style="color: white;">List E-Overtime</a>
            </li>
            <li class="breadcrumb-item active" style="color: white;">Overview</li>
          </ol>
<!-- Page Heading -->
<!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

  <?php if(validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
      <?= validation_errors(); ?>
    </div>
   <?php endif; ?>

   <?= $this->session->flashdata('message'); ?>
   <style>
    .card {
    flex: 1 1 auto;
    padding: 1.25rem;
    border-radius: 2rem;
    background-color: #ffffff;
}

.row1 {
    display: flex;
    flex-wrap: wrap;
    margin-right: -6.75rem;
    margin-left: -0.75rem;
    margin-bottom: 0rem;
}
.badge-success1 {
    color: #000000;
    background-color: #e5e284;
}
.badge-warning {
    color: #000;
    background-color: #f6c23e;
}

.badge-danger1 {
    color: #000;
    background-color: #ff8a7e;
}
.badge-info {
    color: #000;
    background-color: #36b9cc;
}

.badge-success2 {
    color: #000;
    background-color: #4fe5af;
}

.badge-primary1 {
    color: #000;
    background-color: #99ecff;
}
   </style>

<!-- <form class="form-inline" method="get" action="<?= base_url('overtime/index'); ?>"></form> -->
<div class="row1">
  <div class="col-xl-4 "> 
    <a class="btn btn-success btn-sm" href="<?= base_url('overtime/overtime_input')?>">Buat Lembur Baru</a>
  </div>
</div>


 <hr>
<div class="card shadow mb-4">
<div class="card-header py-1" style="background-color:#000000;">
</div>
<div class="card-body" style="height:37rem; width:auto;">
<div class="table-responsive" style="height:35rem;">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="20%" >
<thead class="thead">
<tr >
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">Tanggal Overtime</th>
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">Status</th>
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">No. Badge</th>
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">Nama</th>
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">Department</th>
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">Lokasi</th>
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">Alasan</th>
      <!-- <th scope="col" class='text-center' style="color:black; font-size: 14px;">Alasan</th> -->
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">Action</th> 
  </tr>
</thead>
<tbody>
<!-- View USER PEMBUAT E-OVERTIME -->
  <?php 
  if( ! empty($overtime)){
  foreach ($overtime as $d) : ?>
  <?php if( $d['name'] == $user['name']) : ?>
    <tr>
        <td class='text-center' style="color:black; font-size: 14px;"><?=date('d M Y',strtotime($d['tanggal_overtime']))?></td>
        <td class='text-center' style="color:black; font-size: 14px;">
        <?php
          if($d['status'] == 'Request') {
           ?>
           <span class="badge badge-warning">Request</span>
        <?php }?>

          <?php
          if($d['status'] == 'Planning Overtime Approved') {
           ?>
           <span class="badge badge-success1">Planning Overtime Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation') {
           ?>
           <span class="badge badge-primary1">Evaluation</span>
          <?php }?>

          <?php
          if($d['status'] == 'Planning Overtime Rejected') {
           ?>
           <span class="badge badge-danger1">Planning Overtime Rejected</span>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation Rejected') {
           ?>
           <span class="badge badge-danger1">Evaluation Rejected</span>
          <?php }?>

          <?php
          if($d['status'] == 'Rejected') {
           ?>
           <span class="badge badge-danger1">Rejected</span>
          <?php }?>

          <?php
          if($d['status'] == 'Reject HRD') {
           ?>
           <span class="badge badge-danger1">Reject HRD</span>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation Approved') {
           ?>
           <span class="badge badge-info">Evaluation Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'Complete') {
           ?>
           <span class="badge badge-success2">Complete</span>
          <?php }?>

          <?php
          if($d['status'] == 'Not Complete') {
           ?>
           <span class="badge badge-danger1">Not Complete</span>
          <?php }?>

          <?php
          if($d['status'] == 'HOD Approved') {
           ?>
           <span class="badge badge-success2">HOD Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'HOD Rejected') {
           ?>
           <span class="badge badge-danger1">HOD Rejected</span>
          <?php }?>
          

        </td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['id_user']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['name']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['jenis_departement']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['lokasi']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= nl2br($d['reason']); ?></td>
        <!-- <td class='text-center' style="color:black; font-size: 14px;"><?= $d['type_day']; ?></td> -->
        
        <td class='text-center' style="color: black; font-size: 14px;">
        <?php
          if($d['status'] == 'Request') {
           ?>
           <a class="badge badge-success" title="Detail Report E-Overtime" href="<?= base_url('overtime/detail_overtime/') . $d['id_overtime']; ?>"><i class="fas fa-eye"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'Planning Overtime Approved') {
           ?>
          <a class="badge badge-success" title="Input Evaluation" href="<?= base_url('overtime/input_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-pen"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Evaluation Approved') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Planning Overtime Rejected') {
           ?>
           <a class="badge badge-success" title="Detail Report E-Overtime" href="<?= base_url('overtime/detail_overtime/') . $d['id_overtime']; ?>"><i class="fas fa-eye"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Evaluation Rejected') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/input_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Rejected') {
           ?>
           <a class="badge badge-warning" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Complete') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/complete_overtime/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Not Complete') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/complete_overtime/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Reject HRD') {
           ?>
           <a class="badge badge-warning" title="View Detail Evaluation" href="<?= base_url('overtime/complete_overtime/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'HOD Approved') {
           ?>
            <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'HOD Rejected') {
           ?>
            <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
        </td>

       
        </td>
    </tr>
    <?php endif ; ?>
    <?php endforeach; ?>





<!-- View STAFF & MANAGER PGA -->
    <?php } elseif ( ! empty($overtimee)) { ?>
      <?php
      foreach ($overtimee as $d) : ?>
      <tr>
        <td class='text-center' style="color:black; font-size: 14px;"><?=date('d M Y',strtotime($d['tanggal_overtime']))?></td>
        <td class='text-center' style="color:black; font-size: 14px;">
        <?php
          if($d['status'] == 'Request') {
           ?>
           <span class="badge badge-warning">Request</span>
          <?php }?>

          <?php
          if($d['status'] == 'Planning Overtime Approved') {
           ?>
           <span class="badge badge-success1">Planning Overtime Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation') {
           ?>
           <span class="badge badge-primary1">Evaluation</span>
          <?php }?>

          <?php
          if($d['status'] == 'Rejected') {
           ?>
           <span class="badge badge-danger1">Rejected</span>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation Approved') {
           ?>
           <span class="badge badge-info">Evaluation Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'Complete') {
           ?>
           <span class="badge badge-success2">Complete</span>
          <?php }?>

          <?php
          if($d['status'] == 'Not Complete') {
           ?>
           <span class="badge badge-danger1">Not Complete</span>
          <?php }?>

          <?php
          if($d['status'] == 'HOD Approved') {
           ?>
           <span class="badge badge-success2">HOD Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'HOD Rejected') {
           ?>
           <span class="badge badge-danger1">HOD Rejected</span>
          <?php }?>

          <?php
          if($d['status'] == 'BOD Approved') {
           ?>
           <span class="badge badge-success2">BOD Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'BOD Rejected') {
           ?>
           <span class="badge badge-danger1">BOD Rejected</span>
          <?php }?>

        </td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['id_user']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['name']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['jenis_departement']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['lokasi']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= nl2br($d['reason']); ?></td>
        <!-- <td class='text-center' style="color:black; font-size: 14px;"><?= $d['type_day']; ?></td> -->
        
        <td class='text-center' style="color: black; font-size: 14px;">
        <?php
          if($d['status'] == 'Request') {
           ?>
           <a class="badge badge-success" title="Approve Or Reject" href="<?= base_url('overtime/detail_overtime/') . $d['id_overtime']; ?>"><i class="fas fa-eye"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'Planning Overtime Approved') {
           ?>
          <a class="badge badge-success" title="Input Evaluation" href="<?= base_url('overtime/input_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Evaluation Approved') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/complete_overtime/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-check"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Rejected') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Complete') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/detail_complete/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Not Complete') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/detail_complete/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'HOD Approved') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/complete_overtime/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-check"></i></a>
          <!-- <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a> -->
          <?php }?>

          <?php
          if($d['status'] == 'HOD Rejected') {
           ?>
            <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'BOD Approved') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/complete_overtime/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-check"></i></a>
          <!-- <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a> -->
          <?php }?>

          <?php
          if($d['status'] == 'BOD Rejected') {
           ?>
            <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
        </td>

    </tr>
      <?php endforeach; ?>
<!-- View HOD & SUPERITENDENT -->
  <?php } elseif (! empty($overtimeee)) { ?>
    <?php
      foreach ($overtimeee as $d) : ?>
    <tr>
        <td class='text-center' style="color:black; font-size: 14px;"><?=date('d M Y',strtotime($d['tanggal_overtime']))?></td>
        <td class='text-center' style="color:black; font-size: 14px;">
        <?php
          if($d['status'] == 'Request') {
           ?>
           <span class="badge badge-warning">Request</span>
          <?php }?>

          <?php
          if($d['status'] == 'Planning Overtime Approved') {
           ?>
           <span class="badge badge-success1">Planning Overtime Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'Planning Overtime Rejected') {
           ?>
           <span class="badge badge-danger1">Planning Overtime Rejected</span>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation') {
           ?>
           <span class="badge badge-primary1">Evaluation</span>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation Rejected') {
           ?>
           <span class="badge badge-danger1">Evaluation Rejected</span>
          <?php }?>

          <?php
          if($d['status'] == 'Rejected') {
           ?>
           <span class="badge badge-danger1">Rejected</span>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation Approved') {
           ?>
           <span class="badge badge-info">Evaluation Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'Complete') {
           ?>
           <span class="badge badge-success2">Complete</span>
          <?php }?>

          <?php
          if($d['status'] == 'Not Complete') {
           ?>
           <span class="badge badge-danger1">Not Complete</span>
          <?php }?>

          <?php
          if($d['status'] == 'HOD Approved') {
           ?>
           <span class="badge badge-success2">HOD Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'HOD Rejected') {
           ?>
           <span class="badge badge-danger1">HOD Rejected</span>
          <?php }?>
          
          <?php
          if($d['status'] == 'BOD Approved') {
           ?>
           <span class="badge badge-success2">BOD Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'BOD Rejected') {
           ?>
           <span class="badge badge-danger1">BOD Rejected</span>
          <?php }?>

        </td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['id_user']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['name']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['jenis_departement']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['lokasi']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= nl2br($d['reason']); ?></td>
        <!-- <td class='text-center' style="color:black; font-size: 14px;"><?= $d['type_day']; ?></td> -->
        
        <td class='text-center' style="color: black; font-size: 14px;">

        <?php
          if($d['status'] == 'Request' AND $d['name'] == $user['name']) {
           ?>
            <a class="badge badge-success" title="Detail Report E-Overtime" href="<?= base_url('overtime/detail_overtime/') . $d['id_overtime']; ?>"><i class="fas fa-eye"></i></a>
          <?php } elseif ($d['status'] == 'Request' AND $d['id_jabatan'] == 6 ) {?>
            <a class="badge badge-success" title="Approve Or Reject" href="<?= base_url('overtime/detail_overtime/') . $d['id_overtime']; ?>"><i class="fas fa-check"></i></a>
          <?php } elseif ($d['status'] == 'Request') { ?>
            <a class="badge badge-success" title="Detail Report E-Overtime" href="<?= base_url('overtime/detail_overtime/') . $d['id_overtime']; ?>"><i class="fas fa-eye"></i></a>
          <?php } ?>

          <?php
          if($d['status'] == 'Planning Overtime Approved'  AND $d['name'] == $user['name']) {
           ?>
          <a class="badge badge-success" title="Input Evaluation" href="<?= base_url('overtime/input_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-pen"></i></a>
          <?php } elseif ($d['status'] == 'Planning Overtime Approved') {?>
            <a class="badge badge-success" title="Waiting Input Evaluation" ><i style="color: white;" class="fas fa-spinner"></i></a>
            <?php }?>

          <?php
          if($d['status'] == 'Planning Overtime Rejected') {
           ?>
           <a class="badge badge-success" title="Detail Report E-Overtime" href="<?= base_url('overtime/detail_overtime/') . $d['id_overtime']; ?>"><i class="fas fa-eye"></i></a>
          <?php }?>

          <?php if($d['status'] == 'Evaluation'  AND $d['id_jabatan'] == 6 ) {?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-check"></i></a>
          <?php } elseif ($d['status'] == 'Evaluation') {?>
            <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php } ?>

          <?php
          if($d['status'] == 'Evaluation Approved') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/hod_approve/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-check"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation Rejected') {
           ?>
           <a class="badge badge-warning" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-check"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'Rejected') {
           ?>
           <a class="badge badge-warning" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-check"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'Complete') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/complete_overtime/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'Not Complete') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/complete_overtime/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
           <!-- <a class="badge badge-warning" title="View Detail Evaluation" href="<?= base_url('overtime/push_rejecthrd/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-paper-plane"></i></a> -->
          <?php }?>

          <?php
          if($d['status'] == 'HOD Approved') {
           ?>
            <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'HOD Rejected') {
           ?>
            <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'BOD Approved') {
           ?>
            <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'BOD Rejected') {
           ?>
            <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
        </td>

        
        </td>
        </td>
    </tr>
    <?php endforeach; ?>

<!-- View SPV -->
 <?php } elseif (! empty($lembur)) { ?>
    <?php
      foreach ($lembur as $d) : ?>
    <tr>
        <td class='text-center' style="color:black; font-size: 14px;"><?=date('d M Y',strtotime($d['tanggal_overtime']))?></td>
        <td class='text-center' style="color:black; font-size: 14px;">
        <?php
          if($d['status'] == 'Request') {
           ?>
           <span class="badge badge-warning">Request</span>
          <?php }?>

          <?php
          if($d['status'] == 'Planning Overtime Approved') {
           ?>
           <span class="badge badge-success1">Planning Overtime Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'Planning Overtime Rejected') {
           ?>
           <span class="badge badge-danger1">Planning Overtime Rejected</span>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation') {
           ?>
           <span class="badge badge-primary1">Evaluation</span>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation Rejected') {
           ?>
           <span class="badge badge-danger1">Evaluation Rejected</span>
          <?php }?>

          <?php
          if($d['status'] == 'Rejected') {
           ?>
           <span class="badge badge-danger1">Rejected</span>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation Approved') {
           ?>
           <span class="badge badge-info">Evaluation Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'Complete') {
           ?>
           <span class="badge badge-success2">Complete</span>
          <?php }?>

          <?php
          if($d['status'] == 'Not Complete') {
           ?>
           <span class="badge badge-danger1">Not Complete</span>
          <?php }?>

          <?php
          if($d['status'] == 'HOD Approved') {
           ?>
           <span class="badge badge-success2">HOD Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'HOD Rejected') {
           ?>
           <span class="badge badge-danger1">HOD Rejected</span>
          <?php }?>
          

        </td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['id_user']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['name']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['jenis_departement']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['lokasi']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= nl2br($d['reason']); ?></td>
        <!-- <td class='text-center' style="color:black; font-size: 14px;"><?= $d['type_day']; ?></td> -->
        
        <td class='text-center' style="color: black; font-size: 14px;">


        <?php if($d['status'] == 'Request' AND $d['name'] == $user['name']) {?>
              <a class="badge badge-success" title="Detail Report E-Overtime" href="<?= base_url('overtime/detail_overtime/') . $d['id_overtime']; ?>"><i class="fas fa-eye"></i></a>
        <?php } elseif ($d['status'] == 'Request') {?>
            <a class="badge badge-success" title="Approve Or Reject" href="<?= base_url('overtime/detail_overtime/') . $d['id_overtime']; ?>"><i class="fas fa-check"></i></a>
        <?php } ?>

        <?php if($d['status'] == 'Planning Overtime Approved' AND $d['name'] == $user['name']) {?>
            <a class="badge badge-success" title="Input Evaluation" href="<?= base_url('overtime/input_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-pen"></i></a>
        <?php } elseif  ($d['status'] == 'Planning Overtime Approved') {?>
            <a class="badge badge-success" title="Waiting Input Evaluation" ><i style="color: white;" class="fas fa-spinner"></i></a>
        <?php } ?>

        <?php
          if($d['status'] == 'Planning Overtime Rejected') {
           ?>
           <a class="badge badge-success" title="Detail Report E-Overtime" href="<?= base_url('overtime/detail_overtime/') . $d['id_overtime']; ?>"><i class="fas fa-eye"></i></a>
          <?php }?>

        <?php if($d['status'] == 'Evaluation' AND $d['name'] == $user['name']) {?>
          <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
        <?php } elseif  ($d['status'] == 'Evaluation') {?>
          <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-check"></i></a>
        <?php } ?>

          <?php
          if($d['status'] == 'Evaluation Approved') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation Rejected') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'Rejected') {
           ?>
           <a class="badge badge-warning" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-check"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'Complete') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/complete_overtime/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'Not Complete') {
           ?>
            <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/complete_overtime/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
           <!-- <a class="badge badge-warning" title="View Detail Evaluation" href="<?= base_url('overtime/push_rejecthrd/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-paper-plane"></i></a> -->
          <?php }?>

          <?php
          if($d['status'] == 'HOD Approved') {
           ?>
            <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'HOD Rejected') {
           ?>
            <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
        </td>

  
        </td>
    </tr>
    <?php endforeach; ?>

<!-- View GM -->
 <?php } elseif (! empty($lemburr)) { ?>
    <?php
      foreach ($lemburr as $d) : ?>
    <tr>
        <td class='text-center' style="color:black; font-size: 14px;"><?=date('d M Y',strtotime($d['tanggal_overtime']))?></td>
        <td class='text-center' style="color:black; font-size: 14px;">
        <?php
          if($d['status'] == 'Request') {
           ?>
           <span class="badge badge-warning">Request</span>
          <?php }?>

          <?php
          if($d['status'] == 'Planning Overtime Approved') {
           ?>
           <span class="badge badge-success1">Planning Overtime Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation') {
           ?>
           <span class="badge badge-primary1">Evaluation</span>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation Rejected') {
           ?>
           <span class="badge badge-danger1">Evaluation Rejected</span>
          <?php }?>

          <?php
          if($d['status'] == 'Rejected') {
           ?>
           <span class="badge badge-danger1">Rejected</span>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation Approved') {
           ?>
           <span class="badge badge-info">Evaluation Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'Complete') {
           ?>
           <span class="badge badge-success2">Complete</span>
          <?php }?>

          <?php
          if($d['status'] == 'Not Complete') {
           ?>
           <span class="badge badge-danger1">Not Complete</span>
          <?php }?>

          <?php
          if($d['status'] == 'HOD Approved') {
           ?>
           <span class="badge badge-success2">HOD Approved</span>
          <?php }?>

          <?php
          if($d['status'] == 'HOD Rejected') {
           ?>
           <span class="badge badge-danger1">HOD Rejected</span>
          <?php }?>
          

        </td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['id_user']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['name']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['jenis_departement']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['lokasi']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= nl2br($d['reason']); ?></td>
        <!-- <td class='text-center' style="color:black; font-size: 14px;"><?= $d['type_day']; ?></td> -->
        
        <td class='text-center' style="color: black; font-size: 14px;">
        <?php
          if($d['status'] == 'Request') {
           ?>
           <a class="badge badge-success" title="Approve Or Reject" href="<?= base_url('overtime/detail_overtime/') . $d['id_overtime']; ?>"><i class="fas fa-check"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'Planning Overtime Approved') {
           ?>
          <a class="badge badge-info" title="Input Evaluation" href="<?= base_url('overtime/input_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-pen"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'Evaluation') {
           ?>
           <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-check"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Evaluation Approved') {
           ?>
           <a class="badge badge-warning" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Evaluation Rejected') {
           ?>
           <a class="badge badge-warning" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-check"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Rejected') {
           ?>
           <a class="badge badge-warning" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-check"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Complete') {
           ?>
           <a class="badge badge-warning" title="View Detail Evaluation" href="<?= base_url('overtime/complete_overtime/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
          <?php
          if($d['status'] == 'Not Complete') {
           ?>
           <a class="badge badge-warning" title="View Detail Evaluation" href="<?= base_url('overtime/push_rejecthrd/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-paper-plane"></i></a>
          <?php }?>

          <?php
          if($d['status'] == 'HOD Approved') {
           ?>
            <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
        </td>

        <?php
          if($d['status'] == 'HOD Rejected') {
           ?>
            <a class="badge badge-success" title="View Detail Evaluation" href="<?= base_url('overtime/approve_evaluation/') . $d['id_overtime']; ?>"><i style="color: white;" class="fas fa-eye"></i></a>
          <?php }?>
        </td>
    </tr>
    <?php endforeach; ?>
      <?php }?>

</tbody>
</table>	
 </div>
</div>

<div class='modal'  id='edit' tabindex="-1" role="dialog" aria-labelledby="newDepModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content" style="width: 24rem;">
  <div class="modal-header">
  <center>
    <h5 class="modal-title" id="newDepModalLabel"><b style="font-size: 14px; text-align:center;">Detail Tanggal Cuti</b></h5>
  </center>  
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body" id="content_wmr">
  </div>
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
</div>
</div>
  </div>

<script src="<?= base_url('assets/'); ?>home/js/jquery-3.5.1.min.js"></script>
<!-- /.container-fluid -->
<script type="text/javascript">
	$("#id_departement").change(function(){
		load_pic_departemen($(this).val());
	});
	function load_pic_departemen(id_departemen){
		$.ajax({
	        url: "cuti_karyawan/pic_per_departemen/"+id_departemen,	       
	        success: function(response) {
	          $("#div_pic").html(response);
	        }
      });
	}

  function open_list_wmr(id_cuti){
    $("#content_wmr").html("progress...").load("<?php echo base_url()?>cuti_karyawan_input/detail_jumlah/"+id_cuti);
  }

  function open_list_delegasi(id_cuti){
    $("#content_delegasi").html("progress...").load("<?php echo base_url()?>cuti_karyawan_input/detail_delegasi/"+id_cuti);
  }
</script>




