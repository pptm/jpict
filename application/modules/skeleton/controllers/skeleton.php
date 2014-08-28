<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Skeleton extends MY_Controller {

    function __construct(){

   	parent::__construct();
    }

    public function index()
    {
         
	$this->load->library('template');

	$this->load->helper(array('form', 'url'));
	$this->load->library('form_validation');
	$this->load->helper('array');

	
	$this->form_validation->set_rules('email', 'Email', 'required');
	$this->form_validation->set_rules('katalaluan', 'Katalaluan', 'required');

        $this->template->set_title('JPJKKP HQ');
        $this->template->add_js('modules/skeleton.js');
        $this->template->add_css('modules/skeleton.css');
		
        $this->load->helper('file');
	
        $skeleton_data = array();
        if ($skeleton_json = read_file(APPPATH . 'modules/skeleton/skeleton.json'))
        {
            //$skeleton_data = json_decode($skeleton_json, TRUE);
		$skeleton_data = "pengguna";
        }
        if (empty($skeleton_data))
        {
            show_error('Failed to load skeleton.json');
        }
		
		$this->load->model('login_model');
		
		if ($this->form_validation->run() == FALSE)
		{

		$logins = $this->login_model->semakkemasukan();
		
		
			if ($logins == 0){
		
				$this->template->load_view('index', array(
            			'pagelet_sidebar' => Modules::run('skeleton/_pagelet_sidebar', $skeleton_data),
            			'skeleton_data' => $skeleton_data
        			));
		
			}else{
				$menu = $this->input->get('fungsi',TRUE);

							
				$this->template->load_view('user', array(
            			'pagelet_sidebar' => Modules::run('skeleton/panel', $skeleton_data),
				'menu' => $menu,
				'skeleton_data' => $skeleton_data
        			));
				

			}

		}

		else
		{

			$this->load->model('login_model');

			$result = $this->login_model->validate();

			
			if(!$result){

				$this->template->load_view('index', array(
            			'pagelet_sidebar' => Modules::run('skeleton/_pagelet_sidebar', $skeleton_data),
            			'skeleton_data' => $skeleton_data
        			));


			}
			else {

				
				$menu = $this->input->get('fungsi',TRUE);

				
				$this->template->load_view('user', array(
            			'pagelet_sidebar' => Modules::run('skeleton/panel', $skeleton_data),
				'menu' => $menu,
				'skeleton_data' => $skeleton_data
        			));

				
		     	}
		}
	
		

		

        
    }

    public function _pagelet_sidebar($skeleton_data)
    {
        $this->load->view('pagelet_sidebar', array(
            'skeleton_data' => $skeleton_data,
        ));
    }
	
    public function panel($datapanel)
    {
	$this->load->view('user_sidebar');

    }


    public function keluar(){

	$this->load->model('login_model');
	$this->login_model->keluar();
	redirect('', 'refresh');
	
	
    }
    public function get_cawangan()
    {
	$this->load->view('lari/get_cawangan');

    }
	public function get_projek()
    {
	$this->load->view('lari/get_projek');

    }


}

