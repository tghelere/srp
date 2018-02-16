<?
class Index extends Controller {

	public function Index_action() {

		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('home');

		$this -> smarty -> assign("banners", $banners_lista);

		$this -> smarty -> assign("title", NAME." - Centro de Bem Estar em Maringá desde 2002");
		$this -> smarty -> assign("description", "Atendimento terapêutico para dor crônica, correção postural e conscientização corporal. Para todas as idades - Conheça nosso Studio!");
		$this -> smarty -> assign("keywords", "Pilates, pilates em maringá, Pilates para idosos, Osteopatia, fisioterapia, dor crônica, correção postural, trx, Power Plate, power plate em maringá, Raquel Pagani, Studio Raquel Pagani, RPG em maringá, terapia, dor no quadril, dor crescimento, articulações, terceira idade");

		if (DEVICE == "mobile") {
			$this -> smarty -> display("mobile/home.html");
		} else {
			$this -> smarty -> display("home.html");
		}		
				
	}

}
