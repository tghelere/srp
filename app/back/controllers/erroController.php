<?

class Erro extends Controller {

    public function Index_action() {
    	$this->smarty->assign("erro", "Ops, página não encontrada!");
    	$this->smarty->assign("erroMsg", "Clique aqui para voltar a página inicial do site");
        $this->smarty->display("erro.html");
    }

}
