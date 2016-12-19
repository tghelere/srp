<?
class Trx extends Controller {

	public function Index_action() {
		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('trx');

		$this -> smarty -> assign("banners", $banners_lista);
		$this -> smarty -> assign("title", "Trx");
		$this -> smarty -> display("blank.html");
	}

}
