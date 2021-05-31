<?php

namespace Controllers;

class MealController {
	
	use SessionController;
	
	public function __construct()
	{
		$this -> redirectIfNotAdmin();
		//si le formulaire a été soumis
	}

	public function display()
	{
		//afficher les Catégories
		$model = new \Models\Category();
		$categories = $model -> getAllCategory();
            $template = 'views/back-end/category.phtml';
            include 'views/layout.phtml';
	}
		public function delete()
	{
		//supprimer une catégorie
	    $model = new \Models\Category();
	    $model -> deleteCategory($_GET['id']);
	}
	public function displayAdd()
	{
	    $model = new \Models\Category();
	    $categories = $model -> getAllCategory();
            $template = 'views/back-end/add/addCategory.phtml';
            include 'views/layout.phtml';
	}
	
	public function AddSubmit()
	{
		//préparer les données pour les mettre dans la base de données
		$nom = $_POST['name'];
		$id = $_POST['category'];

		//mettre les datas en bdd
		$model = new \Models\Category();
		$model -> AddCategory($nom);
            
		header('location:index.php?page=category');
			exit;
	}
		public function displayModify()
	{
	    $model = new \Models\Category();
	    $category = $model -> findCategoryById($_GET['id']);
	    $model = new \Models\Category();
	    $categories = $model -> getAllCategory();  
        $template = 'views/modifyCategory.phtml';
        include 'views/layout.phtml';
	}
	
	public function ModifySubmit()
	{
		//préparer les données pour les mettre dans la base de données
		$nom = $_POST['name'];
		$id_category = $_POST['category'];
		
		//mettre les datas en bdd
		$model = new \Models\Category();
		$modifyMeal = $model -> ModifyCategory($_GET['id'], $nom, $id_category);
            
		header('location:index.php?page=category');
			exit;
	}
	
	

}