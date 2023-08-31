<?php
    ini_set('mysql.connect_timeout',300);
    ini_set('default_socket_timeout',300);

?>
<html>
    <body>
        <form method="POST" enctype="multipart/form-data" action="http://187.84.234.155:8080/mo1.4/app/upload_img.php">
        <br/>
            <input type="file" name="image" />
			 <br/>nome imagem: <input type="text" name="nome">
            <br/>id_visitas: <input type="text" name="id_visitas"><br/>
			empresa: <input type="text" name="empresa" value=""><br/>
			nome_usr: <input type="text" name="nome_usr" value=""><br/>
            <input type="submit" name="submit" value="Upload" />
        </form>
        <?php
		  displayimage();
		  
            if(isset($_POST['submit']))  {
				
		
                    $visitas = $_POST["id_visitas"];
				$empresa = $_POST["empresa"];
				$nome_usr = $_POST["nome_usr"];
				$nome = $_POST["nome"];
                   // $image = addslashes($_FILES['image']['tmp_name']);				
                   // $name = addslashes($_FILES['image']['name']);
                   // $image = file_get_contents($image);			
                 //	$image = base64_encode($image);
					
          //          saveimage($name, $image, $visitas);

               


            }
         
            function saveimage($name,$image,$visitas)
            {
                $con=Mysql_connect("localhost", "root", "HtMQZhAwCNzeaAfT");
                mysql_select_db("mo_teste", $con);
                $qry="insert into images (name,image,id_visita) values ('$name','$image','$visitas')";
                $result=Mysql_query($qry, $con);
                if ($result)
                {
                    echo "<br/>image uploaded.";
                }	
                else
                {
                    echo "<br/>image not uploaded.";
                }
            }
            function displayimage()
            {

                $con =Mysql_connect("localhost","root","HtMQZhAwCNzeaAfT");
                mysql_select_db("mo_teste",$con);
                $qry ="select * from images order by id DESC";
                $result=mysql_query($qry,$con);
                while($row = mysql_fetch_array($result))
                {
                    $img = $row["image"];
                    $nome = $row["name"];
                    echo '<br>' . '<img height="300" width="300" src="data:image;base64,' .$img. '"> ' . '</br>';
                    echo $nome;
                }
                mysql_close($con);
            }
        ?>
    </body>
</html>


