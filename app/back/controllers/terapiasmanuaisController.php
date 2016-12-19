<?
class Terapiasmanuais extends Controller {

	public function Index_action() {
		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('terapiasmanuais');

		$this -> smarty -> assign("banners", $banners_lista);


		$this -> smarty -> assign("title", "Terapias Manuais");
		$this -> smarty -> display("blank.html");
	}

}
