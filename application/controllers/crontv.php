<?php

class Crontv extends CI_Controller
    {
    /**
     * dar de alta un nuevo canal cargando sus videos del ultimos mes
     * @param type $channelId
     */
    function upNewChannel($channelId)
        {
        $data=array();
        
        $this->load->model("youtube_mdl");
        
        $data["res"]["channelId"] = $channelId;
        
        if ($this->youtube_mdl->lastError != "")
            {
            $data["res"]["error"] = $this->youtube_mdl->lastError;
            }
        else
            {
            $hoy=date("y-m-d");
            $lastMonth = date("Y-m-d", strtotime("-30 day"));
            $data["res"] = $this->youtube_mdl->getResults("", $channelId, 50, $lastMonth, $hoy);
            }
            
        print_r($data["res"]);
        }
        
    /**
     * Actualizar lo que hicieron todos los canales un dia
     * /usr/bin/lynx -dump http://television.data99.com.ar/crontv/upAllChannelsToday (cron actualizado segun URL)
     */    
    function upAllChannelsToday()
        {
        $data=array();
        
        $this->load->model("youtube_mdl");
        if ($this->youtube_mdl->lastError != "")
            {
            $data["res"]["error"] = $this->youtube_mdl->lastError;
            exit($data["res"]["error"]);
            }
        
        
        $this->load->model("videos_mdl");
        $canales = $this->videos_mdl->getCanales();
        
        foreach ($canales as $canal) 
            {
            $hoy=date("y-m-d");
            $ayer=date("y-m-d", strtotime("-1 day"));
            $data["res"] = $this->youtube_mdl->getResults("", $canal->youtube_id, 50, $ayer, $hoy);
            
            $videos = $data["res"]["response"]["items"];
            $tot = count($videos);
            echo "<hr><b>Canal: $canal->nombre ($canal->pais $canal->ciudad): <b>$tot</b> videos</b>";
            foreach ($videos as $video) 
                {
                echo "<br/>".$video["snippet"]["publishedAt"]." - " .$video["snippet"]["title"];
                }
            }
        
        print_r($data["res"]);
        }
    }
?>
