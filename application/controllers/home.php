<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
	{
        $data = array();
        $this->load->model("videos_mdl");
        
        $vars = $this->uri->ruri_to_assoc();
        $data["vars"] = print_r($vars, true);
        
        //paginacion ---------------------------------------------
        $pagina=(isset($vars["pagina"])) ? $vars["pagina"] : 1;
        
        $sliders = 1;
        $vidNormal = 18;
        $vidMini = 18;
        
        $vidXpag = $sliders + $vidNormal + $vidMini;
        $page = ($pagina-1) * $vidXpag;
        
        $data["pagina"]=$pagina;
        $data["page"]=$page;//el id donde empieza
        $data["search"]=(isset($vars["search"])) ? urldecode($vars["search"]) : "";
        
        if (count($vars) == 0) {$vars["pais"]="Argentina";}
        $vars["pagina"]=($pagina - 1);
        $data["prevButton"] = ($pagina > 1) ? $this->implodeWithKeys("/",$vars) : "";
        $vars["pagina"]=($pagina + 1);
        $data["nextButton"] = $this->implodeWithKeys("/",$vars);
        //paginacion ---------------------------------------------
        
        
        if (isset($vars["ciudad"])) $vars["ciudad"] = urldecode(str_replace("-", " ", $vars["ciudad"]));
        if (isset($vars["pais"])) $vars["pais"] = urldecode(str_replace("-", " ", $vars["pais"]));
        if (isset($vars["canal"])) $vars["canal"] = urldecode(str_replace("-", " ", $vars["canal"]));
        
        if (isset($vars["ciudad"]))
            {
            $data["ciudad"] = $vars["ciudad"];
            $data["pais"] = $this->videos_mdl->getPaisFromCiudad($vars["ciudad"]);
            }
        else
            {
            $data["pais"] = (isset($vars["pais"])) ? $vars["pais"] : "Argentina";
            $data["ciudad"] = (isset($vars["ciudad"])) ? $vars["ciudad"] : "";
            }
            
        $data["canal_id"] = (isset($vars["canal_id"])) ? $vars["canal_id"] : "";
        $data["canal"] = (isset($vars["canal"])) ? urldecode(str_replace("-"," ",$vars["canal"])) : "";
        $data["canales"] = $this->videos_mdl->getCanales($data["ciudad"],$data["pais"]);
        
        $data["paises"] = $this->videos_mdl->getPaises();
        $data["ciudades"] = $this->videos_mdl->getCiudades($data["pais"]);
        
        $data["videos_big"] = $this->videos_mdl->getVideos($data["pais"], $data["ciudad"],$data["canal"],$data["canal_id"],"$page, ".$sliders,"" ,"", $data["search"]);
        $data["q_big"] = $this->videos_mdl->lastQuery;
        $data["videos"] = $this->videos_mdl->getVideos($data["pais"], $data["ciudad"],$data["canal"],$data["canal_id"],($page+$sliders).", ".($vidNormal),"" ,"", $data["search"]);
        $data["q"] = $this->videos_mdl->lastQuery;
        $data["videos_mini"] = $this->videos_mdl->getVideos($data["pais"], $data["ciudad"],$data["canal"],$data["canal_id"],($page+$sliders+$vidNormal).", ".($vidMini),"" ,"", $data["search"]);
        $data["q_mini"] = $this->videos_mdl->lastQuery;
        
        $data["meta_title"] = "La television abierta.";
        if ($data["pais"] != "") $data["meta_title"] = "La television abierta en " . $data["pais"];
        if ($data["ciudad"] != "") $data["meta_title"] = "La television abierta en " . $data["ciudad"];
        if ($data["canal"] != "") $data["meta_title"] = $data["canal"] . " en la television abierta.";
        
        
        $data["pub"] = array();
        $data["pub"][] = array(
            "url"=>"aprenderingles.data99.com.ar"
            , "titulo"=>"Aprender Ingles"
            , "texto"=>"Decenas de empresa compitiendo para ofrecerte las mejores opciones para <strong>aprender ingles</strong>?"
            , "imagen"=> "/myextras/img/aprender-ingles.gif");
        
        $data["pub"][] = array(
            "url"=>"postres.data99.com.ar"
            , "titulo"=>"Toras y postres"
            ,"texto"=>"Deja lo que estas haciendo, conseguí ahora lo mejor en tortas y postres"
            , "imagen"=>"/myextras/img/cabsha.jpg");
        
        $data["pub"][] = array(
            "url"=>"sistemas.data99.com.ar"
            , "titulo"=>"Consultoría en sistemas informáticos"
            ,"texto"=>"Enviás tu consultas y las empresas ofrecen sus servicios, es muy fácil, cómodo y rápido"
            , "imagen"=>"/myextras/img/dev.jpg");
        
        /*
        $data["pub"][] = array(
            "url"=>"tufiestade15.data99.com.ar"
            , "titulo"=>""
            ,"texto"=>"Donde vas a festejar tu fiesta de 15?"
            , "imagen"=>"");
        */
        $this->load->view('home', $data);
	}
        
    function video($video_id)
        {
        $this->load->model("videos_mdl");
        $data =  array();
        $data["paises"] = $this->videos_mdl->getPaises();
        $data["ciudades"] = $this->videos_mdl->getCiudades();
        $data["canales"] = $this->videos_mdl->getCanales();
        
        $data["video"] = $this->videos_mdl->getVideos("","","","","1","",$video_id);
        
        $data["pub"] = array();
        $data["pub"][] = array(
            "url"=>"aprenderingles.data99.com.ar"
            , "titulo"=>"Aprender Ingles"
            , "texto"=>"Decenas de empresa compitiendo para ofrecerte las mejores opciones para <strong>aprender ingles</strong>?"
            , "imagen"=> "/myextras/img/aprender-ingles.gif");
        
        $data["pub"][] = array(
            "url"=>"postres.data99.com.ar"
            , "titulo"=>"Toras y postres"
            ,"texto"=>"Deja lo que estas haciendo, conseguí ahora lo mejor en tortas y postres"
            , "imagen"=>"/myextras/img/cabsha.jpg");
        
        $data["pub"][] = array(
            "url"=>"sistemas.data99.com.ar"
            , "titulo"=>"Consultoría en sistemas informáticos"
            ,"texto"=>"Enviás tu consultas y las empresas ofrecen sus servicios, es muy fácil, cómodo y rápido"
            , "imagen"=>"/myextras/img/dev.jpg");
        $this->load->view('video', $data);
        }
        
    private function implodeWithKeys($glue, $arr)
        {
        $ret = "";
        foreach ($arr as $key => $value) 
            {
            $ret .= $glue.$key.$glue.$value;
            }
        return $ret;    
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */