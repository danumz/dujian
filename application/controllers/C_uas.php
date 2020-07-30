<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_uas extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('M_uas');
		// $this->load->library('form_validation');
	}

    // PDF inivoice Pembayaran
    public function invoice_rt($npm = ''){

    $data["rt"] = $this->M_uas->Get($npm); 

    $this->load->library('pdf');

    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "invoice.pdf";
    $this->pdf->load_view('admin/invoice_rt', $data);
    }
	public function index()
	{
		$data["susulan_uas"] = $this->M_uas->getwhere('verivikasi',0,'susulan_uas')->result();
		$this->template->load('admin/va_static','admin/va_uas',$data);
	}
	public function update()
    {
        $npm = $this->input->post('npm');
        $where = array('npm' => $npm); 
        $data = $this->input->post();
        unset($data['npm']);

        // print_r($where);

        $this->M_uas->update($where,$data,'susulan_uas');
        redirect('C_uas');
    }
    public function add()
    {
        $dujian = $this->M_uas->save();
        redirect('C_package');
    }
    public function puas()
	{
		$data["susulan_uas"] = $this->M_uas->getwhere('verivikasi',1,'susulan_uas')->result();
		$this->template->load('admin/va_static','admin/va_puas',$data);
	}
    // PDF inivoice Pembayaran
    public function invoice_uaspdf($npm = ''){

    $data["susulan_uas"] = $this->M_uas->Get($npm); 

    $this->load->library('pdf');

    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "invoice.pdf";
    $this->pdf->load_view('admin/invoice_uaspdf', $data);
    }
    // PDF inivoice Pembayaran
    public function kwitansi_uaspdf($npm = ''){

    $data["susulan_uas"] = $this->M_uas->Get($npm); 

    $this->load->library('pdf');

    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "kwitansi.pdf";
    $this->pdf->load_view('admin/kwitansi_uaspdf', $data);
    }
    // PDF form_uts
    public function form_uas_pdf($npm =''){

    $data["susulan_uas"] = $this->M_uas->Get($npm); 

    $this->load->library('pdf');

    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "Fuas.pdf";
    $this->pdf->load_view('admin/form_UaS_pdf', $data);
    }
}