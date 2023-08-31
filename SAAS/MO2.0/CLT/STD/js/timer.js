

    var a, pageTimer;  //declare var

    function startClock()
    {
    pageTimer = 0;  //start at 0
    a = window.setInterval("tick()",60000);  //run func tick every minute....  (60 sec x 1000 ms = 1min)
    }

    function tick()
    {
    pageTimer++;  //increment timer
	//alert(pageTimer);
    if (pageTimer == 1) {warnuser()};  //if 10 min without activity
    }

    function warnuser()
    {
     //   if (confirm("N\u00e3o houve nenhuma atividade nos ultimos 15 minutos.\n\nClique em 'OK' se voc\u00ea quiser continuar a sua sess\u00e3o. \nClique em 'Cancel' para sair."))
   //     {
        location.reload(true);
        document.location.href = "step4.php?alert=y";

		 //pageTimer = 0
    //    }
   //     else
  //      {
    //    document.location.href="index.php"
		
		
    //    }
    }
