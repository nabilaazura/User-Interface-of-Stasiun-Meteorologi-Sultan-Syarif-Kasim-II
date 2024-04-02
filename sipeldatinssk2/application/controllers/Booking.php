<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("fungsi_helper");
		$this->load->model("service_model");
	}

	public function index()
	{
		// load view vw_contact.php
		$data['services'] = $this->service_model->all();
		$this->load->view("tampil_booking", $data);
	}

	public function form_booking($id)
	{
		$data['services'] = $this->service_model->find($id);
		$this->load->view("form_booking", $data);
	}

	public function add()
	{
		//$service_id = $this->input->post('service_id');
		//form validation sebelum mengeksekusi QUERY INSERT
        $this->form_validation->set_rules('nama', 'nama', 'required');
        //$this->form_validation->set_rules('userfile', 'service Image', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('booking');
        } else {
            $this->session->set_flashdata('success', 'Berhasil Ditambah');
            //load uploading file library
            $config['upload_path'] = FCPATH . 'upload/';
            $config['allowed_types'] = 'pdf';
            $config['overwrite']   = true;
            $config['max_size']    = 1024; //KB
            //$config['max_width']  = '2000'; //pixels
            //$config['max_height']  = '2000'; //pixels

            $this->load->library('upload', $config);

				
				//file berhasil diupload -> lanjutkan ke query INSERT
                // eksekusi query INSERT

				if ( ! $this->upload->do_upload('surat'))
                {
                    $surat = 0;
                }
                else
                {
					$surats = $this->upload->data();
					$surat = $surats['file_name'];
                }
				if ( ! $this->upload->do_upload('proposal'))
                {
                    $proposal = 0;
                }
                else
                {
					$proposals = $this->upload->data();
					$proposal = $proposals['file_name'];
                }
				if ( ! $this->upload->do_upload('ktp'))
                {
                    $ktp = 0;
                }
                else
                {
					$ktps = $this->upload->data();
					$ktp = $ktps['file_name'];
                }
				
				$service_id = $this->input->post('service_id');
				$name = $this->input->post('name');

                $nama = $this->input->post('nama');
				$instansi = $this->input->post('instansi');
				$jabatan = $this->input->post('jabatan');
				$alamat = $this->input->post('alamat');
				$whatsapp = $this->input->post('whatsapp');
				$email = $this->input->post('email');
				$jasa = $this->input->post('jasa');
				$tanggal1 = $this->input->post('tanggal1');
				$tanggal2 = $this->input->post('tanggal2');
				$lokasi = $this->input->post('lokasi');


				$data = array(


				//	'service_id' => $service_id,
				'service_id' => $service_id,
				'name' => $name,

				'nama' => $nama,
				'instansi' => $instansi,
				'jabatan' => $jabatan,
				'alamat' => $alamat,
				'whatsapp' => $whatsapp,
				'email' => $email,
				'jasa' => $jasa,
				'tanggal1' => $tanggal1,
				'tanggal2' => $tanggal2,
				'lokasi' => $lokasi,
				'surat' => $surat,
				'proposal' => $proposal,
				'ktp' => $ktp
				);

				$this->service_model->input_data($data,'form_booking');
				$this->load->view("selesai_booking");
            
        }
	}
	public function delete($id)
    {
        $this->session->set_flashdata('success', 'Berhasil Dihapus');
        $this->databooking_model->delete($id);
        redirect('booking');
    }
}