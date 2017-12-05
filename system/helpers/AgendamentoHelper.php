<?

class AgendamentoHelper {
    protected $session;

    public function enviar($dados){
        
        $this->session = new SessionHelper();

        // print_r($dados);exit;

        try {
            $mail = new PHPMailer;
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
            $mail->Subject = "Agendamento - ". ucfirst($dados['area']);
            $mail->Body="<div style=\"max-width:600px; margin: 0 auto; border:2px solid #31c1cd; padding:20px; background-color:#dbfffa; font-family: sans-serif; \">
                            <img style=\"display:block; margin:0 auto;\" width=\"80\" height=\"80\" src=\"". IMG ."apple-touch-icon.png\" alt=\"". NAME ."\">
                            <h3 style=\"color:#4d4d4d; margin-bottom:30px; text-align:center;\">". NAME ."</h3>
                            <p>Assunto: <b style=\"color:#31c1cd; font-size:14px;\">Agendamento " .ucfirst($dados['area'])."</b></p>
                            <p>Nome: <b style=\"color:#31c1cd; font-size:14px;\">".$dados['nome']."</b></p>
                            <p>E-mail: <b style=\"color:#31c1cd; font-size:14px;\">".$dados['email']."</b></p>
                            <p>Telefone: <b style=\"color:#31c1cd; font-size:14px;\">".$dados['fone']."</b></p>                    
                            </div>";
            $mail->AltBody = "Contato através do site ". NAME ."\n Assunto: ".ucfirst($dados['area'])."\n Nome: ".$dados['nome']."\n E-mail: ".$dados['email']."\n Telefone: ".$dados['fone'];

            // echo "<pre>";
            // print_r($mail);
            // echo "</pre>";
            // exit;


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
        }catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}