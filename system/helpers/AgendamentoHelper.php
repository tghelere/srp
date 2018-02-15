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
            $mail->Body='<div style="max-width:640px; margin: 0 auto; border:2px solid #00767b; padding:20px; font-family: sans-serif; display: table; ">
                            <div style="width: 100%; display: table;">
                                <div style="width: 40%; float:left;">
                                    <img style="display:block; margin: 0 auto; " width="250" height="138" src=" '. ROOTURL . '/assets/img/logoTransparente.png" alt=" '. NAME .' ">
                                </div>
                                <div style="width: 60%; float:left;">
                                    <p style=" margin: 35px 0 5px; text-align: center; font-size:18px;">Solicitação de aula experimental</p>
                                    <p style=" margin: 5px 0; text-align: center; font-style: italic;">Interesse por aulas</p>                                
                                </div>
                            </div>
                            <div style="width: 100%; display: table; margin-top: 50px; font-size: 14px;">
                                <div style="width: 50%; float:left;"><p style=" margin: 5px 0; text-align: right; font-weight: bold; color:#00767b; padding:0 5px;">Modalidade</p></div>
                                <div style="width: 50%; float:left;"><p style=" margin: 5px 0; padding:0 5px;"> '.ucfirst($dados['area']). '</p></div>
                                
                                <div style="width: 50%; float:left;"><p style=" margin: 5px 0; text-align: right; font-weight: bold; color:#00767b; padding:0 5px;">Nome</p></div>
                                <div style="width: 50%; float:left;"><p style=" margin: 5px 0; padding:0 5px;"> '.$dados['nome'].' </p></div>

                                <div style="width: 50%; float:left;"><p style=" margin: 5px 0; text-align: right; font-weight: bold; color:#00767b; padding:0 5px;">E-mail</p></div>
                                <div style="width: 50%; float:left;"><p style=" margin: 5px 0; padding:0 5px;"> '.$dados['email'].' </p></div>

                                <div style="width: 50%; float:left;"><p style=" margin: 5px 0; text-align: right; font-weight: bold; color:#00767b; padding:0 5px;">Telefone</p></div>
                                <div style="width: 50%; float:left;"><p style=" margin: 5px 0; padding:0 5px;"> '.$dados['fone'].' </p></div>
                            </div>
                        </div>';
            $mail->AltBody = "Contato através do site ". NAME ."\n Assunto: ".ucfirst($dados['area'])."\n Nome: ".$dados['nome']."\n E-mail: ".$dados['email']."\n Telefone: ".$dados['fone'];

            // echo "<pre>"; print_r($mail); echo "</pre>"; exit;


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