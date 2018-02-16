<?
class Trx extends Controller {

	public function Index_action() {

		if ($_POST) {
			$dados = $_POST;
			$gendamento = new AgendamentoHelper();
			$gendamento->enviar($dados);
		}

		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('trx');

		$this -> smarty -> assign("banners", $banners_lista);

		$this -> smarty -> assign("title", NAME." - TRX® em Maringá");
		$this -> smarty -> assign("description", "TRX® - Total-body Resistance Exercise (treino em suspensão) trabalha força baseado no core e na resistência - venha conhecer");
		$this -> smarty -> assign("keywords", "TRX, Core, crossfit, trx força, trx para mulheres, trx maringa, Trx suspension, core, resistência, treino funcional, HITT");

		if (DEVICE == "mobile") {
			$this -> smarty -> display("mobile/trx.html");
		} else {
			$this -> smarty -> display("trx.html");
		}
	}

}
