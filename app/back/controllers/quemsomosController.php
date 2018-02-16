<?
class Quemsomos extends Controller {

	public function Index_action() {
		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('quemsomos');

		$this -> smarty -> assign("banners", $banners_lista);

		$this -> smarty -> assign("title", NAME." - Sobre nosso studio e equipe - desde 2002");
		$this -> smarty -> assign("description", "Desde 2002, especialistas em alta qualidade no serviço oferecido no atendimento e foco no tratamento da dor e atividade terapêutica.");
		$this -> smarty -> assign("keywords", "Especialista em Pilates, Pilates, Tratamento da dor, Power Plate, Centro de bem estar, equilibrio do corpo, saúde, fisioterapia, terceira idade, mulher, Dor cronica, clinica de pilates, academia de pilates em maringá, pilates em maringá");

		
		if (DEVICE == "mobile") {
			$this -> smarty -> display("mobile/quemsomos.html");
		} else {
			$this -> smarty -> display("quemsomos.html");
		}
	}

}
