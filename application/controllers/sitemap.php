<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sitemap extends CI_Controller 
    {
    function index()
        {
        $data = array();
        $this->load->model("videos_mdl");
        $data["paises"] = $this->videos_mdl->getPaises();
        
        $data["ciudades"] = array();
        foreach ($data["paises"] as $pais) 
            {
            $data["ciudades"] =  array_merge($data["ciudades"], $this->videos_mdl->getCiudades($pais->pais));
            }
            
        $data["videos"] = $this->videos_mdl->getVideos("","","","","5000");
        $data["canales"] = $this->videos_mdl->getCanales();
        
        $this->output->set_header("Content-Type:text/xml");
        $this->load->view('sitemap',$data);
        
        }
        
    function rssfeed()
        {
        $data = array();
        
        $this->load->model("videos_mdl");
        $data["videos"] = $this->videos_mdl->getVideos("","","","","350");
        
        $this->output->set_header("Content-Type:application/rss+xml");
        $this->load->view('rss',$data);
        }    
    }
?>
