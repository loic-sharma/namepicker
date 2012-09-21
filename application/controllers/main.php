<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Construct
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	// --------------------------------------------------------------------

	/**
	 * Index
	 *
	 * @access public
	 * @return void
	 */
	public function index()
	{
		// We don't need this to be updated continuously
		$this->output->cache(30);

		$this->load->database();
		$this->load->model('classes');

		// Get the classes
		$classes = $this->classes->get_all();

		$this->load->view('index', compact('classes'));
	}

	// --------------------------------------------------------------------

	/**
	 * Add
	 *
	 * @access public
	 * @return void
	 */
	public function add()
	{
		$error = '';

		$this->load->library('form_validation', NULL, 'form');

		$this->form->set_rules('name', 'Class Name', 'trim|required|xss_clean');
		$this->form->set_rules('students', 'Students', 'trim|required|xss_clean');

		if($this->form->run())
		{
			// Get the students as an array
			$students = $this->input->post('students');
			$students = explode(PHP_EOL, $students);

			// Shuffle the students to randomize them
			shuffle($students);

			// Now save the students to the database
			$this->load->database();
			$this->load->model('classes');

			$this->classes->create($this->input->post('name'), $students);

			// Clear the cache
			foreach (glob(APPPATH . 'cache/*') as $file)
			{
				@unlink($file);
			}

			// Redirect with a success message
			redirect();

			$this->session->set_flashdata('success', 'The class has been successfully added');
		}

		$this->load->view('add', compact('error'));
	}

	// --------------------------------------------------------------------

	/**
	 * Select
	 *
	 * @access public
	 * @return void
	 */
	public function select()
	{
		if( ! ($id = $this->uri->segment(2)) || ! is_numeric($id))
		{
			redirect();
		}

		// We don't need this to be updated continuously
		$this->output->cache(30);

		// Get the students
		$this->load->database();
		$this->load->model('classes');

		if($students = $this->classes->get_students($id))
		{
			$this->load->view('select', compact('students'));
		}

		else
		{
			redirect();
		}
	}
}