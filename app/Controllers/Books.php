<?php
namespace App\Controllers;

use App\Models\Books_Model;

/**
 * Books Controller
**/
class Books extends BaseController
{
	public function index()
	{
		$session = \Config\Services::session();
		$data['session'] = $session;

		$model = new Books_Model();
		$data['booksArray'] = $model->get_books();
		//$data['booksArray'] = [];
		return view('books/list',$data);
	}

	public function create()
	{
		$session = \Config\Services::session();
		helper('form');
		$data = [];

		if($this->request->getMethod() == 'post')
		{
			//echo 'sdf'; exit;
			$input = $this->validate([
				'name' => 'required|min_length[5]',
				'author' => 'required|min_length[5]'
			]);

			if($input == true)
			{
				//Form Validated Successfully
				$model = new Books_Model();
				$model->save([
					'name' => $this->request->getPost('name'),
					'author' => $this->request->getPost('author'),
					'isbn_no' => $this->request->getPost('isbn_no')
				]);

				$session->setFlashdata('success','Successfully Added!');

				return redirect()->to(base_url('/books'));
				//return redirect()->to('/books');
			}
			else
			{
				//Form Not Validated Successfully
				//return view('books/create.php',['validation' => $this->validator]);
				$data['validation'] = $this->validator;
			}
		}
		return view('books/create',$data);
	}

	public function edit($id)
	{
		$session = \Config\Services::session();
		
		helper('form');
		$data = [];

		$model = new Books_Model();
		$data['book'] = $model->get_row($id);
		//print_r($data['book']); exit;

		if(empty($data['book']))
		{
			$session->setFlashdata('error','Record Not Found!');
			return redirect()->to(base_url('/books'));
		}

		if($this->request->getMethod() == 'post')
		{
			//echo 'sdf'; exit;
			$input = $this->validate([
				'name' => 'required|min_length[5]',
				'author' => 'required|min_length[5]'
			]);

			if($input == true)
			{
				//Form Validated Successfully
				$model = new Books_Model();
				$model->update($id, [
					'name' => $this->request->getPost('name'),
					'author' => $this->request->getPost('author'),
					'isbn_no' => $this->request->getPost('isbn_no')
				]);

				$session->setFlashdata('success','Successfully Updated!');

				return redirect()->to(base_url('/books'));
				//return redirect()->to('/books');
			}
			else
			{
				//Form Not Validated Successfully
				//return view('books/create.php',['validation' => $this->validator]);
				$data['validation'] = $this->validator;
			}
		}
		return view('books/edit',$data);
	}

	public function delete($id)
	{
		//echo $id;
		$session = \Config\Services::session();

		$model = new Books_Model();
		$data['book'] = $model->get_row($id);
		//print_r($data['book']); exit;

		if(empty($data['book']))
		{
			$session->setFlashdata('error','Record Not Found!');
			return redirect()->to(base_url('/books'));
		}
		
		$model->delete($id);

		$session->setFlashdata('success','Successfully Deleted!');
		return redirect()->to(base_url('/books'));
	}
}
?>