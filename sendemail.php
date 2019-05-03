<?php
  // indirizzo di chi riceve la mail è sottolineato ma nel codice non sottilineatelo 
 if ((trim($_POST['name']) != "") && (trim($_POST['mail']) != "")) {    //questo fa si che se i campi "oggetto" e "messaggio" sono vuoti la form non invia nessuna mail
  $to = "      \n info@teodorani.com    ";
$headers = "From: " . $_POST['mail'] . "\n";
  // soggetto della mail
  $subject = "Contatto Diretto da teodorani.com ";
  
  // corpo messaggio
  $body = "Contenuto della Richiesta:\n\n";
    
  $body .= "" . trim(stripslashes($_POST["body"])) . "\n\n\n"; 
  $body .= "Inviata da: " . trim(stripslashes($_POST["name"])) . "\n\n" ; 
  $body .= "Telefono: " . trim(stripslashes($_POST["icon_telephone"])) . "\n\n";
  $body .= "email: " . trim(stripslashes($_POST["mail"])) . "\n\n\n";  
  $body .= "Consenso raccolta dati: " . trim(stripslashes(isset($_POST["raccolta"]) ? $_POST["raccolta"] : "no")) . "";  
  
  if(isset($_POST['g-recaptcha-response']))
          $captcha=$_POST['g-recaptcha-response'];

        if(!$captcha){
          echo '<script type="text/javascript">alert("😯  OhOh  😯\nDimostra di non essere un Robot");</script>' ;
  echo "<script>
             window.history.go(-1);
     </script>";
          exit;
        }
        //mettere quello del sito corretto
        $response=json_decode(file_get_contents("".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        if($response['success'] == false)
        {
          echo '<h2>...</h2>';
        }
		
  // invio mail
  mail($to, $subject, $body, $headers); // SE L'INOLTRO E' ANDATO A BUON FINE...
  
  echo '<script type="text/javascript">alert("👍  Richiesta Inviata con Successo!  👍\nVerrà Contattato nel più Breve Tempo Possibile");</script>' ;
  echo '<meta http-equiv="refresh" content="0;URL=https://www.teodorani.com/">' ;
  
  } else {// altrimenti
  echo '<script type="text/javascript">alert("😯  OhOh  😯\nQualcosa è andato Storto \nForse manca qualche dato obbligatorio  😉\nSi Prega di Riprovare");</script>' ;
  echo "<script>
             window.history.go(-1);
     </script>";
  
  }
  
  ?>
  