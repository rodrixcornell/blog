<?php
/** 
 * A configuração de base do WordPress
 *
 * Este ficheiro define os seguintes parâmetros: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, e ABSPATH. Pode obter mais informação
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} no Codex. As definições de MySQL são-lhe fornecidas pelo seu serviço de alojamento.
 *
 * Este ficheiro é usado para criar o script  wp-config.php, durante
 * a instalação, mas não tem que usar essa funcionalidade se não quiser. 
 * Salve este ficheiro como "wp-config.php" e preencha os valores.
 *
 * @package WordPress
 */

// ** Definições de MySQL - obtenha estes dados do seu serviço de alojamento** //
/** O nome da base de dados do WordPress */
define('DB_NAME', 'blog_treinaweb');

/** O nome do utilizador de MySQL */
define('DB_USER', 'root');

/** A password do utilizador de MySQL  */
define('DB_PASSWORD', 'xkpptrock1990');

/** O nome do serviddor de  MySQL  */
define('DB_HOST', 'localhost');

/** O "Database Charset" a usar na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O "Database Collate type". Se tem dúvidas não mude. */
define('DB_COLLATE', '');

/**#@+
 * Chaves Únicas de Autenticação.
 *
 * Mude para frases únicas e diferentes!
 * Pode gerar frases automáticamente em {@link https://api.wordpress.org/secret-key/1.1/salt/ Serviço de chaves secretas de WordPress.org}
 * Pode mudar estes valores em qualquer altura para invalidar todos os cookies existentes o que terá como resultado obrigar todos os utilizadores a voltarem a fazer login
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'x/_Vb!,3MpMoO3>,Dv+}=Jtwy`6yY%hx(aNLI~c_v`GGz]yzM$NYI3bZEOG?IKN/');
define('SECURE_AUTH_KEY',  '3dOE(<&]G[@/[]b6jfD/?xd}!fpiDV=T^%;Xrui 81!Gk4@D_g{KDsEx8|b>J<(.');
define('LOGGED_IN_KEY',    'Ws2.*D8l+A{,,(gILz%s!Yx|F-@x=$=kKjwJhP0KEFE5E h%MT7sk2z0Im,Yjrz)');
define('NONCE_KEY',        '}%rhJ@S6FO}iJ?EkmR3N?>cqZkB)OEY<F0&_I}2E2yllB W2{cPUD5R.tl1NQevS');
define('AUTH_SALT',        'QwM6Oc<hIle66]Y.SIbS/1vvq%ABAlT>=|Wn2Ed OxseN?4BNI%8;NNp1kE:(P+R');
define('SECURE_AUTH_SALT', 'u!Y:1^GchxmtT,|}u;JRK%jGC~l&.O:3EzZ:6Iy|$.K>lT=ItAVml;6[0VdPX5#~');
define('LOGGED_IN_SALT',   'V7`,^ %Lu0Zh2=E=O+6TuXRjQ1#w=&G$$w&P7;D-!Ufyz|%PkKW&Xj@idvHOeD+~');
define('NONCE_SALT',       'A12*d<m-=HOl1H1U.YfE2@zGzNtKd=!b*Oiuaaqk1CWKxTC>-nHpD+!vMMQk1=lx');

/**#@-*/

/**
 * Prefixo das tabelas de WordPress.
 *
 * Pode suportar múltiplas instalações numa só base de dados, ao dar a cada
 * instalação um prefixo único. Só algarismos, letras e underscores, por favor!
 */
$table_prefix  = 'wp_';

/**
 * Idioma de Localização do WordPress, Inglês por omissão.
 *
 * Mude isto para localizar o WordPress. Um ficheiro MO correspondendo ao idioma
 * escolhido deverá existir na directoria wp-content/languages. Instale por exemplo
 * pt_PT.mo em wp-content/languages e defina WPLANG como 'pt_PT' para activar o
 * suporte para a língua portuguesa.
 */
define('WPLANG', 'pt_PT');

/**
 * Para developers: WordPress em modo debugging.
 *
 * Mude isto para true para mostrar avisos enquanto estiver a testar.
 * É vivamente recomendado aos autores de temas e plugins usarem WP_DEBUG
 * no seu ambiente de desenvolvimento.
 */
define('WP_DEBUG', false);

/* E é tudo. Pare de editar! */

/** Caminho absoluto para a pasta do WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Define as variáveis do WordPress e ficheiros a incluir. */
require_once(ABSPATH . 'wp-settings.php');
