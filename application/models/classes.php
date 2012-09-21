<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classes extends CI_Model {

	/**
	 * Get All
	 *
	 * Gets all the classes
	 *
	 * @access public
	 * @return array
	 */
	public function get_all()
	{
		$this->db->select('id, name');

		$query = $this->db->get('classes');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}

		else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Create
	 *
	 * Creates a new class
	 *
	 * @access public
	 * @return void
	 */
	public function create($name, $students)
	{
		$this->db->insert('classes', array(
			'name'     => $name,
			'students' => serialize($students)
		));
	}

	// --------------------------------------------------------------------

	/**
	 * Get Students
	 *
	 * Gets all the students in a certain in a class
	 *
	 * @access public
	 * @param  int
	 * @return array
	 */
	public function get_students($class_id)
	{
		$this->db->select('students');
		$this->db->where('id', $class_id);

		$query = $this->db->get('classes', 1);

		if($query->num_rows() > 0)
		{
			$students = $query->row()->students;
			$students = unserialize($students);

			return $students;
		}

		else
		{
			return FALSE;
		}
	}
}