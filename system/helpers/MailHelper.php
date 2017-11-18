<?

class MailHelper {

    protected $mailer;

    public function __construct() {
        $this->$mailer = new PHPMailer();
        return $this;
    }

    public function envia($conteudo) {
        $this->$mailer->IsSMTP();
        $this->$mailer->SMTPAuth = TRUE;
        $this->$mailer->SMTPSecure = "tls";
        $this->$mailer->Port = SMTP_PORT;
        $this->$mailer->Host = SMTP_HOST;
        $this->$mailer->Username = SMTP_USER;
        $this->$mailer->Password = SMTP_PWD;
        $this->$mailer->SetFrom(CONTACT_EMAIL, NAME);

        $this->$mailer->CharSet = CHARSET;
        // $this->$mailer->AddAddress("user@mail.com", "Name");
        // $this->$mailer->AddBCC("user@email.com");
        $this->$mailer->Subject = "";
        $this->$mailer->MsgHTML($conteudo);
        return $this;
    }

}
