<?
class Quemsomos extends Controller {

	public function Index_action() {
		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('quemsomos');

		$this -> smarty -> assign("banners", $banners_lista);

		$this -> smarty -> assign("title", "Quem Somos");
		$this -> smarty -> display("blank.html");
	}

}
