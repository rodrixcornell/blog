<?php
/*
Template Name: Formulário de Contato
*/
?>

<?php

// Validação

$erroContato = NULL;
$emailEnviado = FALSE;

if( isset($_POST['form-contato-submeter']) ){
    
    // Valida a mensagem
    
    $contatoMensagem = stripslashes(strip_tags($_POST['contato-mensagem']));

    if( trim($contatoMensagem) === '' || strlen($contatoMensagem)<=5 ){
        $erroContato = 'Entre com a mensagem do email.';
    }
   
    // Valida o Email
    
    $contatoEmail = trim( $_POST['contato-email'] );

    if( trim($contatoEmail) === '' ){
        $erroContato = 'Entre com seu endereço de e-mail.';
    }elseif(!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['contato-email']))){
        $erroContato = 'Endereço de e-mail inválido.';
    }
    
    // Valida o nome
    
    $contatoNome = trim(strip_tags($_POST['contato-nome']));
    
    if( $contatoNome === '' ){
        $erroContato = 'Entre com o seu nome.';
    }

    // Envia o e-mail
    
    if( is_null($erroContato) ){
        
        // Email do Administrador dessa instalação do WordPress. Fique a vontade em alterar.
        
        $emailPara = get_option('admin_email');
        
        // Dados da mensagem
        
        $assunto = '[Blog TreinaWeb] de ' . $contatoNome;
        $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";

        // mail(..., ..., ...); -> Aqui a função para envio do e-mail. Como estamos localmente, a mail() não funciona.
        
        // E-mail enviado com sucesso
        
        $emailEnviado = TRUE;
        
    }

}

?>

<?php get_header(); // Inclui o header.php ?>

<?php get_sidebar(); // Inclui o sidebar.php ?>

<!-- Formulário -->

<div class="span9">

    <!-- Implementar o formulário aqui -->
    
    <h2>Formulário de contato</h2>
    
    <p>Sugestão, crítica ou parceria? Contate-nos.</p>
    
    <!-- Mensagem de erro ou de sucesso no envio do e-mail -->
    
    <?php if( $emailEnviado===TRUE ): ?>
        <p class="alert alert-success"><strong>Email enviado!</strong> Obrigado pelo contato. Retornaremos em breve.<p>             
    <?php elseif( !is_null($contatoEmail) ): ?>
        <p class="alert alert-error"><strong>Erro:</strong> <?=$erroContato;?><p>  
    <?php endif; ?>
                
    <!-- Formulário de contato -->

    <?php if(have_posts()) : while(have_posts()) : the_post() ?>
    
    <form action="<?php the_permalink(); // URL atual ?>" method="post" id="form-contato" class="form-horizontal">
        <fieldset>
            <p>
                <label for="contato-nome">Nome:</label>
                <input type="text" name="contato-nome" id="contato-nome" value="" />
            </p>
            <p>
                <label for="contato-email">Email:</label>
                <input type="text" name="contato-email" id="contato-email" value="" />                
            </p>
            <p>
                <label for="contato-mensagem">Mensagem:</label>
                <textarea name="contato-mensagem" id="contato-mensagem" rows="5" cols="45"></textarea>                
            </p>

            <p><input type="submit" class="btn btn-primary" name="form-contato-submeter" value="Enviar Email"></p>
        </fieldset>
    </form>
        
    <?php endwhile;endif; ?>
    
</div><!--/span9-->

<?php get_footer(); // Inclui o footer.php ?>
