<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require_once('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Overtime extends CI_Controller 
{

public function index()
	{

		$session = $this->session->get_userdata();
		$id_dep = $session['id_dep'];
		$id_user = $session['id_user'];
		// $id_jabatan = $session['id_jabatan'];

		$data['title'] = 'E-Overtime';
		$data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();

        $user = $this->db->get_where('m_user',['id_user' => $id_user])->row_array();
		$this->load->model('Overtime_model','name');
	// View HOD & SPRD
		if($user['id_jabatan'] == 3 OR $user['id_jabatan'] == 46) {
			$data['overtimeee'] = $this->name->LaporanPerdepartment($id_dep);
	// View Team PGA			
		}else if($user['id_jabatan'] == 30 OR $user['id_jabatan'] == 47){
			$data['overtimee'] = $this->name->getCheckReportHOD();
	// View SPV
		}else if($user['id_jabatan'] == 6){
		$data['lembur'] = $this->name->LaporanSPV($id_dep);
	// View GM
		}else if($user['id_jabatan'] == 10){
		$data['lemburr'] = $this->name->LaporanGManager();
	// View User Lain		
		}else {
			$data['overtime'] = $this->name->getCheckReport();
		}
		
        // $data['overtime'] = $this->name->getCheckReport();
		$data['inventaris'] = $this->db->get('inventaris')->result_array();
		// $data['overtime'] = $this->db->get('overtime')->result_array();
		$data['daily_routine'] = $this->db->get('dailyroutine')->result_array();
		$data['userr'] = $this->db->get('user')->result_array();
		$data['device'] = $this->db->get('device')->result_array();
		$data['departement'] = $this->db->get('departement')->result_array();
		$data['admin'] = $this->db->query("SELECT * FROM user where rule ='admin'")->result_array();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('overtime/index', $data);
			$this->load->view('templates/footer');		
}
public function overtime_input()
	{
		$data['title'] = 'Overtime Input';
		$data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$data['inventaris'] = $this->db->get('inventaris')->result_array();
		$data['daily_routine'] = $this->db->get('dailyroutine')->result_array();
		$data['userr'] = $this->db->get('user')->result_array();
		$data['device'] = $this->db->get('device')->result_array();
		$data['departement'] = $this->db->get('departement')->result_array();
		$data['kontraktor'] = $this->db->get('kontraktor')->result_array();
		$data['jabatan'] = $this->db->get('jabatan')->result_array();
		$data['lokasi'] = $this->db->get('m_lokasi')->result_array();
		$data['inv'] = $this->db->get('inv')->result_array();
		$data['admin'] = $this->db->query("SELECT * FROM user where rule ='IT'")->result_array();

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('id_user','Id_User','required');
		$this->form_validation->set_rules('id_dep','Id_Dep','required');
		$this->form_validation->set_rules('id_jabatan','Id_Jabatan','required');
		$this->form_validation->set_rules('id_lokasi','Id_Lokasi','required');
		$this->form_validation->set_rules('tanggal_overtime','Tanggal_Overtime','required');
		$this->form_validation->set_rules('reason','Reason','required');

		if($this->form_validation->run() ==false ) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('overtime/overtime_input', $data);
			$this->load->view('templates/footer');		
		} else {
			$data = [
				'name' => $this->input->post('name'),
				'id_user' => $this->input->post('id_user'),
				'id_dep' => $this->input->post('id_dep'),
				'id_jabatan' => $this->input->post('id_jabatan'),
				'id_lokasi' => $this->input->post('id_lokasi'),
				'tanggal_overtime' =>	 date('Y-m-d H:i:s', strtotime($this->input->post('tanggal_overtime'))),
				'reason' => $this->input->post('reason'),
				'status' => 'Request'
		   ];
		   	$name = $this->input->post('name');
			$id_user = $this->input->post('id_user');
		  	$id_dep = $this->input->post('id_dep');
		  	$id_jabatan = $this->input->post('id_jabatan');
		  	$id_lokasi = $this->input->post('id_lokasi');
			$tanggal_overtime = date('Y-m-d', strtotime($this->input->post('tanggal_overtime')));
			$reason = $this->input->post('reason');
			$status = $this->input->post('status');
		  

			 $this->db->insert('overtime', $data);

			 $id_overtime = $this->db->insert_id();
			 $name = $this->db->get_where('overtime', ['id_overtime' => $id_overtime])->row()->name;
			 $no_badge = $this->db->get_where('m_user', ['id_user' => $id_user])->row()->id_user;
			 $department = $this->db->get_where('departement', ['id_dep' => $id_dep])->row()->jenis_departement;
			 $jabatan = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row()->jabatan;
			 $lokasi = $this->db->get_where('m_lokasi', ['id_lokasi' => $id_lokasi])->row()->lokasi;
			 $tanggal_overtime = $this->db->get_where('overtime', ['id_overtime' => $id_overtime])->row()->tanggal_overtime;
			 $status = $this->db->get_where('overtime', ['id_overtime' => $id_overtime])->row()->status;
			 $reason = $this->db->get_where('overtime', ['id_overtime' => $id_overtime])->row()->reason;
			

			$email = $this->db->query("SELECT email FROM user WHERE id_jabatan in('3','46') AND id_dep = '$id_dep' ")->result_array();
			foreach ($email as $to) {
				$mail[] = implode(", ",$to);
			}
			$email = implode(", ", $mail);
			$to = $email;	

			$emailspv = $this->db->query("SELECT email FROM user WHERE id_jabatan in('6') AND id_dep = '$id_dep' ")->result_array();
			foreach ($emailspv as $spv) {
				$mailspv[] = implode(", ",$spv);
			}
			$emailspv = implode(", ", $mailspv);
			$spv = $emailspv;	
			// die($spv);

			$this->mail_request( $to, 
								$spv, 
								$id_overtime, 
								$name, 
								$no_badge, 
								$jabatan, 
								$lokasi, 
								$department, 
								$tanggal_overtime, 
								$status, 
								$reason
								);
			 $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You Success Create E-Overtime!</div>');
			redirect('overtime');
		}
}
public function mail_request($to, 
								$id_overtime, 
								$spv, 
								$name, 
								$no_badge, 
								$jabatan, 
								$lokasi, 
								$department, 
								$tanggal_overtime, 
								$status, 
								$reason){

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
							
	$user = $this->db->get_where('m_user',['id_user' => $id_user])->row_array();

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
	$mail = new PHPMailer(true);
	$mail->isSMTP();                                     
	$mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;                              
	$mail->Username = 'teamesystem@gmail.com';                 
	$mail->Password = 'itbfogutktnrfwfu';                           
	$mail->SMTPSecure = 'ssl';                            
	$mail->Port = 465;                                    
	$mail->isHTML(true); 
	
	$mailContent = 
		"<center>*******************************************************************************************************</br>
		<center><b>.:: Form E-Overtime  ::.</b></center>
		*******************************************************************************************************
		<table>

		  <tr>
			<td>Nama</td>
			<td>:</td>
			<td>".$name."</td>
		  </tr>

		  <tr>
			<td>No. Badge</td>
			<td>:</td>
			<td>".$no_badge."</td>
		  </tr>

		  <tr>
			<td>Jabatan</td>
			<td>:</td>
			<td>".$jabatan."</td>
		  </tr>

		  <tr>
			<td>Department</td>
			<td>:</td>
			<td>".$department."</td>
		  </tr>

		  <tr>
			<td>Lokasi</td>
			<td>:</td>
			<td>".$lokasi."</td>
		  </tr>

		  <tr>
			<td>Tanggal Overtime</td>
			<td>:</td>
			<td>".date('d M Y',strtotime($tanggal_overtime))."</td>
		  </tr>
		 
		  <tr>
			<td>Alasan Lembur</td>
			<td>:</td>
			<td>".nl2br($reason)."</td>
		  </tr>

		  <tr>
			<td>Status</td>
			<td>:</td>
			<td>".$status."</td>
		  </tr>

		</table>
		*******************************************************************************************************
		<p>Terima kasih telah membuat request Overtime pada website.</p>
		*******************************************************************************************************</center>";	
	
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	//end custom code

		$mail->setFrom('teamesystem@gmail.com','E-System E-Overtime');
		if($user['id_jabatan'] == 6) {
			$mail->addAddress('dekfiral@gmail.com');
			$mail->addReplyTo('dekfiral@gmail.com');
			// $addresses = explode(',', $to);                
			// foreach ($addresses as $address) {
    		// 	$mail->addAddress($address);
			// }
			// $addresses = explode(',', $to);                
			// foreach ($addresses as $address) {
			// 	$mail->addReplyTo($address);
			// }
		} elseif ($user['id_jabatan'] == 46 OR $user['id_jabatan'] == 3)  {
			$mail->addReplyTo('dekfiral@gmail.com');
			$mail->addAddress('dekfiral@gmail.com');
			// $mail->addReplyTo('');
			// $mail->addAddress('');
		} else {
			$mail->addAddress('dekfiral@gmail.com');
			$mail->addReplyTo('dekfiral@gmail.com');
			// $addresses = explode(',', $spv);                
			// foreach ($addresses as $address) {
    		// 	$mail->addAddress($address);
			// }

			// $addresses = explode(',', $spv);                
			// foreach ($addresses as $address) {
			// 	$mail->addReplyTo($address);
			// }
		}
		$mail->Subject = ('E-Overtime Request| E-Overtime');
		$mail->Body    = ($mailContent);
	
		if(!$mail->Send()) {
		// echo "Mailer Error: " . $mail->ErrorInfo;
		// echo $mail->print_debugger();
	 } else {
		// echo "Message has been sent";
		// echo $mail->print_debugger();
	 }
}
public function detail_overtime($id_overtime=null)
    {
		$session = $this->session->get_userdata();
		$id_dep = $session['id_dep'];
		$id_user = $session['id_user'];

        $data['title'] = 'Detail E-Overtime';
        $data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$data['eovertime'] = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->row_array();
		$data['userr'] = $this->db->get('user')->result_array();
		$data['departement'] = $this->db->get('departement')->result_array();
		$data['jabatan'] = $this->db->get('jabatan')->result_array();
		$data['lokasi'] = $this->db->get('m_lokasi')->result_array();
		$current_date = date("Y-m-d");

		$this->form_validation->set_rules('status','Status','required');

		  if(isset($_POST['save'])){
			if($this->form_validation->run() ==true ) {

			$status = $this->input->post('status');

			$this->db->set('action_planning_by', $id_user);
			$this->db->set('action_planning_date', $current_date);
			$this->db->set('status', $status);
			$this->db->where('id_overtime', $id_overtime);
			$this->db->update('overtime');

			$overtime = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->result_array();
			
			
			foreach ($overtime as $nm) :	
			$this->mail_approve(
								$nm['id_overtime'],
								$nm['name'],
								$nm['id_userr'],
								$nm['jabatan'],
								$nm['lokasi'],
								$nm['jenis_departement'],
								$nm['tanggal_overtime'],
								$nm['status'],
								$nm['email'],
								$nm['reason']
								);
			endforeach;


			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Approved Success !</div>');
			redirect('overtime');
		} } else {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('overtime/detail_overtime', $data);
			$this->load->view('templates/footer'); 
		}
}
public function mail_approve( $id_overtime, 
								$name, 
								$id_userr, 
								$jabatan, 
								$lokasi, 
								$jenis_department, 
								$tanggal_overtime, 
								$status, 
								$email, 
								$reason){

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
							
	$user = $this->db->get_where('m_user',['id_user' => $id_user])->row_array();

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
	$mail = new PHPMailer(true);
	$mail->isSMTP();                                     
	$mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;                              
	$mail->Username = 'teamesystem@gmail.com';                 
	$mail->Password = 'itbfogutktnrfwfu';                           
	$mail->SMTPSecure = 'ssl';                            
	$mail->Port = 465;                                    
	$mail->isHTML(true); 
	
	$mailContent = 
		"<center>*******************************************************************************************************</br>
		<center><b>.:: Form E-Overtime  ::.</b></center>
		*******************************************************************************************************
		<table>

		  <tr>
			<td>Nama</td>
			<td>:</td>
			<td>".$name."</td>
		  </tr>

		  <tr>
			<td>No. Badge</td>
			<td>:</td>
			<td>".$id_userr."</td>
		  </tr>

		  <tr>
			<td>Jabatan</td>
			<td>:</td>
			<td>".$jabatan."</td>
		  </tr>

		  <tr>
			<td>Department</td>
			<td>:</td>
			<td>".$jenis_department."</td>
		  </tr>

		  <tr>
			<td>Lokasi</td>
			<td>:</td>
			<td>".$lokasi."</td>
		  </tr>

		  <tr>
			<td>Tanggal Overtime</td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($tanggal_overtime))."</td>
		  </tr>
		  <tr>
			<td>Alasan Lembur</td>
			<td>:</td>
			<td>".nl2br($reason)."</td>
		  </tr>
		  <tr>
			<td>Status</td>
			<td>:</td>
			<td>".$status."</td>
		  </tr>

		</table>
		*******************************************************************************************************
		<p>Terima kasih telah membuat request Overtime pada website.</p>
		*******************************************************************************************************</center>";	
	
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	//end custom code

		$mail->setFrom('teamesystem@gmail.com','E-System E-Overtime');
			// $mail->addAddress($email);
			// $mail->addReplyTo($email);
			$mail->addAddress('dekfiral@gmail.com');
			$mail->addReplyTo('dekfiral@gmail.com');

		if ($status == 'Planning Overtime Approved') {
			$mail->Subject = ('Planning E-Overtime Approved| E-Overtime');
		}
		if ($status == 'Planning Overtime Rejected') {
			$mail->Subject = ('Rejected Planning Overtime| E-Overtime');
		}
		
		$mail->Body    = ($mailContent);
	
		if(!$mail->Send()) {
		// echo "Mailer Error: " . $mail->ErrorInfo;
		// echo $mail->print_debugger();
	 } else {
		// echo "Message has been sent";
		// echo $mail->print_debugger();
	 }
}
public function edit_detail_overtime($id_overtime=null)
    {
		$session = $this->session->get_userdata();
		$id_dep = $session['id_dep'];
		$id_user = $session['id_user'];

        $data['title'] = 'Detail E-Overtime';
        $data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$data['eovertime'] = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->row_array();
		$data['userr'] = $this->db->get('user')->result_array();
		$data['departement'] = $this->db->get('departement')->result_array();
		$data['jabatan'] = $this->db->get('jabatan')->result_array();
		$data['lokasi'] = $this->db->get('m_lokasi')->result_array();
		$current_date = date("Y-m-d");

		// $this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('id_lokasi','Id_Lokasi','required');
		$this->form_validation->set_rules('tanggal_overtime','Tanggal_Overtime','required');
		$this->form_validation->set_rules('reason','Reason','required');

		if(isset($_POST['save'])){
			if($this->form_validation->run() ==true ) {

		$status = 'Request';
		$id_lokasi = $this->input->post('id_lokasi');
		$tanggal_overtime = date('Y-m-d H:i:s', strtotime($this->input->post('tanggal_overtime')));
		$reason = $this->input->post('reason');
				

			
			$this->db->set('status', $status);
			$this->db->set('id_lokasi', $id_lokasi);
			$this->db->set('tanggal_overtime', $tanggal_overtime);
			$this->db->set('reason', $reason);
			$this->db->where('id_overtime', $id_overtime);
			$this->db->update('overtime');

			// echo $this->db->last_query(); die();

			$overtime = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->result_array();
			
			$email = $this->db->query("SELECT email FROM user WHERE id_jabatan in('3','46') AND id_dep = '$id_dep' ")->result_array();
			foreach ($email as $to) {
				$mail[] = implode(", ",$to);
			}
			$email = implode(", ", $mail);
			$to = $email;	

			$emailspv = $this->db->query("SELECT email FROM user WHERE id_jabatan in('6') AND id_dep = '$id_dep' ")->result_array();
			foreach ($emailspv as $spv) {
				$mailspv[] = implode(", ",$spv);
			}
			$emailspv = implode(", ", $mailspv);
			$spv = $emailspv;	
			// die($spv);
			foreach ($overtime as $nm) :	
			$this->edit_mail_request(
								$to,
								$spv,
								$nm['id_overtime'],
								$nm['name'],
								$nm['id_userr'],
								$nm['jabatan'],
								$nm['lokasi'],
								$nm['jenis_departement'],
								$nm['tanggal_overtime'],
								$nm['status'],
								$nm['email'],
								$nm['reason']
								);
			endforeach;


			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Edit Success !</div>');
			redirect('overtime');
		} } else {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('overtime/detail_overtime', $data);
			$this->load->view('templates/footer'); 
		}
}
public function edit_mail_request( $id_overtime, 
								$to, 
								$spv, 
								$name, 
								$id_userr, 
								$jabatan, 
								$lokasi, 
								$jenis_department, 
								$tanggal_overtime, 
								$status, 
								$email, 
								$reason){

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
							
	$user = $this->db->get_where('m_user',['id_user' => $id_user])->row_array();

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
	$mail = new PHPMailer(true);
	$mail->isSMTP();                                     
	$mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;                              
	$mail->Username = 'teamesystem@gmail.com';                 
	$mail->Password = 'itbfogutktnrfwfu';                           
	$mail->SMTPSecure = 'ssl';                            
	$mail->Port = 465;                                    
	$mail->isHTML(true); 
	
	$mailContent = 
		"<center>*******************************************************************************************************</br>
		<center><b>.:: Form E-Overtime  ::.</b></center>
		*******************************************************************************************************
		<table>

		  <tr>
			<td>Nama</td>
			<td>:</td>
			<td>".$name."</td>
		  </tr>

		  <tr>
			<td>No. Badge</td>
			<td>:</td>
			<td>".$id_userr."</td>
		  </tr>

		  <tr>
			<td>Jabatan</td>
			<td>:</td>
			<td>".$jabatan."</td>
		  </tr>

		  <tr>
			<td>Department</td>
			<td>:</td>
			<td>".$jenis_department."</td>
		  </tr>

		  <tr>
			<td>Lokasi</td>
			<td>:</td>
			<td>".$lokasi."</td>
		  </tr>

		  <tr>
			<td>Tanggal Overtime</td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($tanggal_overtime))."</td>
		  </tr>
		  <tr>
			<td>Alasan Lembur</td>
			<td>:</td>
			<td>".nl2br($reason)."</td>
		  </tr>
		  <tr>
			<td>Status</td>
			<td>:</td>
			<td>".$status."</td>
		  </tr>

		</table>
		*******************************************************************************************************
		<p>Terima kasih telah membuat request Overtime pada website.</p>
		*******************************************************************************************************</center>";	
	
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		//end custom code
	
			$mail->setFrom('teamesystem@gmail.com','E-System E-Overtime');
			if($user['id_jabatan'] == 6) {
				$mail->addAddress('dekfiral@gmail.com');
				$mail->addReplyTo('dekfiral@gmail.com');
				// $addresses = explode(',', $to);                
				// foreach ($addresses as $address) {
				// 	$mail->addAddress($address);
				// }
				// $addresses = explode(',', $to);                
				// foreach ($addresses as $address) {
				// 	$mail->addReplyTo($address);
				// }
			} elseif ($user['id_jabatan'] == 46 OR $user['id_jabatan'] == 3)  {
				$mail->addReplyTo('dekfiral@gmail.com');
				$mail->addAddress('dekfiral@gmail.com');
				// $mail->addReplyTo('');
				// $mail->addAddress('');
			} else {
				$mail->addAddress('dekfiral@gmail.com');
				$mail->addReplyTo('dekfiral@gmail.com');
				// $addresses = explode(',', $spv);                
				// foreach ($addresses as $address) {
				// 	$mail->addAddress($address);
				// }
	
				// $addresses = explode(',', $spv);                
				// foreach ($addresses as $address) {
				// 	$mail->addReplyTo($address);
				// }
			}
			$mail->Subject = ('E-Overtime Request| E-Overtime');
			$mail->Body    = ($mailContent);
		
			if(!$mail->Send()) {
			// echo "Mailer Error: " . $mail->ErrorInfo;
			// echo $mail->print_debugger();
		 } else {
			// echo "Message has been sent";
			// echo $mail->print_debugger();
		 }
}
public function input_evaluation($id_overtime=null)
    {

		$session = $this->session->get_userdata();
		$id_dep = $session['id_dep'];
        $data['title'] = 'Input Evaluation E-Overtime';
        $data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$data['eovertime'] = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->row_array();
		$data['userr'] = $this->db->get('user')->result_array();
		$data['departement'] = $this->db->get('departement')->result_array();
		$data['jabatan'] = $this->db->get('jabatan')->result_array();

		// $this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('reason_activity','Reason_Activity','required');
		$this->form_validation->set_rules('start_date','Start_Date','required');
		$this->form_validation->set_rules('to_date','To_Date','required');

		  if(isset($_POST['save'])){
			if($this->form_validation->run() ==true ) {

			$start_date = date('Y-m-d H:i:s', strtotime($this->input->post('start_date')));
			$to_date = date('Y-m-d H:i:s', strtotime($this->input->post('to_date')));
			$reason_activity = $this->input->post('reason_activity');
			$status = 'Evaluation';
			
			$this->db->set('start_date', $start_date);
			$this->db->set('to_date', $to_date);
			$this->db->set('reason_activity', $reason_activity);
			$this->db->set('status', $status);
			$this->db->where('id_overtime', $id_overtime);
			$this->db->update('overtime');
			// echo $this->db->last_query(); die();
			$overtime = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->result_array();
			$email = $this->db->query("SELECT email FROM user WHERE id_jabatan in('3','46') AND id_dep = '$id_dep' ")->result_array();
			foreach ($email as $to) {
				$mail[] = implode(", ",$to);
			}
			$email = implode(", ", $mail);
			$to = $email;	

			$emailspv = $this->db->query("SELECT email FROM user WHERE id_jabatan in('6') AND id_dep = '$id_dep' ")->result_array();
			foreach ($emailspv as $spv) {
				$mailspv[] = implode(", ",$spv);
			}
			$emailspv = implode(", ", $mailspv);
			$spv = $emailspv;	

			// die($to);
			
			foreach ($overtime as $nm) :	
			$this->mail_evaluation(
								$to,
								$spv,
								$nm['id_overtime'],
								$nm['name'],
								$nm['id_userr'],
								$nm['jabatan'],
								$nm['lokasi'],
								$nm['jenis_departement'],
								$nm['tanggal_overtime'],
								$nm['status'],
								$nm['email'],
								$nm['reason'],
								$nm['start_date'],
								$nm['to_date'],
								$nm['reason_activity']
								);
			endforeach;
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Input Evaluation Success !</div>');
			redirect('overtime');

		} } else {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('overtime/input_evaluation', $data);
			$this->load->view('templates/footer'); 
		}
}
public function mail_evaluation( $id_overtime, 
								$to, 
								$spv, 
								$name, 
								$id_userr, 
								$jabatan, 
								$lokasi, 
								$jenis_department, 
								$tanggal_overtime, 
								$status, 
								$email, 
								$reason,
								$start_date,
								$to_date,
								$reason_activity){

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
							
	$user = $this->db->get_where('m_user',['id_user' => $id_user])->row_array();

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
	$mail = new PHPMailer(true);
	$mail->isSMTP();                                     
	$mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;                              
	$mail->Username = 'teamesystem@gmail.com';                 
	$mail->Password = 'itbfogutktnrfwfu';                           
	$mail->SMTPSecure = 'ssl';                            
	$mail->Port = 465;                                    
	$mail->isHTML(true); 
	
	$mailContent = 
		"<center>*******************************************************************************************************</br>
		<center><b>.:: Form E-Overtime  ::.</b></center>
		*******************************************************************************************************
		<table>

		  <tr>
			<td>Nama</td>
			<td>:</td>
			<td>".$name."</td>
		  </tr>

		  <tr>
			<td>No. Badge</td>
			<td>:</td>
			<td>".$id_userr."</td>
		  </tr>

		  <tr>
			<td>Jabatan</td>
			<td>:</td>
			<td>".$jabatan."</td>
		  </tr>

		  <tr>
			<td>Department</td>
			<td>:</td>
			<td>".$jenis_department."</td>
		  </tr>

		  <tr>
			<td>Lokasi</td>
			<td>:</td>
			<td>".$lokasi."</td>
		  </tr>

		  <tr>
			<td>Tanggal Overtime</td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($tanggal_overtime))."</td> 
		  </tr>
		
		  <tr>
			<td>Alasan Lembur</td>
			<td>:</td>
			<td>".nl2br($reason)."</td>
		  </tr>

		  <tr>
			<td>Permohonan Lembur</td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($start_date))."</td>
		  </tr>

		  <tr>
			<td>Sampai Dengan</td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($to_date))."</td>
		  </tr>

		  <tr>
			<td>Aktifitas Lembur</td>
			<td>:</td>
			<td>".nl2br($reason_activity)."</td>
		  </tr>

		  <tr>
		  	<td>Status</td>
		  	<td>:</td>
		  	<td>".$status."</td>
		  </tr>

		</table>
		*******************************************************************************************************
		<p>Terima kasih telah membuat request Overtime pada website.</p>
		*******************************************************************************************************</center>";	
	
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	//end custom code

	$mail->setFrom('teamesystem@gmail.com','E-System E-Overtime');
	if($user['id_jabatan'] == 6) {
		$mail->addAddress('dekfiral@gmail.com');
		$mail->addReplyTo('dekfiral@gmail.com');
 //mail ke HOD & SPRD 
		// $addresses = explode(',', $to);                
		// foreach ($addresses as $address) {
		// 	$mail->addAddress($address);
		// }

		// $addresses = explode(',', $to);                
		// foreach ($addresses as $address) {
		// 	$mail->addReplyTo($address);
		// }
	}elseif($user['id_jabatan'] == 3 OR $user['id_jabatan'] == 46){
		$mail->addAddress('dekfiral@gmail.com');
		$mail->addReplyTo('dekfiral@gmail.com');
		// $mail->addAddress('');
		// $mail->addReplyTo('');
	} else {
		$mail->addAddress('dekfiral@gmail.com');
		$mail->addReplyTo('dekfiral@gmail.com');
		// $addresses = explode(',', $spv);                
		// foreach ($addresses as $address) {
		// 	$mail->addAddress($address);
		// }

		// $addresses = explode(',', $spv);                
		// foreach ($addresses as $address) {
		// 	$mail->addReplyTo($address);
		// }
	}
	$mail->Subject = ('E-Overtime Evaluation| E-Overtime');
	$mail->Body    = ($mailContent);
	
		if(!$mail->Send()) {
		// echo "Mailer Error: " . $mail->ErrorInfo;
		// echo $mail->print_debugger();
	 } else {
		// echo "Message has been sent";
		// echo $mail->print_debugger();
	 }
}
public function approve_evaluation($id_overtime=null)
    {
		$session = $this->session->get_userdata();
		$id_dep = $session['id_dep'];
		$id_user = $session['id_user'];

        $data['title'] = 'Detail E-Overtime';
        $data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$data['eovertime'] = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->row_array();
		$data['userr'] = $this->db->get('user')->result_array();
		$data['departement'] = $this->db->get('departement')->result_array();
		$data['jabatan'] = $this->db->get('jabatan')->result_array();
		$current_date = date("Y-m-d");

		$this->form_validation->set_rules('status','Status','required');

		  if(isset($_POST['save'])){
			if($this->form_validation->run() ==true ) {

			$status = $this->input->post('status');
			
			$this->db->set('action_evaluation_by', $id_user);
			$this->db->set('action_evaluation_date', $current_date);
			$this->db->set('status', $status);
			$this->db->where('id_overtime', $id_overtime);
			$this->db->update('overtime');

			$overtime = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->result_array();

			$email = $this->db->query("SELECT email FROM user WHERE id_jabatan in('3','46') AND id_dep = '$id_dep' ")->result_array();
			foreach ($email as $to) {
				$mail[] = implode(", ",$to);
			}
			$email = implode(", ", $mail);
			$to = $email;

			foreach ($overtime as $nm) :	
			$this->mail_approve_evaluation(
									$nm['id_overtime'],
									$nm['name'],
									$nm['id_userr'],
									$nm['jabatan'],
									$nm['lokasi'],
									$nm['jenis_departement'],
									$nm['tanggal_overtime'],
									$nm['status'],
									$nm['email'],
									$nm['reason'],
									$nm['start_date'],
									$nm['to_date'],
									$nm['reason_activity'],
									$to
									);
				endforeach;
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Approved Success !</div>');
			redirect('overtime');
		} } else {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('overtime/approve_evaluation', $data);
			$this->load->view('templates/footer'); 
		}
}
public function mail_approve_evaluation( $id_overtime, 
								$name, 
								$id_userr, 
								$jabatan, 
								$lokasi, 
								$jenis_department, 
								$tanggal_overtime, 
								$status, 
								$email, 
								$reason,
								$start_date,
								$to_date,
								$reason_activity,
								$to){

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
							
	$user = $this->db->get_where('m_user',['id_user' => $id_user])->row_array();

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
	$mail = new PHPMailer(true);
	$mail->isSMTP();                                     
	$mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;                              
	$mail->Username = 'teamesystem@gmail.com';                 
	$mail->Password = 'itbfogutktnrfwfu';                           
	$mail->SMTPSecure = 'ssl';                            
	$mail->Port = 465;                                    
	$mail->isHTML(true); 
	
	$mailContent = 
		"<center>*******************************************************************************************************</br>
		<center><b>.:: Form E-Overtime  ::.</b></center>
		*******************************************************************************************************
		<table>

		  <tr>
			<td>Nama</td>
			<td>:</td>
			<td>".$name."</td>
		  </tr>

		  <tr>
			<td>No. Badge</td>
			<td>:</td>
			<td>".$id_userr."</td>
		  </tr>

		  <tr>
			<td>Jabatan</td>
			<td>:</td>
			<td>".$jabatan."</td>
		  </tr>

		  <tr>
			<td>Department</td>
			<td>:</td>
			<td>".$jenis_department."</td>
		  </tr>

		  <tr>
			<td>Lokasi</td>
			<td>:</td>
			<td>".$lokasi."</td>
		  </tr>

		  <tr>
			<td>Tanggal Overtime</td>
			<td>:</td>
			<td>".date('d M Y',strtotime($tanggal_overtime))."</td> 
		  </tr>
		 
		  <tr>
			<td>Status</td>
			<td>:</td>
			<td>".$status."</td>
		  </tr>

		  <tr>
			<td>Reason</td>
			<td>:</td>
			<td>".nl2br($reason)."</td>
		  </tr>

		  <tr>
			<td>Mulai Lembur </td>
			<td>:</td>
			<td>".date('d M Y',strtotime($start_date))."</td>
		  </tr>

		  <tr>
			<td>Sampai Dengan</td>
			<td>:</td>
			<td>".date('d M Y',strtotime($to_date))."</td>
		  </tr>

		  <tr>
			<td>Aktifitas Lembur</td>
			<td>:</td>
			<td>".nl2br($reason_activity)."</td>
		  </tr>

		</table>
		*******************************************************************************************************
		<p>Terima kasih telah membuat request Overtime pada website.</p>
		*******************************************************************************************************</center>";	
	
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	//end custom code

		$mail->setFrom('teamesystem@gmail.com','E-System E-Overtime');
 // mail SPV		
		if ($status == 'Evaluation Approved' AND $user['id_jabatan'] == 6) {
			$mail->addAddress('dekfiral@gmail.com');
			$mail->addReplyTo('dekfiral@gmail.com');
		// $addresses = explode(',', $to);                
		// foreach ($addresses as $address) {
    	// 	$mail->addAddress($address);
		// }
		// $addresses = explode(',', $to);                
		// foreach ($addresses as $address) {
		// 	$mail->addReplyTo($address);
		// }
		// $mail->addCC($email);
			$mail->Subject = ('Evaluation Approved| E-Overtime');
			$mail->Body    = ($mailContent);

		} elseif ($status == 'Evaluation Rejected' AND $user['id_jabatan'] == 6) {
			$mail->addAddress('dekfiral@gmail.com');
			$mail->addReplyTo('dekfiral@gmail.com');
		// $mail->addAddress($email);
		// $mail->addReplyTo($email);
			$mail->Subject = ('Evaluation Rejected| E-Overtime');
			$mail->Body    = ($mailContent);
		} 
 // mail HOD & SPRD
		if ($status == 'Evaluation Approved' AND $user['id_jabatan'] == 46 OR $user['id_jabatan'] == 3) {
			$mail->addAddress('dekfiral@gmail.com');
			$mail->addReplyTo('dekfiral@gmail.com');
			// $mail->addAddress($email);
			// $mail->addReplyTo($email);
			$mail->Subject = ('Evaluation Approved| E-Overtime');
			$mail->Body    = ($mailContent);
		} elseif ($status == 'Evaluation Rejected' AND $user['id_jabatan'] == 46 OR $user['id_jabatan'] == 3) {
			$mail->addAddress('dekfiral@gmail.com');
			$mail->addReplyTo('dekfiral@gmail.com');
			// $mail->addAddress($email);
			// $mail->addReplyTo($email);
			$mail->Subject = ('Evaluation Rejected| E-Overtime');
			$mail->Body    = ($mailContent);
		}
 // mail GM
		if ($status == 'BOD Approved' AND $user['id_jabatan'] == 10) {
			$mail->addAddress('dekfiral@gmail.com');
			$mail->addReplyTo('dekfiral@gmail.com');
			// $mail->addAddress('');
			// $mail->addReplyTo('');
			// $mail->addCC($email);
			
			$mail->Subject = ('BOD Approved| E-Overtime');
			$mail->Body    = ($mailContent);
		} elseif ($status == 'BOD Rejected' AND $user['id_jabatan'] == 10) {
			$mail->addAddress('dekfiral@gmail.com');
			$mail->addReplyTo('dekfiral@gmail.com');
			// $mail->addAddress($email);
			// $mail->addReplyTo($email);
			$mail->Subject = ('BOD Rejected| E-Overtime');
			$mail->Body    = ($mailContent);
		}
	
		if(!$mail->Send()) {
		// echo "Mailer Error: " . $mail->ErrorInfo;
		// echo $mail->print_debugger();
	 } else {
		// echo "Message has been sent";
		// echo $mail->print_debugger();
	 }
}
public function complete_overtime($id_overtime=null)
    {

		$session = $this->session->get_userdata();
		$id_dep = $session['id_dep'];
		$id_user = $session['id_user'];

        $data['title'] = 'Complete E-Overtime';
        $data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$data['eovertime'] = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->row_array();
		$data['userr'] = $this->db->get('user')->result_array();
		$data['departement'] = $this->db->get('departement')->result_array();
		$data['jabatan'] = $this->db->get('jabatan')->result_array();
		$current_date = date("Y-m-d");

		$query = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->result_array();
		foreach ($query as $ovt ) :
			$ovt['start_date'];
			$ovt['to_date'];
		endforeach;

		$actual_start = $ovt['start_date'];
		$actual_to = $ovt['to_date'];
	if ($ovt['start_date'] == $ovt['to_date'] ){

		$data['lembur'] = $this->db->query("SELECT 0 AS jam,
		0 AS menit;")->row_array();

 // $data['lembur'] = $this->db->query("SELECT 0 AS jam,
 // 0 AS menit 
 // FROM  overtime
 // WHERE id_overtime ='$id_overtime';")->row_array();
	} else {
		$data['lembur'] = $this->db->query("SELECT Substring(timediff('$actual_start', '$actual_to'),2,2) AS jam,
												   Substring(timediff('$actual_start', '$actual_to'),5,2) AS menit 
												   FROM  overtime
												   WHERE id_overtime ='$id_overtime';")->row_array();
	}

	$actual_start_approve = $ovt['approve_start'];
	$actual_to_approve = $ovt['approve_to'];
    if ($ovt['approve_start'] == $ovt['approve_to'] ){

	$data['lemburr'] = $this->db->query("SELECT 0 AS jam,
	0 AS menit;")->row_array();

 // $data['lembur'] = $this->db->query("SELECT 0 AS jam,
 // 0 AS menit 
 // FROM  overtime
 // WHERE id_overtime ='$id_overtime';")->row_array();
    } else {
	$data['lemburr'] = $this->db->query("SELECT Substring(timediff('$actual_start_approve', '$actual_to_approve'),2,2) AS jam,
											   Substring(timediff('$actual_start_approve', '$actual_to_approve'),5,2) AS menit 
											   FROM  overtime
											   WHERE id_overtime ='$id_overtime';")->row_array();
  }
														   
		//  print_r($data['lembur']); die();

		// $this->form_validation->set_rules('status','Status','required');
		// $this->form_validation->set_rules('approve_start','Approve_Start');
		// $this->form_validation->set_rules('approve_to','Approve_To');
		$this->form_validation->set_rules('type_day','Type_Day');
		$this->form_validation->set_rules('type_overtime','Type_Overtime');
		$this->form_validation->set_rules('status','Status','required');

		  if(isset($_POST['save'])){
			if($this->form_validation->run() ==true ) {

			// $approve_start = date('Y-m-d H:i:s', strtotime($this->input->post('approve_start')));
			// $approve_to = date('Y-m-d H:i:s', strtotime($this->input->post('approve_to')));
			$type_day = $this->input->post('type_day');
			$type_overtime = $this->input->post('type_overtime');
			$status = $this->input->post('status');
			$take_rest = '0';

			$this->db->set('action_complete_by', $id_user);
			$this->db->set('action_complete_date', $current_date);
			// $this->db->set('approve_start', $approve_start);
			// $this->db->set('approve_to', $approve_to);
			$this->db->set('type_day', $type_day);
			$this->db->set('type_overtime', $type_overtime);
			$this->db->set('take_rest', $take_rest);
			$this->db->set('status', $status);
			$this->db->where('id_overtime', $id_overtime);
			$this->db->update('overtime');
			// echo $this->db->last_query(); die();
			

			$overtime = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->result_array();
			foreach ($overtime as $ovt) :
				$ovt['id_dep'];
			endforeach;
			$id_dep = $ovt['id_dep'];
			// die($id_dep);

			$email = $this->db->query("SELECT email FROM user WHERE id_jabatan in('3','46','6') AND id_dep = '$id_dep' ")->result_array();
			// print_r($email);
			// $mail =array();
			foreach ($email as $to) {
				$mail[] = implode(", ",$to);
			}
			$email = implode(", ", $mail);
			$to = $email;	
			// die($to);

			foreach ($overtime as $nm) :	
			$this->mail_approve_complete($to,
									$nm['id_overtime'],
									$nm['name'],
									$nm['id_userr'],
									$nm['jabatan'],
									$nm['lokasi'],
									$nm['jenis_departement'],
									$nm['tanggal_overtime'],
									$nm['status'],
									$nm['email'],
									$nm['reason'],
									$nm['start_date'],
									$nm['to_date'],
									$nm['reason_activity'],
									$nm['approve_start'],
									$nm['approve_to'],
									$nm['type_day'],
									$nm['type_overtime']
									);
				endforeach;

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Confirm Success !</div>');
			redirect('overtime');

		} } else {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('overtime/complete_overtime', $data);
			$this->load->view('templates/footer'); 
		}
}
public function mail_approve_complete($to,
								 $id_overtime, 
								$name, 
								$id_userr, 
								$jabatan, 
								$lokasi, 
								$jenis_department, 
								$tanggal_overtime, 
								$status, 
								$email, 
								$reason,
								$start_date,
								$to_date,
								$reason_activity,
								$approve_start,
								$approve_to,
								$type_day,
								$type_overtime
								){

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
							
	$user = $this->db->get_where('m_user',['id_user' => $id_user])->row_array();

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
	$mail = new PHPMailer(true);
	$mail->isSMTP();                                     
	$mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;                              
	$mail->Username = 'teamesystem@gmail.com';                 
	$mail->Password = 'itbfogutktnrfwfu';                           
	$mail->SMTPSecure = 'ssl';                            
	$mail->Port = 465;                                    
	$mail->isHTML(true); 
	
	$mailContent = 
		"<center>*******************************************************************************************************</br>
		<center><b>.:: Form E-Overtime  ::.</b></center>
		*******************************************************************************************************
		<table>

		  <tr>
			<td>Nama</td>
			<td>:</td>
			<td>".$name."</td>
		  </tr>

		  <tr>
			<td>No. Badge</td>
			<td>:</td>
			<td>".$id_userr."</td>
		  </tr>

		  <tr>
			<td>Jabatan</td>
			<td>:</td>
			<td>".$jabatan."</td>
		  </tr>

		  <tr>
			<td>Department</td>
			<td>:</td>
			<td>".$jenis_department."</td>
		  </tr>

		  <tr>
			<td>Lokasi</td>
			<td>:</td>
			<td>".$lokasi."</td>
		  </tr>

		  <tr>
			<td>Tanggal Overtime</td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($tanggal_overtime))."</td> 
		  </tr>

		  <tr>
			<td>Reason</td>
			<td>:</td>
			<td>".nl2br($reason)."</td>
		  </tr>

		  <tr>
			<td>Permohonan Lembur </td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($start_date))."</td>
		  </tr>

		  <tr>
			<td>Sampai Dengan</td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($to_date))."</td>
		  </tr>

		  <tr>
			<td>Aktifitas Lembur</td>
			<td>:</td>
			<td>".nl2br($reason_activity)."</td>
		  </tr>

		  <tr>
			<td>Approve Lembur mulai </td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($approve_start))."</td>
		  </tr>

		  <tr>
			<td>Approve Lembur sampai</td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($approve_to))."</td>
		  </tr>

		  <tr>
			<td>Tipe Hari</td>
			<td>:</td>
			<td>".$type_day."</td>
		  </tr>

		  <tr>
			<td>Tipe Lembur</td>
			<td>:</td>
			<td>".$type_overtime."</td>
		  </tr>

		<tr>
		  <td>Status</td>
		  <td>:</td>
		  <td>".$status."</td>
		</tr>

		</table>
		*******************************************************************************************************
		<p>Terima kasih telah membuat request Overtime pada website.</p>
		*******************************************************************************************************</center>";	
	
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	//end custom code

		$mail->setFrom('teamesystem@gmail.com','E-System E-Overtime');
		if ($status == 'Complete') {
		$mail->addAddress('dekfiral@gmail.com');
		$mail->addReplyTo('dekfiral@gmail.com');
		// $mail->addAddress($email);
		// $mail->addReplyTo($email);
		$mail->Subject = ('Overtime Complete| E-Overtime');
		$mail->Body    = ($mailContent);
		}
		if ($status == 'Not Complete') {
			$mail->addAddress('dekfiral@gmail.com');
			$mail->addReplyTo('dekfiral@gmail.com');
			// $mail->addAddress($to);
			// $mail->addReplyTo($to);
			// $mail->addCC($email);
			$mail->Subject = ('Overtime Not Complete| E-Overtime');
			$mail->Body    = ($mailContent);
			}
	
		if(!$mail->Send()) {
		// echo "Mailer Error: " . $mail->ErrorInfo;
		// echo $mail->print_debugger();
	 } else {
		// echo "Message has been sent";
		// echo $mail->print_debugger();
	 }
}
public function detail_complete($id_overtime=null)
    {
        $data['title'] = 'Complete E-Overtime';
        $data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$data['eovertime'] = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->row_array();
		$data['userr'] = $this->db->get('user')->result_array();
		$data['departement'] = $this->db->get('departement')->result_array();
		$data['jabatan'] = $this->db->get('jabatan')->result_array();

		// $this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('approve_start','Approve_Start','required');
		$this->form_validation->set_rules('approve_to','Approve_To','required');
		$this->form_validation->set_rules('type_day','Type_Day','required');
		$this->form_validation->set_rules('type_overtime','Type_Overtime','required');
		$this->form_validation->set_rules('status','Status','required');

		  if(isset($_POST['save'])){
			if($this->form_validation->run() ==true ) {

			$approve_start = date('Y-m-d H:i:s', strtotime($this->input->post('approve_start')));
			$approve_to = date('Y-m-d H:i:s', strtotime($this->input->post('approve_to')));
			$type_day = $this->input->post('type_day');
			$type_overtime = $this->input->post('type_overtime');
			$status = $this->input->post('status');
			$take_rest = '0';
			
			$this->db->set('approve_start', $approve_start);
			$this->db->set('approve_to', $approve_to);
			$this->db->set('type_day', $type_day);
			$this->db->set('type_overtime', $type_overtime);
			$this->db->set('take_rest', $take_rest);
			$this->db->set('status', $status);
			$this->db->where('id_overtime', $id_overtime);
			$this->db->update('overtime');
			// echo $this->db->last_query(); die();
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Input Evaluation Success !</div>');
			redirect('overtime');

		} } else {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('overtime/detail_complete', $data);
			$this->load->view('templates/footer'); 
		}
}
public function push_rejecthrd($id_overtime=null)
    {

		$session = $this->session->get_userdata();
		$id_dep = $session['id_dep'];
		$id_user = $session['id_user'];

        $data['title'] = 'Complete E-Overtime';
        $data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();

			$status = 'Reject HRD';

			$this->db->set('status', $status);
			$this->db->where('id_overtime', $id_overtime);
			$this->db->update('overtime');
			// echo $this->db->last_query(); die();
			

			$overtime = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->result_array();
			foreach ($overtime as $ovt) :
				$ovt['id_dep'];
			endforeach;
			$id_dep = $ovt['id_dep'];
			// die($id_dep);

			$email = $this->db->query("SELECT email FROM user WHERE id_jabatan in('3','46','6') AND id_dep = '$id_dep' ")->result_array();
			// print_r($email);
			// $mail =array();
			foreach ($email as $to) {
				$mail[] = implode(", ",$to);
			}
			$email = implode(", ", $mail);
			$to = $email;	
			// die($to);

			foreach ($overtime as $nm) :	
			$this->mail_reject_hrd($to,
									$nm['id_overtime'],
									$nm['name'],
									$nm['id_userr'],
									$nm['jabatan'],
									$nm['lokasi'],
									$nm['jenis_departement'],
									$nm['tanggal_overtime'],
									$nm['status'],
									$nm['email'],
									$nm['reason'],
									$nm['start_date'],
									$nm['to_date'],
									$nm['reason_activity'],
									$nm['approve_start'],
									$nm['approve_to'],
									$nm['type_day'],
									$nm['type_overtime']
									);
				endforeach;

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Input Evaluation Success !</div>');
			redirect('overtime');

} 
public function mail_reject_hrd($to,
								 $id_overtime, 
								$name, 
								$id_userr, 
								$jabatan, 
								$lokasi, 
								$jenis_department, 
								$tanggal_overtime, 
								$status, 
								$email, 
								$reason,
								$start_date,
								$to_date,
								$reason_activity,
								$approve_start,
								$approve_to,
								$type_day,
								$type_overtime
								){

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
							
	$user = $this->db->get_where('m_user',['id_user' => $id_user])->row_array();

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
	$mail = new PHPMailer(true);
	$mail->isSMTP();                                     
	$mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;                              
	$mail->Username = 'teamesystem@gmail.com';                 
	$mail->Password = 'itbfogutktnrfwfu';                           
	$mail->SMTPSecure = 'ssl';                            
	$mail->Port = 465;                                    
	$mail->isHTML(true); 
	
	$mailContent = 
		"<center>*******************************************************************************************************</br>
		<center><b>.:: Form E-Overtime  ::.</b></center>
		*******************************************************************************************************
		<table>

		  <tr>
			<td>Nama</td>
			<td>:</td>
			<td>".$name."</td>
		  </tr>

		  <tr>
			<td>No. Badge</td>
			<td>:</td>
			<td>".$id_userr."</td>
		  </tr>

		  <tr>
			<td>Jabatan</td>
			<td>:</td>
			<td>".$jabatan."</td>
		  </tr>

		  <tr>
			<td>Department</td>
			<td>:</td>
			<td>".$jenis_department."</td>
		  </tr>

		  <tr>
			<td>Lokasi</td>
			<td>:</td>
			<td>".$lokasi."</td>
		  </tr>

		  <tr>
			<td>Tanggal Overtime</td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($tanggal_overtime))."</td> 
		  </tr>
		 
		  <tr>
			<td>Reason</td>
			<td>:</td>
			<td>".nl2br($reason)."</td>
		  </tr>

		  <tr>
			<td>Permohonan Lembur </td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($start_date))."</td>
		  </tr>

		  <tr>
			<td>Sampai Dengan</td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($to_date))."</td>
		  </tr>

		  <tr>
			<td>Aktifitas Lembur</td>
			<td>:</td>
			<td>".nl2br($reason_activity)."</td>
		  </tr>

		  <tr>
			<td>Approve Lembur mulai </td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($approve_start))."</td>
		  </tr>

		  <tr>
			<td>Approve Lembur sampai</td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($approve_to))."</td>
		  </tr>

		  <tr>
			<td>Tipe Hari</td>
			<td>:</td>
			<td>".$type_day."</td>
		  </tr>

		  <tr>
			<td>Tipe Lembur</td>
			<td>:</td>
			<td>".$type_overtime."</td>
		  </tr>

		  <tr>
		  <td>Status</td>
		  <td>:</td>
		  <td>".$status."</td>
		</tr>

		</table>
		*******************************************************************************************************
		<p>Terima kasih telah membuat request Overtime pada website.</p>
		*******************************************************************************************************</center>";	
	
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	//end custom code

		$mail->setFrom('teamesystem@gmail.com','E-System E-Overtime');
		$mail->addAddress('dekfiral@gmail.com');
		$mail->addReplyTo('dekfiral@gmail.com');
		// $mail->addAddress($email);
		// $mail->addReplyTo($email);
		$mail->Subject = ('Overtime Reject HRD| E-Overtime');
		$mail->Body    = ($mailContent);
	
		if(!$mail->Send()) {
		// echo "Mailer Error: " . $mail->ErrorInfo;
		// echo $mail->print_debugger();
	 } else {
		// echo "Message has been sent";
		// echo $mail->print_debugger();
	 }
}
public function hod_approve($id_overtime=null)
    {
		$session = $this->session->get_userdata();
		$id_dep = $session['id_dep'];
		$id_user = $session['id_user'];

        $data['title'] = 'Detail E-Overtime';
        $data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$data['eovertime'] = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->row_array();
		$data['userr'] = $this->db->get('user')->result_array();
		$data['departement'] = $this->db->get('departement')->result_array();
		$data['jabatan'] = $this->db->get('jabatan')->result_array();
		$current_date = date("Y-m-d");

		$query = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->result_array();
		foreach ($query as $ovt ) :
			$ovt['start_date'];
			$ovt['to_date'];
		endforeach;

		$actual_start = $ovt['start_date'];
		$actual_to = $ovt['to_date'];
	if ($ovt['start_date'] == $ovt['to_date'] ){

		$data['lembur'] = $this->db->query("SELECT 0 AS jam,
		0 AS menit;")->row_array();

 // $data['lembur'] = $this->db->query("SELECT 0 AS jam,
 // 0 AS menit 
 // FROM  overtime
 // WHERE id_overtime ='$id_overtime';")->row_array();
	} else {
		$data['lembur'] = $this->db->query("SELECT Substring(timediff('$actual_start', '$actual_to'),2,2) AS jam,
												   Substring(timediff('$actual_start', '$actual_to'),5,2) AS menit 
												   FROM  overtime
												   WHERE id_overtime ='$id_overtime';")->row_array();
	}

		$this->form_validation->set_rules('approve_start','Approve_Start');
		$this->form_validation->set_rules('approve_to','Approve_To');
		$this->form_validation->set_rules('status','Status','required');

		  if(isset($_POST['save'])){
			if($this->form_validation->run() ==true ) {

			$approve_start = date('Y-m-d H:i:s', strtotime($this->input->post('approve_start')));
			$approve_to = date('Y-m-d H:i:s', strtotime($this->input->post('approve_to')));
			$status = $this->input->post('status');
			
			$this->db->set('action_hod_by', $id_user);
			$this->db->set('action_hod_date', $current_date);
			$this->db->set('approve_start', $approve_start);
			$this->db->set('approve_to', $approve_to);
			$this->db->set('status', $status);
			$this->db->where('id_overtime', $id_overtime);
			$this->db->update('overtime');

			$overtime = $this->db->get_where('eovertime', ['id_overtime' => $id_overtime])->result_array();

			// print_r($overtime); die();

			$email = $this->db->query("SELECT email FROM user WHERE id_jabatan in('3','46') AND id_dep = '$id_dep' ")->result_array();
			foreach ($email as $to) {
				$mail[] = implode(", ",$to);
			}
			$email = implode(", ", $mail);
			$to = $email;

			foreach ($overtime as $nm) :	
			$this->sendhod_mail(
									$nm['id_overtime'],
									$nm['name'],
									$nm['id_userr'],
									$nm['jabatan'],
									$nm['lokasi'],
									$nm['jenis_departement'],
									$nm['tanggal_overtime'],
									$nm['status'],
									$nm['email'],
									$nm['reason'],
									$nm['start_date'],
									$nm['to_date'],
									$nm['reason_activity'],
									$nm['approve_start'],
									$nm['approve_to'],
									$to
									);
				endforeach;
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Approved Success !</div>');
			redirect('overtime');
		} } else {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('overtime/hod_approve', $data);
			$this->load->view('templates/footer'); 
		}
}
public function sendhod_mail( $id_overtime, 
								$name, 
								$id_userr, 
								$jabatan, 
								$lokasi, 
								$jenis_department, 
								$tanggal_overtime, 
								$status, 
								$email, 
								$reason,
								$start_date,
								$to_date,
								$reason_activity,
								$approve_start,
								$approve_to,
								$to){

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
							
	$user = $this->db->get_where('m_user',['id_user' => $id_user])->row_array();

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
	$mail = new PHPMailer(true);
	$mail->isSMTP();                                     
	$mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;                              
	$mail->Username = 'teamesystem@gmail.com';                 
	$mail->Password = 'itbfogutktnrfwfu';                           
	$mail->SMTPSecure = 'ssl';                            
	$mail->Port = 465;                                    
	$mail->isHTML(true); 
	
	$mailContent = 
		"<center>*******************************************************************************************************</br>
		<center><b>.:: Form E-Overtime  ::.</b></center>
		*******************************************************************************************************
		<table>

		  <tr>
			<td>Nama</td>
			<td>:</td>
			<td>".$name."</td>
		  </tr>

		  <tr>
			<td>No. Badge</td>
			<td>:</td>
			<td>".$id_userr."</td>
		  </tr>

		  <tr>
			<td>Jabatan</td>
			<td>:</td>
			<td>".$jabatan."</td>
		  </tr>

		  <tr>
			<td>Department</td>
			<td>:</td>
			<td>".$jenis_department."</td>
		  </tr>

		  <tr>
			<td>Lokasi</td>
			<td>:</td>
			<td>".$lokasi."</td>
		  </tr>

		  <tr>
			<td>Tanggal Overtime</td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($tanggal_overtime))."</td> 
		  </tr>
		 
		 
		  <tr>
			<td>Reason</td>
			<td>:</td>
			<td>".nl2br($reason)."</td>
		  </tr>

		  <tr>
			<td>Permohonan Lembur </td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($start_date))."</td>
		  </tr>

		  <tr>
			<td>Sampai Dengan</td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($to_date))."</td>
		  </tr>

		  <tr>
			<td>Aktifitas Lembur</td>
			<td>:</td>
			<td>".nl2br($reason_activity)."</td>
		  </tr>

		  <tr>
			<td>Approve Lembur mulai </td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($approve_start))."</td>
		  </tr>

		  <tr>
			<td>Approve Lembur sampai</td>
			<td>:</td>
			<td>".date('d M Y H:i:s',strtotime($approve_to))."</td>
		  </tr>

		  <tr>
		  <td>Status</td>
		  <td>:</td>
		  <td>".$status."</td>
		</tr>


		</table>
		*******************************************************************************************************
		<p>Terima kasih telah membuat request Overtime pada website.</p>
		*******************************************************************************************************</center>";	
	
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	//end custom code

		$mail->setFrom('teamesystem@gmail.com','E-System E-Overtime');
		if ($status == 'HOD Approved') {
		$mail->addAddress('dekfiral@gmail.com');
		$mail->addReplyTo('dekfiral@gmail.com');
		// $mail->addAddress('');
		// $mail->addReplyTo('');
		// $mail->addCC($email);
		
		$mail->Subject = ('HOD Approved| E-Overtime');
		$mail->Body    = ($mailContent);

		} elseif ($status == 'HOD Rejected') {
		$mail->addAddress('dekfiral@gmail.com');
		$mail->addReplyTo('dekfiral@gmail.com');
		// $mail->addAddress($email);
		// $mail->addReplyTo($email);
		$mail->Subject = ('HOD Rejected| E-Overtime');
		$mail->Body    = ($mailContent);
		} 
		if(!$mail->Send()) {
		// echo "Mailer Error: " . $mail->ErrorInfo;
		// echo $mail->print_debugger();
	 } else {
		// echo "Message has been sent";
		// echo $mail->print_debugger();
	 }
}
}