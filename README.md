# television.data99.com.ar
Lector y publicador de canales de youtube agrupados. Visible en television.data99.com.ar

## Inicializar

Crear la base de datos desde *initial.sql*  

Copiar */application/config/database_sample.php* a */application/config/database.php* con los datos de la base su datos.  
Copiar */application/config/myconfig_sample.php* a */application/config/myconfig.php* con los datos de su cuenta para APIs de Google y otros.    

Cargar canales de youtube segun su ID en la base de datos y listo. Hay algunos datos de ejemplo en la base inicial.  
  
Para actualizar manualmente (y además cargar en un *cron*) los videos de todos los canales cargados puede usar la URL **/crontv/upAllChannelsToday**.  
Para actualizar solo un canal **/crontv/upNewChannel/CHANNELID**.  
El canal (vía CHANNELID) tiene que estar en la base, esto no lo agrega, solo lo actualiza si existe.  
En cron puede cargarse por ejemplo:  
`/usr/bin/lynx -dump http://tudominio.com.ar/crontv/upAllChannelsToday`  
Cada 1 hora (a gusto).  

