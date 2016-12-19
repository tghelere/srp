<?
class Index extends Controller {

	public function Index_action() {

		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('home');

		$this -> smarty -> assign("banners", $banners_lista);
		$this -> smarty -> assign("title", "Home");

		$this -> smarty -> display("home.html");
	}

}
