<?php	
	if (isset($_POST["submit"])) {
		$para = 'contato@halitech.org';
		$assunto = 'Contato pelo Site';
		$nome = $_POST['name'];
		$email = $_POST['email'];
		$msg = $_POST['message'];
		$spam = intval($_POST['human']);
		
			$corpo = "<strong> Mensagem de Contato </strong><br><br>";
			$corpo .= "<strong> Nome: </strong> $nome";
			$corpo .= "<br><strong> Email: </strong> $email";
			$corpo .= "<br><strong> Mensagem: </strong> $msg";
			
			$header = "Content-Type: text/html; charset= utf-8\n";
			$header .= "From: $email Reply-to: $email\n";
			
			
		
		
		
		
		
		// $from = 'Demo Contact Form'; 
		// $to = 'contato@halitech.org'; 
		// $subject = 'DEABO666 ';		
		
		// $body ="From: $name\n E-Mail: $email\n Message:\n $message\n";
		
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Por favor, digite seu nome';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Por favor, use um endereço de email válido';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Por favor, escreva sua mensagem';
		}
		//Check if simple anti-bot test is correct
		if ($spam !== 5) {
			$errHuman = 'Seu anti-spam está incorreto';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($para, $assunto, $corpo, $header)) {
		$result='<div class="alert alert-success">Obrigado! Entraremos em contato.</div>';
	} else {
		$result='<div class="alert alert-danger">Desculpe, ocorreu um erro ao enviar sua mensagem. Por favor, tente novamente mais tarde.</div>';
	}
}
	}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Venon Connect - Provedor Banda Larga" />
    <meta name="author" content="Venon Connect - Provedor Banda Larga" />
	<link rel="shortcut icon" href="assets/img/favicon.png" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Venon Connect</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLE CSS -->
     <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body > 
   
        <div class="navbar navbar-inverse navbar-fixed-top " >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" >Venon<span style="color:#b30000">Connect</span></a>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right set-links">
                    <li><a href="index.html" >HOME</a></li>
                     <li><a href="sobre.html">QUEM SOMOS</a></li>
                   <li><a href="planos.html">PLANOS</a></li>
                     <li><a href="contato.html" class="active-menu-item">CONTATO</a></li>                    
                </ul>
            </div>

        </div>
    </div>
    <!--MENU SECTION END-->
    <section class="headline-sec">
        <div class="overlay ">
            <h3 >Contato <i class="fa fa-angle-double-right "></i></h3>

        </div>
    </section>
    <!--HOME SECTION END-->
    <section>
        <div class="container">
            <div class="row">
                 <div class="col-md-6" >
                     <h2><strong> Informações </strong></h2>
                     
                    <h5>Rua Cel. João Lopes Zedes, Nº 1545-A,</h5>
                     <h5>Morrinhos, CEP: 75650-000</h5>
                    <h5><i>Email:</i> venoncomputadores@gmail.com</h5>
                     <h5><i>Fone:</i> (64) 3413-4773</h5>
                     <h5><i>Plantão:</i> (64) 9237-3047</h5>
                </div>
                <div class="col-md-6" >
                    
                    <form class="form-horizontal" role="form" method="post" action="contato2.php">
                        <div class="form-group">
                            <strong>FORMULÁRIO DE CONTATO</strong>
                            <br />
							<label for="name" class="col-sm-2 control-label">Nome</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="<?php echo htmlspecialchars($_POST['name']); ?>">
								<?php echo "<p class='text-danger'>$errEmail</p>";?>
							</div>
							<label for="email" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
								<?php echo "<p class='text-danger'>$errEmail</p>";?>
							</div>
							<label for="message" class="col-sm-2 control-label">Menssagem</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
								<?php echo "<p class='text-danger'>$errMessage</p>";?>
							</div>
							<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="human" name="human" placeholder="Sua resposta">
								<?php echo "<p class='text-danger'>$errHuman</p>";?>
							</div>
							<div class="col-sm-10 col-sm-offset-2">
								<input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-success btn-lg">
							</div>
							<div class="col-sm-10 col-sm-offset-2 te">
								<?php echo $result; ?>	
							</div>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="footer-sec" >
        <div class="container">
            <div class="row">
<div class="col-md-4">
   <h4>SOBRE A EMPRESA</h4>
    <p style="padding-right:50px;">
         A Venon Connect é uma empresa focada no desenvolvimento de soluções de comunicação de dados, voz e imagem, em especial utilizando a Internet via Rádio <a href="about.html">mais..</a>
    </p>
</div>
                <div class="col-md-4">
					<h4>Localização Física</h4>
                    <h5>Rua Cel. João Lopes Zedes, Nº1545-A,</h5>
                    <h5>Morrinhos, GO, CEP: 75650-000</h5>
                    <h5><strong>Email:</strong> venoncomputadores@gmail.com</h5>
                    <h5><strong>Fone:</strong> (64) 3413-4773</h5>
					<h5><strong>Plantão:</strong> (64) 9237-3047</h5>
                   
</div>
                <div class="col-md-4">
      <h4>SOCIAL LINKS</h4>
                    <div class="social-links">

                    
                    <a href="#" > <i class="fa fa-facebook fa-2x" ></i></a>
                         <a href="#" > <i class="fa fa-twitter fa-2x" ></i></a>
                         <a href="#" > <i class="fa fa-linkedin fa-2x" ></i></a>
                         <a href="#" > <i class="fa fa-google-plus fa-2x" ></i></a>
                         <a href="#" > <i class="fa fa-github fa-2x" ></i></a>
                         <a href="#" > <i class="fa fa-digg fa-2x" ></i></a>
                         <a href="#" > <i class="fa fa-dropbox fa-2x" ></i></a>
                   </div>

</div>
               
            </div>
               
        </div>
    </section>
     <!--FOOTER SECTION END-->
    <div class="copy-txt">
         <div class="container">
        <div class="row">
<div class="col-md-12 set-foot" >
    &copy 2016 <a href="http://www.venonconnect.com.br/">Venon Connect</a> | Todos os direitos reservados 
</div>
            </div>
                   </div>
    </div>
     <!-- COPY TEXT SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.11.1.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
    
</body>
</html>
