<?php
class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $data['base_url'] = base_url();
        $id = $this->session->userdata('id');

        switch(end($this->uri->segment_array()))
        {
            case "registration":
                $data['title'] = "Registration"; break;

            case "autorisation":
                $data['title'] = "Autorisation"; break;

            case "":
                $data['title'] = "Your 5 last visits"; break;

            default: 
                $data['title'] = "Welcome"; break;
        }

        if ($id)
        {
            $data['autorisation_title'] = 'Exit';
        }
        else
        {
            $data['autorisation_title'] = 'Autorisation';
        }

        $this->load->view('header', $data);
    }

    private function redirect_to_home()
    {
        redirect('users/autorisation');
        exit();
    }

    private function load_registrtion()
    {
        $this->load->view('registration', $data);
        $this->load->view('footer');
        exit();
    }

    function registration()
    {
        $data = array();
        $this->load->model('Users_model', 'user');

        if ($this->input->post('login'))
        {
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $password_confirm = $this->input->post('password_confirm');

            if (empty($login))
            {
                $data['errors'][] = 'Please enter username';
            }

            if (empty($password))
            {
                $data['errors'][] = 'Please enter password';
            }

            if (empty($email))
            {
                $data['errors'][] = 'Please enter email';
            }

            if ($password != $password_confirm)
            {
                $data['errors'][] = 'Your passwords are not same';
            } 
            
            if(empty($data['errors']))
            {
                $password = hash('sha256', $password);

                if ($this->user->add($login, $password, $email))
                {
                    $this->redirect_to_home();
                }

                $data['errors'][] = 'This email is emploied';   
            }
        }
            $this->load->view('registration', $data);
            $this->load->view('footer');
    }

    function autorisation()
    {
        $data = array();
        $id = $this->session->userdata('id');

        if ($id)
        {
            $this->session->sess_destroy();
            $this->redirect_to_home();
        }

        $login = $this->input->post('login');
        $password = $this->input->post('password');

        if ($login)
        {
            if (empty($login))
            {
                $data['errors'][] = 'Please enter username';
            }

            if (empty($password))
            {
                $data['errors'][] = 'Please enter password';
            }

            if (empty($data['errors']))
            {
                $password = hash('sha256', $password);
                $this->load->model('Users_model', 'user');
                $check = $this->user->check($login, $password);
                
                if ($check)
                {
                    $this->session->set_userdata('id', $check);
                    $this->user->add_visit($check);
                    redirect('users/info');
                    exit();
                }

                $data['errors'][] = 'Username or password is failed';
            }
        }
        $this->load->view('autorisation', $data);
        $this->load->view('footer');
    }

    function info()
    {
        $id = $this->session->userdata('id');
        $this->load->model('Users_model', 'user');

        if (!$id)
        {
            $this->redirect_to_home();
        }
        
        if (!$this->user->get_by_id($id))
        {
            $this->redirect_to_home();
        }
        $visit = $this->user->get_visits($id);

        if (!$visit)
        {
            $this->redirect_to_home();
        }

        $data['visits'] = $visit;
        $this->load->view('info', $data);
        $this->load->view('footer');

    }
}