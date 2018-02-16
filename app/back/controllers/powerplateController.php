<?
class Powerplate extends Controller {

	public function Index_action() {

		if ($_POST) {
			$dados = $_POST;
			$gendamento = new AgendamentoHelper();
			$gendamento->enviar($dados);
		}

		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('powerplate');

		$this -> smarty -> assign("banners", $banners_lista);

		$this -> smarty -> assign("title", NAME." - Power Plate® em Maringá");
		$this -> smarty -> assign("description", "Tecnologia vibratória desenvolvida pela NASA, melhora a massa óssea e a força muscular - Para todas as idades. Agende sua aula experimental");
		$this -> smarty -> assign("keywords", "Power Plate, força muscular, anti-celulite, melhora a circulação, alivio de dor, massa óssea, idosos, power plate para atletas, power plate para idosos, power plate para terceira idade");
		

		if (DEVICE == "mobile") {
			$this -> smarty -> display("mobile/powerplate.html");
		} else {
			$this -> smarty -> display("powerplate.html");
		}
	}

}
