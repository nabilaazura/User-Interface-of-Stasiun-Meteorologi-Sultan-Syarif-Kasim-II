<?php

class Data_booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_login();
        $this->load->model('databooking_model');
    }

    public function index()
    {
        $this->auth->cek_login();
        // load view admin/data_booking.php
        $form_booking = $this->databooking_model->all();
        $booking = [];
        foreach ($form_booking as $key => $value) {
            $value->wa = $this->pesanWA($value->whatsapp, $value);
            $booking[] = $value;
        }

        $data['form_booking'] = $booking;
        $this->load->view("admin/data_booking", $data);
    }

    public function ambil()
    {
        $this->auth->cek_login();
        $id['id'] = $this->uri->segment(4);
        $status['status_booking'] = $this->uri->segment(5);

        $this->db->update("form_booking", $status, $id);
        redirect('admin/data_booking');
    }

    private function pesanWA($whatsapp, $data)
    {
        $this->auth->cek_login();
        $detail = '';
        // whatsapp
        $nomorWhatsapp = $whatsapp;
        $enterLine = '%0A';
        $textWhatsapp = '';
        $textWhatsapp .= "*Data Permintaan Layanan*\n";
        $textWhatsapp .= "Halo, perkenalkan saya Admin SiPelDatIn Stasiun Meteorologi SSK II Pekanbaru, saya ingin mengonfirmasi pesanan dengan detail sebagai berikut:\n\n";
        $textWhatsapp .= "- Nama            : ". $data->nama . "\n";
        $textWhatsapp .= "- Jenis Layanan   : ". $data->name . "\n";
        $textWhatsapp .= "- Instansi        : ". $data->instansi . "\n";
        $textWhatsapp .= "- email           : ". $data->email . "\n";
        $textWhatsapp .= "- Biaya           : Belum Terkonfirmasi \n";
        $textWhatsapp .= "- Keperluan       : " . $data->jasa . "\n";
        $textWhatsapp .= "- Tanggal Layanan : " . $data->tanggal1 . "-". $data->tanggal2 ."\n\n";

        $textWhatsapp .= "Dimohon untuk menjawab dan mengonfirmasi WhatsApp ini, agar segera kami tindak lanjuti yaa\n";
        $textWhatsapp .= "*Regards*\n";
        $textWhatsapp .= "*Admin SiPelDatIn SSK II*";

        return  "https://api.whatsapp.com/send/?phone=$nomorWhatsapp&text=" . urlencode($textWhatsapp) . "&app_absent=0";

    }

}
