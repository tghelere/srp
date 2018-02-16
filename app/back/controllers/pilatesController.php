<?
class Pilates extends Controller {

	public function Index_action() {

		if ($_POST) {
			$dados = $_POST;
			$gendamento = new AgendamentoHelper();
			$gendamento->enviar($dados);
		}

		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('pilates');

		$this -> smarty -> assign("banners", $banners_lista);

		$this -> smarty -> assign("title", NAME." - Pilates em Maringá");
		$this -> smarty -> assign("description", "Desde 2002, Pilates é nossa especialidade, em todos os níveis e para todos os condicionamentos físicos - faça uma aula experimental");
		$this -> smarty -> assign("keywords", "Pilates, pilates terapêutico, correção postural, osteopatia, osteopenia, alivio de dores, pilates para terceira idade, pilates para adolescentes, pilates na gravidez, pilates para atletas, pilates para sedentários, reeducação postural");
		

		if (DEVICE == "mobile") {
			$this -> smarty -> display("mobile/pilates.html");
		} else {
			$this -> smarty -> display("pilates.html");
		}
	}

}
