<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {
	function search($term, $limit=3){
		$data = array();
        $this->load->model("videos_mdl");
        
        $data["videos"] = $this->videos_mdl->getVideos('', '', '' , '' , $limit, "" ,"", $term);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(array('results'=> $data["videos"])));
    }
}

?>