<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class overtime_model extends CI_Model
{

	public function getCheckReport()
	{

		$query = " SELECT * FROM eovertime ";
		// $query = " SELECT * FROM eovertime WHERE status not in('Not Complete')";

		return $this->db->query($query)->result_array();
	}

	public function LaporanPerdepartment($id_dep)
	{

		$query = ("SELECT *
				   FROM eovertime 
				   where id_dep = '$id_dep' 
				   AND status in('rejected' ,'Evaluation','Evaluation Approved')
				   
				   OR status in('Request') 
				   AND id_jabatan in('6','46','3')

				   OR status in('Complete','Not Complete','Planning Overtime Approved','Planning Overtime Rejected','Evaluation Rejected','HOD Approved', 'HOD Rejected','BOD Approved', 'BOD Rejected')
				   AND id_jabatan in ('46','3')
				   ") ;

		return $this->db->query($query)->result_array();
	}

	public function LaporanSPV($id_dep)
	{
		$query = ("SELECT * 
				   FROM eovertime 
				   where id_dep = '$id_dep' 
				   AND status in('Request','rejected','Evaluation') 
				   AND id_jabatan not in('46', '3', '47', '30') 
				   
				   OR status in('Complete','Not Complete','Planning Overtime Approved','Planning Overtime Rejected','Evaluation Rejected','Evaluation Approved','HOD Approved', 'HOD Rejected') 
				   AND id_jabatan in('6') ") ;
		return $this->db->query($query)->result_array();
	}

	public function LaporanGManager()
	{

		$query = ("SELECT * FROM eovertime where status in('Not Complete','Request','rejected','Evaluation Rejected' ,'Evaluation','HOD Approved', 'HOD Rejected') AND id_jabatan in('46','3')") ;

		return $this->db->query($query)->result_array();
	}

	public function getCheckReportHOD()
	{

		$query = ("SELECT * FROM eovertime where status in('Complete','HOD Approved','BOD Approved')") ;

		return $this->db->query($query)->result_array();
	}
}