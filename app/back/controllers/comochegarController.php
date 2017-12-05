<?
class Comochegar extends Controller {

	public function Index_action() {

		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('comochegar');

		$this -> smarty -> assign("banners", $banners_lista);

		$this -> smarty -> assign("title", NAME." – Como Chegar");
		$this -> smarty -> assign("description", "");
		$this -> smarty -> assign("keywords", "Como chegar, endereço, logradouro, mapa, onde estamos, studio Raquel pagani, Pilates");
		$this -> smarty -> display("comochegar.html");
	}

}
