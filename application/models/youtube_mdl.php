<?php

class Youtube_mdl extends CI_Model
    {
    var $lastError = "";
    var $dev_key = "";
    var $google_Client;
    var $youtube;
    
    function __construct()
        {
        $this->dev_key = $this->config->item("google_api_key");
        
        //$this->load->library('google_Client');
        
        require_once $this->config->item("base_path")."/myextras/google/Google_Client.php";
        $this->google_Client = new Google_Client();
        
        if (!$this->google_Client) 
            {
            $this->lastError = "No puede obtener el cliente de google " . $this->config->item("google_api_key");
            return false;
            }
            
        $this->google_Client->setDeveloperKey($this->dev_key);
        
        //$this->youtube = $this->load->library('google/contrib/google_YouTubeService', $this->google_Client);
        require_once $this->config->item("base_path")."/myextras/google/contrib/Google_YouTubeService.php";
        $this->youtube = new Google_YouTubeService($this->google_Client);
        
        if (!$this->youtube) 
            {
            $this->lastError = "No puede obtener el objeto youtube";
            return false;
            }
            
        return true;    
        }
    
    function getApiData($obj, $func, $params, $fields)
        {
        $ret = array("result" => 0);
        
        try {
            
            $searchResponse = $this->youtube->$obj->$func($fields, $params);

            $ret["result"] = 1;
            $ret["response"] = $searchResponse;
            }
        catch (Google_ServiceException $e) 
            {
            $ret["error"] = 'Error en el servicio: ' . $e->getMessage();
            $ret["result"] = 0;
            } 
        catch (Google_Exception $e) 
            {
            $ret["error"] = 'Error en el cliente: '. $e->getMessage();
            $ret["result"] = 0;
            }
          
        return $ret;    
        
        }
        
    function getChannelVideos($channelId)
        {
        $params = array("channelId"=>$channelId, "mine"=>true, "publishedAfter"=>"2013-04-01T00%3A00%3A00Z", "publishedBefore"=>"2013-05-01T00%3A00%3A00Z");
        $obj = "activities";
        $func = "listActivities";
        $fields = 'snippet,contentDetails';
        return $this->getApiData($obj, $func, $params, $fields);
        }
        
    function getResults($q="", $channelId="", $maxResults = 20, $publishedAfter="", $publishedBefore="", $save=1, $order="date")
        {
        $params = array("maxResults"=>$maxResults);
        if ($channelId) $params["channelId"]=$channelId;
        if ($q) $params["q"]=$q;
        
        $hoy = date("Y-m-d");
        
        if ($publishedAfter =="") $publishedAfter = $hoy."T00:00:00Z";
        else $publishedAfter = $publishedAfter."T00:00:00Z";
        
        $params["publishedAfter"] = $publishedAfter;
        
        if ($publishedBefore =="") $publishedBefore = $hoy."T23:59:59Z";
        else $publishedBefore = $publishedBefore."T23:59:59Z";
        $params["publishedBefore"] = $publishedBefore;
        
        $params["order"]=$order;
        
        $obj = "search";
        $func = "listSearch";
        $fields = 'id,snippet';
        $res =  $this->getApiData($obj, $func, $params, $fields);
        
        if ($res["result"] == 0)
            {
            return $res;
            }
            
        if ($save)
            {
            $r = $this->saveResults($res);
            $res["saving"] = $r;
            $res["error"] = $this->lastError;
            }
        
        return $res;
        }
        
    /**
     * Grabar los videos resultantes
     * @param type $res
     */    
    function saveResults($res)
        {
        
        $items = $res["response"]["items"];
        
        foreach ($items as $item) 
            {
            $id = $item["id"]["videoId"];
            $f = $item["snippet"]["publishedAt"]; // 2013-07-10T22:42:44.000Z
            $pf = explode("T", $f);
            $fecha = $pf[0];
            if (strstr($fecha, "1970")) $fecha = date("Y-m-d");
            
            $hora = str_replace(".000Z", "", $pf[1]);
            $hora = str_replace("Z", "", $hora);
            
            $channelId = $item["snippet"]["channelId"];
            $titulo = str_replace("'", '', $item["snippet"]["title"]);
            $descripcion = str_replace("'", '', $item["snippet"]["description"]);
            $thum_mini = $item["snippet"]["thumbnails"]["default"]["url"];
            $thum_med = $item["snippet"]["thumbnails"]["medium"]["url"];
            $thum_high = $item["snippet"]["thumbnails"]["high"]["url"];
            
            // ??
            if ($id == "") {continue;}
            
            //limpiar marcas
            $sacar = array("Almería Noticias Canal 28 TV - "," - Telefe Noticias"
                ,"CANAL 5 - ROSARIO - BIEN TEMPRANO. "
                ,"CANAL 5 ROSARIO -- BIEN TEMPRANO -- "
                ,"V7inter: ","Almería Noticias Digital 28 TV - "
                , " - Univision Noticias");
            
            foreach ($sacar as $saca) 
                {
                $titulo = str_replace($saca, "", $titulo);
                }
            
            
            $q = "Insert into videos (fecha, hora, canal_id, video_id, th_mini, th_med, th_high, title, description) VALUES 
                ('$fecha','$hora','$channelId','$id','$thum_mini','$thum_med','$thum_high','$titulo','$descripcion')
                    ON DUPLICATE KEY UPDATE fecha=fecha;";
            
            $query = $this->db->query($q);
            if (!$query)
                {
                $this->lastError = "Error al grabar resultado: $q";
                return false;
                }
            }
        return true;    
        }
    
    }
?>