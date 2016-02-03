<?php

namespace Sasedev\Commons\SharedBundle\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Bundle\FrameworkBundle\Templating\DelegatingEngine;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Validator\Validator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sasedev\Commons\SharedBundle\HtmlModel\Tags\Meta;
use Sasedev\Commons\SharedBundle\HtmlModel\Tags\Link;
use Sasedev\Commons\SharedBundle\HtmlModel\Tags\Script;
use Sasedev\Commons\SharedBundle\HtmlModel\Tags\Style;

/**
 * The Default BaseController
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class BaseController extends Controller
{

	/**
	 *
	 * @var array $twig_vars
	 */
	private $twig_vars = array();

	/**
	 *
	 * @var array
	 */
	private $head_metas = array();

	/**
	 *
	 * @var array
	 */
	private $head_links = array();

	/**
	 *
	 * @var array $head_scripts
	 */
	private $head_scripts = array();

	/**
	 *
	 * @var array $head_scripts
	 */
	private $head_styles = array();

	/**
	 *
	 * @var string $browser_page_title
	 */
	private $browser_page_title;

	/**
	 *
	 * @var string $page_title
	 */
	private $page_title;

	/**
	 *
	 * @var array $body_scripts
	 */
	private $body_scripts = array();

	/**
	 * Get Monolog Logger
	 *
	 * @return Logger
	 *
	 * @throws \LogicException If MonologBundle is not available
	 */
	public function getLogger()
	{

		if (!$this->container->has('logger')) {
			throw new \LogicException('The MonologBundle is not registered in your application.');
		}

		return $this->container->get('logger');

	}

	/**
	 * Get Swiftmail Mailer
	 *
	 * @return Swift_Mailer
	 *
	 * @throws \LogicException If SwiftmailerBundle is not available
	 */
	public function getMailer()
	{

		if (!$this->container->has('mailer')) {
			throw new \LogicException('The SwiftmailerBundle is not registered in your application.');
		}

		return $this->container->get('mailer');

	}

	/**
	 * Get symfony router
	 *
	 * @return Router
	 */
	public function getRouter()
	{

		return $this->container->get('router');

	}

	/**
	 * Get Request
	 *
	 * @return Request
	 */
	public function getRequest()
	{

		return $this->container->get('request_stack')->getCurrentRequest();

	}

	/**
	 * Get Session
	 *
	 * @return Session
	 */
	public function getSession()
	{

		return $this->container->get('session');

	}

	/**
	 * Get the translator service
	 *
	 * @return Translator
	 */
	public function getTranslator()
	{

		return $this->container->get('translator');

	}

	/**
	 * Get security context
	 *
	 * @return TokenStorage
	 */
	public function getSecurityTokenStorage()
	{

		return $this->container->get('security.token_storage');

	}

	/**
	 * Get security context
	 *
	 * @return AuthorizationChecker
	 */
	public function getSecurityAuthorizationChecker()
	{

		return $this->container->get('security.authorization_checker');

	}

	/**
	 * Get validator service
	 *
	 * @return RecursiveValidator
	 */
	public function getValidator()
	{

		return $this->container->get('validator');

	}

	/**
	 * Get templating service
	 *
	 * @return DelegatingEngine
	 */
	public function getTemplating()
	{

		return $this->container->get('templating');

	}

	/**
	 * Get referer
	 *
	 * @return string
	 */
	public function getReferer()
	{

		return $this->getRequest()->headers->get('referer');

	}

	/**
	 * Get Doctrine Entity Manager
	 *
	 * @return ObjectManager
	 */
	public function getEntityManager($name = null)
	{

		$entityManager = $this->getDoctrine()->getManager($name);
		if (!$entityManager->isOpen()) {
			$entityManager = $entityManager->create($entityManager->getConnection(), $entityManager->getConfiguration());
		}

		return $entityManager;

	}

	/**
	 * Translates the given message.
	 *
	 * @param string $id
	 * @param array $parameters
	 * @param string $domain
	 * @param string $locale
	 *
	 * @return string
	 */
	public function translate($id, $parameters = array(), $domain = 'messages', $locale = null)
	{

		return $this->getTranslator()->trans($id, $parameters, $domain, $locale);

	}

	/**
	 * Send a message by mail
	 * The return value is the number of recipients who were accepted for
	 * delivery.
	 *
	 * @param Swift_Mime_Message $message
	 *
	 * @return integer
	 */
	public function sendmail($message)
	{

		return $this->getMailer()->send($message);

	}

	/**
	 * Check if a string starts with a prefix
	 *
	 * @param string $string
	 * @param string $prefix
	 *
	 * @return boolean
	 */
	public function startswith($string, $prefix)
	{

		return strpos($string, $prefix) === 0;

	}

	/**
	 * Check if a string ends with a suffix
	 *
	 * @param string $string
	 * @param string $suffix
	 *
	 * @return boolean
	 */
	public function endswith($string, $suffix)
	{

		$strlen = strlen($string);
		$testlen = strlen($suffix);
		if ($testlen > $strlen) {
			return false;
		}

		return substr_compare($string, $suffix, -$testlen) === 0;

	}

	/**
	 * Normalize a string
	 *
	 * @param string $string
	 *
	 * @return string
	 */
	public function normalize($string)
	{

		$table = array(
			'Š' => 'S',
			'š' => 's',
			'Ð' => 'Dj',
			'Ž' => 'Z',
			'ž' => 'z',
			'C' => 'C',
			'c' => 'c',
			'C' => 'C',
			'c' => 'c',
			'À' => 'A',
			'Á' => 'A',
			'Â' => 'A',
			'Ã' => 'A',
			'Ä' => 'A',
			'Å' => 'A',
			'Æ' => 'A',
			'Ç' => 'C',
			'È' => 'E',
			'É' => 'E',
			'Ê' => 'E',
			'Ë' => 'E',
			'Ì' => 'I',
			'Í' => 'I',
			'Î' => 'I',
			'Ï' => 'I',
			'Ñ' => 'N',
			'Ò' => 'O',
			'Ó' => 'O',
			'Ô' => 'O',
			'Õ' => 'O',
			'Ö' => 'O',
			'Ø' => 'O',
			'Ù' => 'U',
			'Ú' => 'U',
			'Û' => 'U',
			'Ü' => 'U',
			'Ý' => 'Y',
			'Þ' => 'B',
			'ß' => 'Ss',
			'à' => 'a',
			'á' => 'a',
			'â' => 'a',
			'ã' => 'a',
			'ä' => 'a',
			'å' => 'a',
			'æ' => 'a',
			'ç' => 'c',
			'è' => 'e',
			'é' => 'e',
			'ê' => 'e',
			'ë' => 'e',
			'ì' => 'i',
			'í' => 'i',
			'î' => 'i',
			'ï' => 'i',
			'ð' => 'o',
			'ñ' => 'n',
			'ò' => 'o',
			'ó' => 'o',
			'ô' => 'o',
			'õ' => 'o',
			'ö' => 'o',
			'ø' => 'o',
			'ù' => 'u',
			'ú' => 'u',
			'û' => 'u',
			'ý' => 'y',
			'ý' => 'y',
			'þ' => 'b',
			'ÿ' => 'y',
			'R' => 'R',
			'r' => 'r'
		);

		return strtr($string, $table);

	}

	/**
	 * Get $twig_vars
	 *
	 * @return array
	 */
	public function getTwigVars()
	{

		return $this->twig_vars;

	}

	/**
	 * Set $twig_vars;
	 *
	 * @param array $twig_vars
	 *
	 * @return BaseController $this
	 */
	public function setTwigVars($twig_vars)
	{

		$this->twig_vars = $twig_vars;

		return $this;

	}

	/**
	 * Add $twig_var;
	 *
	 * @param string $name
	 *
	 * @param mixed $value
	 *
	 * @return BaseController $this
	 */
	public function addTwigVar($name, $value = null)
	{

		$this->twig_vars[$name] = $value;

		return $this;

	}

	/**
	 * Get $head_metas
	 *
	 * @return array
	 */
	public function getHeadMetas()
	{

		return $this->head_metas;

	}

	/**
	 * Set $head_metas
	 *
	 * @param array $head_metas
	 *
	 * @return BaseController $this
	 */
	public function setHeadMetas($head_metas)
	{

		$this->head_metas = $head_metas;

		$this->twig_vars['head_metas'] = $this->head_metas;

		return $this;

	}

	/**
	 * Add $head_meta;
	 *
	 * @param Meta $head_meta
	 *
	 * @return BaseController $this
	 */
	public function addHeadMeta(Meta $head_meta)
	{

		$this->head_metas[] = $head_meta;

		$this->twig_vars['head_metas'] = $this->head_metas;

		return $this;

	}

	/**
	 * Get $head_links
	 *
	 * @return array
	 */
	public function getHeadLinks()
	{

		return $this->head_links;

	}

	/**
	 * Set $head_links
	 *
	 * @param array $head_links
	 *
	 * @return BaseController $this
	 */
	public function setHeadLinks($head_links)
	{

		$this->head_links = $head_links;

		$this->twig_vars['head_links'] = $this->head_links;

		return $this;

	}

	/**
	 * Add $head_link;
	 *
	 * @param Link $head_link
	 *
	 * @return BaseController $this
	 */
	public function addHeadLink(Link $head_link)
	{

		$this->head_links[] = $head_link;

		$this->twig_vars['head_links'] = $this->head_links;

		return $this;

	}

	/**
	 * Get $head_scripts
	 *
	 * @return array
	 */
	public function getHeadScripts()
	{

		return $this->head_scripts;

	}

	/**
	 * Set $head_scripts
	 *
	 * @param array $head_scripts
	 *
	 * @return BaseController $this
	 */
	public function setHeadScripts($head_scripts)
	{

		$this->head_scripts = $head_scripts;

		$this->twig_vars['head_scripts'] = $this->head_scripts;

		return $this;

	}

	/**
	 * Add $head_script;
	 *
	 * @param Script $head_script
	 *
	 * @return BaseController $this
	 */
	public function addHeadScript(Script $head_script)
	{

		$this->head_scripts[] = $head_script;

		$this->twig_vars['head_scripts'] = $this->head_scripts;

		return $this;

	}

	/**
	 * Get $head_styles
	 *
	 * @return array
	 */
	public function getHeadStyles()
	{

		return $this->head_styles;

	}

	/**
	 * Set $head_styles
	 *
	 * @param array $head_styles
	 *
	 * @return BaseController $this
	 */
	public function setHeadStyles($head_styles)
	{

		$this->head_styles = $head_styles;

		$this->twig_vars['head_styles'] = $this->head_styles;

		return $this;

	}

	/**
	 * Add $head_style;
	 *
	 * @param Style $head_style
	 *
	 * @return BaseController $this
	 */
	public function addHeadStyle(Style $head_style)
	{

		$this->head_styles[] = $head_style;

		$this->twig_vars['head_styles'] = $this->head_styles;

		return $this;

	}

	/**
	 *
	 * @return string
	 */
	public function getBrowserPageTitle()
	{

		return $this->browser_page_title;

	}

	/**
	 *
	 * @param string $page_title
	 */
	public function setBrowserPageTitle($title)
	{

		$this->browser_page_title = $title;

		$this->twig_vars['browser_page_title'] = $this->browser_page_title;

		return $this;

	}

	/**
	 *
	 * @return string
	 */
	public function getPageTitle()
	{

		return $this->page_title;

	}

	/**
	 *
	 * @param string $page_title
	 */
	public function setPageTitle($title)
	{

		$this->page_title = $title;

		$this->twig_vars['page_title'] = $this->page_title;

		return $this;

	}

	/**
	 * Get $body_scripts
	 *
	 * @return array
	 */
	public function getBodyScripts()
	{

		return $this->body_scripts;

	}

	/**
	 * Set $body_scripts
	 *
	 * @param array $body_scripts
	 *
	 * @return BaseController $this
	 */
	public function setBodyScripts($body_scripts)
	{

		$this->body_scripts = $body_scripts;

		$this->twig_vars['body_scripts'] = $this->body_scripts;

		return $this;

	}

	/**
	 * Add $body_script;
	 *
	 * @param Script $body_script
	 *
	 * @return BaseController $this
	 */
	public function addBodyScript(Script $body_script)
	{

		$this->body_scripts[] = $body_script;

		$this->twig_vars['body_scripts'] = $this->body_scripts;

		return $this;

	}

}

