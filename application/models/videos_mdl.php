<?php

class Videos_mdl extends CI_Model
    {
    
    var $lastError="";
    var $lastQuery = "";
    
    function getVideos($pais="", $ciudad="", $canal="", $canal_id="", $limit=20, $fecha="", $video_id="", $search="")
        {

        if ($video_id != "") {
            return $this->getVideoById($video_id);
        }

        $q = "select v.*,c.ciudad, c.pais, c.nombre canal, c.youtube_id canal_id 
                from videos v 
                join canales c ON v.canal_id=c.youtube_id ";
        $flts = array();
        
        
        if ($search != "") {$flts[] = "(v.title like '%$search%' OR v.description like '%$search%')";}
        elseif ($canal) {$flts[] = "c.nombre='$canal'";}
        elseif ($canal_id) $flts[] = "v.canal_id='$canal_id'";
        else
            {
            if ($ciudad) $flts[] = "c.ciudad = '$ciudad'";
            elseif ($pais) $flts[] = "c.pais = '".urldecode($pais)."'";
            if ($fecha) $flts[] = "v.fecha='$fecha'";
            }   
        if (count($flts)>0) $q .= " WHERE " . implode (" AND ", $flts);
        
        $q .= " order by v.fecha desc, v.hora desc limit $limit";

        $this->lastQuery = $q;
        $query = $this->db->query($q);
        if (!$query)
            {
            $this->lastError = "Error al leer resultados: $q";
            return false;
            }
        
        $res = $query->result();    
        return $res;    
        }
        
    function getVideoById($video_id) {
        $tablas = ['videos', 'videos_hasta_2018_01_01', 'videos_hasta_2017_01_01', 'videos_hasta_2015_01_01'];
        
        foreach ($tablas as $tabla) {

            $q = "select v.*,c.ciudad, c.pais, c.nombre canal, c.youtube_id canal_id 
                from $tabla v 
                join canales c ON v.canal_id=c.youtube_id 
                where v.video_id = '$video_id'";

            $this->lastQuery = $q;
            $query = $this->db->query($q);
            if (!$query)
                {
                $this->lastError = "Error al leer resultados video: $q";
                return false;
                }
            
            $res = $query->result();
            if (count($res) > 0) {
                $res = $res[0];
            }
            else {
                $this->lastError = "No existe el videoID: $q";
                $res = FALSE;
            }
            
            if ($res) {return $res;}

        }

        return FALSE;
    }
        
    function getPaises()
        {
        $q = "select distinct(c.pais) pais from canales c order by c.pais ";
        
        $query = $this->db->query($q);
        if (!$query)
            {
            $this->lastError = "Error al leer paises: $q";
            return false;
            }
            
        return $query->result();
        }
        
    function getCanales($ciudad = "", $pais = "")
        {
        $q = "select * from canales ";
        if ($ciudad != "") $q .= " Where ciudad ='$ciudad' ";
        elseif($pais != "") $q .= " Where pais ='$pais' ";
        $q .= " order by nombre ";
        
        $query = $this->db->query($q);
        if (!$query)
            {
            $this->lastError = "Error al leer paises: $q";
            return false;
            }
            
        return $query->result();
        }    
        
    function getPaisFromCiudad($ciudad)
        {
        $q = "select distinct(c.pais) pais from canales c where ciudad='$ciudad' limit 1 ";
        
        $query = $this->db->query($q);
        if (!$query)
            {
            $this->lastError = "Error al leer paises: $q";
            return false;
            }
            
        $res = $query->result();    
        return $res[0]->pais;
        }    
    
    function getCiudades($pais = "")
        {
        $q = "select distinct(c.ciudad) ciudad from canales c";
        if ($pais) $q .= " where c.pais='$pais' ";
        $q .= " order by c.ciudad ";
        
        $query = $this->db->query($q);
        if (!$query)
            {
            $this->lastError = "Error al leer ciudades: $q";
            return false;
            }
            
        return $query->result();    
        }    
    }

?>
