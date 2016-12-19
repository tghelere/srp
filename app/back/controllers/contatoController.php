<?

class Contato extends Controller {

    public function Index_action() {

        //$this->session->deleteSession("contato");
        if ($this->session->checkSession("contato")) {
            $this->smarty->assign("nome", $this->session->selectSessionValue("contato", "nome"));
            $this->smarty->assign("email", $this->session->selectSessionValue("contato", "email"));
            $this->smarty->assign("assunto", $this->session->selectSessionValue("contato", "assunto"));
            $this->smarty->assign("msg", $this->session->selectSessionValue("contato", "msg"));
        }

        $banners = new BannersModel();
        $banners_lista = $banners -> listaBanners('contato');
        $this -> smarty -> assign("banners", $banners_lista);

        $this->session->deleteSession("contato");
        $this->smarty->display("contato.html");
    }

    public function enviar() {
        if ($_POST) {
            try {
                //cria sessão
                $this->session->createSession("contato", $_POST);

                //salva no banco
                $contato = new ContatosModel();
                $dados = array(
                    "nome" => $_POST["nome"],
                    "email" => $_POST["email"],
                    "assunto" => $_POST["assunto"],
                    "msg" => $_POST["msg"],
                    "data" => date("Y/m/d Hu:i:s")
                );
                $insereContato = $contato->salva($dados);

                //envia email
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }

            $this->redir->goToController("contato");
        }  else {
            $this->redir->goToController("contato");
        }
    }

}
