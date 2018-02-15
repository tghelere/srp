<?

class Controller extends System {

    protected $redir, $session, $css;
    public $smarty;    

    public function init() {

        $this->session = new SessionHelper();
        $this->redir = new RedirectorHelper();
        $this->smarty = new Smarty();


        // conf smarty
        $this->smarty->cache_dir = SMARTY_CACHE;
        $this->smarty->template_dir = TEMPLATES;
        $this->smarty->compile_dir = SMARTY_COMPILE;
        $this->smarty->caching = SMARTY_CACHE_STATUS;
        $this->smarty->cache_lifetime = SMARTY_CACHE_LIFETIME;
        //$this->smarty->testInstall();exit;

        $this->smarty->assign("environment", ENVIRONMENT);
        $this->smarty->assign("name", NAME);
        $this->smarty->assign("charSet", CHARSET);
        $this->smarty->assign("author", AUTHOR);
        $this->smarty->assign("version", VERSION);
        $this->smarty->assign("img", IMG);
        $this->smarty->assign("css", CSS);
        $this->smarty->assign("js", JS);
        $this->smarty->assign("rootUrl", ROOTURL);
        $this->smarty->assign("thisUrl", ROOTURL . $_SERVER['REQUEST_URI']);
        if ($this->_controller == 'index') {
            $this->css = file(ROOTPATH."/assets/css/home.css");
            $this->smarty->assign("thisController", 'home');
        } else {
            if (file_exists(ROOTPATH."/assets/css/" . $this->_controller . ".css")) {
                $this->css = file(ROOTPATH."/assets/css/" . $this->_controller . ".css");
            }else{
                $this->css = file(ROOTPATH."/assets/css/erro.css");                
            }          
            $this->smarty->assign("thisController", $this->_controller);
        }        
		$this->smarty->assign("cssContent", $this->css[0]);
        $this->smarty->assign("thisAction", $this->_action);
        $this->smarty->assign("thisParams", $this->_params);
        $this->smarty->assign("emailContato", CONTACT_EMAIL);
        $this->smarty->assign("foneContato", CONTACT_PHONE);
        $this->smarty->assign("endContato", CONTACT_ADDRESS);
        $this->smarty->assign("localContato", CONTACT_GEOLOCATION);

        //Canonical
        if ($this->_controller == "index") {
            $canonical = ROOTURL . "/";
        } else {
            if ($this->_action == "index_action") {
                $canonical = ROOTURL . "/" . $this->_controller . "/";
            } else {
                if ($this->_params > array()) {
                    $canonical = ROOTURL . "/" . $this->_controller . "/" . $this->_action . "/" . $this->getExplode() . "/";
                } else {
                    $canonical = ROOTURL . "/" . $this->_controller . "/" . $this->_action . "/";
                }
            }
        }
        $this->smarty->assign("canonical", $canonical);

    }

}
