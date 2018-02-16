<?

class Contato extends Controller {

    public function Index_action() {

        //$this->session->deleteSession("contato");
        if ($this->session->checkSession("contato")) {
            $this->smarty->assign("nome", $this->session->selectSessionValue("contato", "nome"));
            $this->smarty->assign("email", $this->session->selectSessionValue("contato", "email"));
            $this->smarty->assign("fone", $this->session->selectSessionValue("contato", "fone"));
            $this->smarty->assign("msg", $this->session->selectSessionValue("contato", "msg"));
        }

        $banners = new BannersModel();
        $banners_lista = $banners -> listaBanners('contato');
        $this -> smarty -> assign("banners", $banners_lista);
        $this -> smarty -> assign("title", NAME." - Fale conosco");
        $this -> smarty -> assign("description", "Fale conosco, tire suas dúvidas. Pilates, Power Plate, RPG, TRX em Maringá");
        $this -> smarty -> assign("keywords", "Pilates em Maringá, aula experimental de pilates, power plate em maringá, como chegar, studio raquel pagani, studio de pilates, fisioterapia em maringá");
        $this->session->deleteSession("contato");

        
        if (DEVICE == "mobile") {
			$this -> smarty -> display("mobile/contato.html");
		} else {
			$this -> smarty -> display("contato.html");
		}
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
                    "fone" => $_POST["fone"],
                    "msg" => $_POST["msg"],
                    "data" => date("Y-m-d H:i:s")
                );
                $insereContato = $contato->salva($dados);

                //configurações para envio de email
                $mail = new PHPMailer;
                // $mail->SMTPDebug = 1;
                $mail->Debugoutput = 'html';
                $mail->isSMTP();
                $mail->Host = SMTP_HOST;
                $mail->SMTPAuth = true;
                $mail->Username = SMTP_USER;
                $mail->Password = SMTP_PWD;
                $mail->SMTPSecure = 'tls';
                $mail->Port = SMTP_PORT;
                $mail->CharSet = CHARSET;
                $mail->WordWrap = 70;
                $mail->setFrom(CONTACT_EMAIL, NAME);
                $mail->addAddress(CONTACT_EMAIL);
                $mail->addReplyTo($dados['email'], $dados['nome']);
                if (ENVIRONMENT == 'local') {
                    $mail->addBCC(SMTP_CCO); //copia oculta para programador    
                }                
                $mail->isHTML(true);
                $mail->Subject = "Contato - ". NAME;
                $mail->Body="<div style=\"max-width:600px; font-family: sans-serif;\">                             
                             <h4 style=\"color:#4d4d4d; margin:0;\">Mensagem para ". NAME ." | Origem: Formulário de contato do site:</h4>
                             <div style=\"padding: 10px; margin: 10px 0; border: 1px solid #31c1cd; \">
                             <p>".$dados['msg']."</p>
                             </div>
                             <p>REMETENTE</p>
                             <p>Nome: ".$dados['nome']."</p>
                             <p>E-mail: ".$dados['email']."</p>
                             <p>Telefone: ".$dados['fone']."</p>
                             </div>";
                $mail->AltBody = "Contato através do site ". NAME ."\n Nome: ".$dados['nome']."\n E-mail: ".$dados['email']."\n Telefone: ".$dados['fone']."\n Mensagem:".$dados['msg'];
                // print_r($mail);exit;

                if(!$mail->send()) {
                  $dados = array(
                      "type" => "error",
                      "msg" => "A mensagem não pôde ser enviada - Erro: $mail->ErrorInfo",
                      "data" => date("Y/m/d Hu:i:s")
                  );
                } else {
                  $dados = array(
                      "type" => "success",
                      "msg" => "A mensagem foi enviada com sucesso!",
                      "data" => date("Y/m/d Hu:i:s")
                  );
                }
                $this->session->createSession("alert", $dados);

            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        $this->redir->goToController("contato");
    }

}
