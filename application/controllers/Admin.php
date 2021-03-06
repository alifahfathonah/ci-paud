<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Agenda_model');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function agenda()
    {
        $data['judul'] = 'Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['agenda'] = $this->Agenda_model->getAllAgenda();

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar', $data);
        $this->load->view('templates/backend/topbar', $data);
        $this->load->view('admin/agenda', $data);
        $this->load->view('templates/backend/footer');
    }

    public function tambahAgenda()
    {
        $data['judul'] = 'Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Kolom %s harus diisi.']);
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', ['required' => 'Kolom %s harus diisi.']);
        $this->form_validation->set_rules('editor_content', 'Deskripsi', 'required', ['required' => 'Kolom %s harus diisi.']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/backend/header', $data);
            $this->load->view('templates/backend/sidebar', $data);
            $this->load->view('templates/backend/topbar', $data);
            $this->load->view('admin/tambah_agenda', $data);
            $this->load->view('templates/backend/footer');
        } else {
            $this->Agenda_model->addAgenda();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Agenda berhasil di masukkan
          </div>');
            redirect(base_url('admin/agenda'));
        }
    }

    public function hapusAgenda($id)
    {
        $this->Agenda_model->deleteAgenda($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Agenda berhasil di hapus
          </div>');
        redirect(base_url('admin/agenda'));
    }

    public function ubahAgenda($id)
    {
        $data['judul'] = 'Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['agenda'] = $this->Agenda_model->getAgendaById($id);


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Kolom %s harus diisi.']);
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', ['required' => 'Kolom %s harus diisi.']);
        $this->form_validation->set_rules('editor_content', 'Deskripsi', 'required', ['required' => 'Kolom %s harus diisi.']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/backend/header', $data);
            $this->load->view('templates/backend/sidebar', $data);
            $this->load->view('templates/backend/topbar', $data);
            $this->load->view('admin/ubah_agenda');
            $this->load->view('templates/backend/footer');
        } else {
            $this->Agenda_model->updateAgenda($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Agenda berhasil di ubah
          </div>');
            redirect(base_url('admin/agenda'));
        }
    }
}
