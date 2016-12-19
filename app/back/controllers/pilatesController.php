<?
class Pilates extends Controller {

	public function Index_action() {
		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('pilates');

		$this -> smarty -> assign("banners", $banners_lista);

		$this -> smarty -> assign("title", "Pilates");
		$this -> smarty -> display("blank.html");
	}

}
