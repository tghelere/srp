<?
class Terapias extends Controller {

	public function Index_action() {
		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('terapias');

		$this -> smarty -> assign("banners", $banners_lista);

		$this -> smarty -> assign("title", NAME." - Centro de Bem Estar");
		$this -> smarty -> assign("description", "RPG, massoterapia, acupuntura, drenagem linfática, lipoescultura nas mãos de especialistas para o seu bem estar");
		$this -> smarty -> assign("keywords", "RPG, massoterapia, acupuntura, drenagem linfática, lipo escultura, drenagem linfática em maringá, rpg em maringá, lipo escultura em maringá, reeducação postural");

		
		if (DEVICE == "mobile") {
			$this -> smarty -> display("mobile/terapias.html");
		} else {
			$this -> smarty -> display("terapias.html");
		}
	}

}
