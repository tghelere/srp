<?

class Erro extends Controller {

    public function Index_action() {
    	$this->smarty->assign("erro", "Ops, página não encontrada");
    	$this->smarty->assign("erroMsg", "Voltar para página inicial");
      $this->smarty->assign("title", NAME." – Erro");
      $this->smarty->assign("description", "Conheça o Studio Raquel Pagani em Maringá.");
      $this->smarty->assign("keywords", "Studio Raquel Pagani, erro 404, 404, error");      
      $this->smarty->assign("thisController", 'erro');

      
      if (DEVICE == "mobile") {
        $this -> smarty -> display("mobile/erro.html");
      } else {
        $this -> smarty -> display("erro.html");
      }
    }

}
