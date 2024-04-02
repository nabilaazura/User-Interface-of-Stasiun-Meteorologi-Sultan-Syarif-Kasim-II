<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class services extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_login();

        //load model -> model_services
        $this->load->model('service_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $data['services'] = $this->service_model->all();
        $this->load->view('admin/service/list', $data);
    }

    public function add()
    {
        //form validation sebelum mengeksekusi QUERY INSERT
        $this->form_validation->set_rules('name', 'service Name', 'required');
        $this->form_validation->set_rules('description', 'service Description', 'required');
        $this->form_validation->set_rules('price', 'service Price', 'required');
        //$this->form_validation->set_rules('userfile', 'service Image', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/service/new_form');
        } else {
            $this->session->set_flashdata('success', 'Berhasil Ditambah');
            //load uploading file library
            $config['upload_path'] = FCPATH . 'upload/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']    = '3000'; //KB
            $config['overwrite']            = true;
            //$config['max_width']  = '2000'; //pixels
            //$config['max_height']  = '2000'; //pixels

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                //file gagal diupload -> kembali ke form tambah
                $this->load->view('admin/service/new_form');
            } else {
                //file berhasil diupload -> lanjutkan ke query INSERT
                // eksekusi query INSERT
                $gambar = $this->upload->data();
                $data_service =    array(
                    'name'            => set_value('name'),
                    'description'    => set_value('description'),
                    'price'            => set_value('price'),
                    'image'            => $gambar['file_name']
                );

                $this->service_model->create($data_service);
                redirect('admin/services');
            }
        }
    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'service Name', 'required');
            $this->form_validation->set_rules('description', 'service Description', 'required');
            $this->form_validation->set_rules('price', 'service Price', 'required');

            if ($this->form_validation->run() == FALSE) {
                $pesan = validation_errors();
                $this->session->set_flashdata("pesan", $pesan);
                redirect('admin/services/edit/' . $id);
            } else {
                $this->session->set_flashdata('success', 'Berhasil Disimpan');
                if ($_FILES['image']['name'] != '') {
                    //form submit dengan gambar diisi
                    //load uploading file library
                    $config['upload_path'] = './upload/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size']    = '3000'; //KB
                    $config['max_width']  = '2000'; //pixels
                    $config['max_height']  = '2000'; //pixels

                    $this->load->library('upload', $config);


                    if (!$this->upload->do_upload('image')) {
                        $data['services'] = $this->service_model->find($id);
                        $this->load->view('admin/service/edit_form', $data);
                    } else {
                        $gambar = $this->upload->data();
                        $data_service =    array(
                            'name'            => $this->input->post('name'),
                            'description'    => $this->input->post('description'),
                            'price'            => $this->input->post('price'),
                            'image'            => $gambar['file_name']
                        );
                        $this->service_model->update($id, $data_service);
                        redirect('admin/services');
                    }
                } else {
                    //form submit dengan gambar dikosongkan
                    $data_service =    array(
                        'name'            => $this->input->post('name'),
                        'description'    => $this->input->post('description'),
                        'price'            => $this->input->post('price'),
                    );
                    $this->service_model->update($id, $data_service);
                    redirect('admin/services');
                }
            }
        }
        $data['services'] = $this->service_model->find($id);
        $this->load->view('admin/service/edit_form', $data);
    }

    public function delete($id)
    {
        $this->session->set_flashdata('success', 'Berhasil Dihapus');
        $this->service_model->delete($id);
        redirect('admin/services');
    }
}
