<?php
class Product_Controller extends Base_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		// trang danh sach san pham
		$products = $this->model->product->find();
		$this->view->load('product/index', [
			'products' => $products
		]);
	}

	function show()
	{
		// trang chi tiet san pham

	}

	function add()
	{
		// trang them san pham
		// hien thi form them san pham
		$this->view->load('product/add');
	}

	function store()
	{
		// xu li them san pham

		$name = getParameter('name');
		$price = getParameter('price');

		$errors = [];

		if (!$name) {
			$errors['name'] = 'Vui long nhap name';
		}
		if (!$price) {
			$errors['price'] = 'Vui long nhap price';
		}

		if (count($errors) > 0) {
			$this->view->load('product/add', [
				'errors' => $errors
			]);
		} else {
			$product = $this->model->product->create([
				'name' => $name,
				'price' => $price
			]);

			if ($product) {
				redirect('product/index');
			} else {
				$this->view->load('product/add', [
					'error_message' => 'Khong them duoc'
				]);
			}
		}
	}

	function edit()
	{
		// trang sua san pham
		// hien thi form sua san pham
	}

	function update()
	{
		// xu li sua san pham

	}

	function destroy()
	{
		// xu li xoa san pham
		$id = getParameter('id');
		$this->model->product->destroy($id);
		redirect('product/index');
	}
}