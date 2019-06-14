<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUIyJ" crossorigin="anonymous">
        

        
        
        
    <body>



<img src="s.png" align="center" width="50" height="50"> 
<font size="15"><b>SIG</b>ER- Sistema Gerenciador de Reservas</font>
<hr>

 <center><h1>Equipamentos cadastrados</h1></center>

<table width="467" border="1px" align='center'>
    <thead>
        <tr>
          
          <td width="101" height="40"><b>Tipo de equipamento:</b></td>
          <td width="101" height="40"><b>Marca:</b></td>
          <td width="101" height="40"><b>Modelo:</b></td>         
          <td width="101" height="40"><b>Numero de série:</b></td>    
          <td width="101" height="40"><b>Data de aquisição:</b></td>
          <td width="101" height="40"><b>Status:</b></td>
         
	   
          
        </tr>
    </thead>
        <tbody>
            @foreach($equipamentos as $equipamentos)
            <tr>
            
	            <td width="101" height="40">{{$equipamentos->eqdescricao}}</td>
                <td width="101" height="40">{{$equipamentos->marca}}</td>
                <td width="101" height="40">{{$equipamentos->modelo}}</td>
                <td width="101" height="40">{{$equipamentos->codidentificacao}}</td>
                <td width="101" height="40">{{$equipamentos->dt_aquisicao}}</td>
                <td width="101" height="40">{{$equipamentos->status}} </td>

            </tr>
            @endforeach
    </tbody>

    </table>
            
      
       
       
    </body>


    </html>