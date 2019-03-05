SELECT ca.nombre, year(vi.fecha) anio, month(vi.fecha) mes, count(vi.id) total FROM `videos` vi 
 join canales ca on vi.canal_id = ca.youtube_id
  where ca.ciudad = "Cordoba"
  group by vi.canal_id, month(vi.fecha), year(vi.fecha)
  order by total desc;

SELECT ca.nombre, year(vi.fecha) anio, month(vi.fecha) mes, count(vi.id) total FROM `videos_hasta_2015_01_01` vi 
 join canales ca on vi.canal_id = ca.youtube_id
  where ca.ciudad = "Cordoba"
  group by vi.canal_id, month(vi.fecha), year(vi.fecha)
  order by total desc;

SELECT ca.nombre, year(vi.fecha) anio, month(vi.fecha) mes, count(vi.id) total FROM `videos_hasta_2017_01_01` vi 
 join canales ca on vi.canal_id = ca.youtube_id
  where ca.ciudad = "Cordoba"
  group by vi.canal_id, month(vi.fecha), year(vi.fecha)
  order by total desc;

SELECT ca.nombre, year(vi.fecha) anio, month(vi.fecha) mes, count(vi.id) total FROM `videos_hasta_2018_01_01` vi 
 join canales ca on vi.canal_id = ca.youtube_id
  where ca.ciudad = "Cordoba"
  group by vi.canal_id, month(vi.fecha), year(vi.fecha)
  order by total desc;

