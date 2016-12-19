<?
class Powerplate extends Controller {

	public function Index_action() {

		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('powerplate');

		$this -> smarty -> assign("banners", $banners_lista);
		$this -> smarty -> assign("title", "Power Plate");
		
		$this -> smarty -> display("powerplate.html");
	}

}
