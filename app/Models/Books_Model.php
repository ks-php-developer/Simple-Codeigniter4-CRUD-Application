<?php
namespace App\Models;

use CodeIgniter\Model;

/**
 * Books Model
**/
class Books_Model extends Model
{
	protected $table = "books";
	protected $allowedFields = ['name','author','isbn_no'];

	public function get_books()
	{
		return $this->orderBy('id','DESC')->findAll();
	}

	public function get_row($id)
	{
		return $this->where('id',$id)->first();
	}
}
?>