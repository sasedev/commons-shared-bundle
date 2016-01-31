<?php

namespace Sasedev\Commons\SharedBundle\Controller;

use Gaufrette\Adapter\Cache as CacheAdapter;
use Gaufrette\Adapter\Local as LocalAdapter;
use Gaufrette\Filesystem;
use Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\CharsetMeta;
use Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\Name\Author;
use Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialLinks\Icon;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Href;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class VfsController extends BaseController
{



	/**
	 * Constructor
	 */
	public function __construct()
	{
		$metaCharset = new CharsetMeta('utf-8');

		$this->addHeadMeta($metaCharset);

		$metaAuthor = new Author('SASEdev');

		$this->addHeadMeta($metaAuthor);


		$favicon = new Icon(new Href('favicon.ico', true));

		$this->addHeadLink($favicon);

		$this->addTwigVar('menu_active', 'home');

	}

	/**
	 * Get Virtual Files Action
	 *
	 * @param string $file
	 *
	 * @throws NotFoundHttpException
	 * @return Response
	 *
	 * @Route(name="sasedev_commons_shared_vfs_files", path="/Vfs{file}", requirements={"file" = ".*"}, defaults={"file" = null})
	 */
	public function fileAction($file = null)
	{
		if (null == $file) {
			return $this->redirect($this->generateUrl('sasedev_commons_shared_vfs_files', array('file' => '/')));
		}

		$cacheDirectory = $this->getParameter('adapter_cache_dir');
		$local = new LocalAdapter($cacheDirectory, true);
		$localadapter = new LocalAdapter($this->getParameter('adapter_files'));
		$adapter = new CacheAdapter($localadapter, $local, 3600);

		$fsAvatar = new Filesystem($adapter);
		if ($this->endswith($file, '/')) {
			if ($fsAvatar->has($file)) {
				$this->setPageTitle($this->translate('indexof',
					array('%dir%' => $this->generateUrl('sasedev_commons_shared_vfs_files', array('file' => $file)))));

				$this->addTwigVar('pagetitle', $this->translate('indexof_raw',
					array('%dir%' => $this->generateUrl('sasedev_commons_shared_vfs_files', array('file' => $file)))));

				$path = substr($file, 1);
				$fs = $fsAvatar->listKeys($path);

				$listfiles = array();
				foreach ($fs['dirs'] as $key) {
					$fulldir = $key . "/";
					$dirname = $key;
					if (substr($key, 0, strlen($path)) == $path) {
						$dirname = substr($dirname, strlen($path));
					}
					if (!strstr($dirname, "/")) {
						$listfiles[$fulldir] = $dirname;
					}
				}
				foreach ($fs['keys'] as $key) {
					$fullfile = $key;
					$filename = $key;
					if (substr($key, 0, strlen($path)) == $path) {
						$filename = substr($filename, strlen($path));
					}
					if (!strstr($filename, "/")) {
						$listfiles[$fullfile] = $filename;
					}
				}
				$this->addTwigVar('fs', $listfiles);

				return $this->render('SasedevCommonsSharedBundle:Vfs:list_files.html.twig', $this->getTwigVars());
			} else {
				throw new NotFoundHttpException();
			}
		}
		if ($fsAvatar->has($file)) {
			if ($fsAvatar->getAdapter()->isDirectory($file)) {
				$file .= "/";

				return $this->redirect($this->generateUrl('sasedev_commons_shared_vfs_files', array('file' => $file)));
			}
			$reqFile = $fsAvatar->get($file);
			$response = new Response();
			$response->headers->set('Content-Type', 'binary');
			$response->setContent($reqFile->getContent());

			return $response;
		} else {
			throw new NotFoundHttpException();
		}
	}

	/**
	 * Get Temporary Virtual Files Action
	 *
	 * @param string $file
	 *
	 * @throws NotFoundHttpException
	 * @return Response
	 *
	 * @Route(name="sasedev_commons_shared_vfs_tmp_files", path="/tmpVfs{file}", requirements={"file" = ".*"}, defaults={"file" = null})
	 */
	public function tempfileAction($file = null)
	{
		if (null == $file) {
			return $this->redirect($this->generateUrl('sasedev_commons_shared_vfs_tmp_files', array('file' => '/')));
		}

		$cacheDirectory = $this->getParameter('adapter_cache_dir');
		$local = new LocalAdapter($cacheDirectory, true);
		$localadapter = new LocalAdapter($this->getParameter('adapter_tmp_files'));
		$adapter = new CacheAdapter($localadapter, $local, 3600);

		$fsAvatar = new Filesystem($adapter);
		if ($this->endswith($file, '/')) {
			if ($fsAvatar->has($file)) {
				$this->setPageTitle($this->translate('indexof',
					array('%dir%' => $this->generateUrl('sasedev_commons_shared_vfs_tmp_files', array('file' => $file)))));

				$this->addTwigVar('pagetitle', $this->translate('indexof_raw',
					array('%dir%' => $this->generateUrl('sasedev_commons_shared_vfs_tmp_files', array('file' => $file)))));

				$path = substr($file, 1);
				$fs = $fsAvatar->listKeys($path);

				$listfiles = array();
				foreach ($fs['dirs'] as $key) {
					$fulldir = $key . "/";
					$dirname = $key;
					if (substr($key, 0, strlen($path)) == $path) {
						$dirname = substr($dirname, strlen($path));
					}
					if (!strstr($dirname, "/")) {
						$listfiles[$fulldir] = $dirname;
					}
				}
				foreach ($fs['keys'] as $key) {
					$fullfile = $key;
					$filename = $key;
					if (substr($key, 0, strlen($path)) == $path) {
						$filename = substr($filename, strlen($path));
					}
					if (!strstr($filename, "/")) {
						$listfiles[$fullfile] = $filename;
					}
				}
				$this->addTwigVar('fs', $listfiles);

				return $this->render('SasedevCommonsSharedBundle:Vfs:list_temp_files.html.twig', $this->getTwigVars());
			} else {
				throw new NotFoundHttpException();
			}
		}
		if ($fsAvatar->has($file)) {
			if ($fsAvatar->getAdapter()->isDirectory($file)) {
				$file .= "/";

				return $this->redirect($this->generateUrl('sasedev_commons_shared_vfs_tmp_files', array('file' => $file)));
			}
			$reqFile = $fsAvatar->get($file);
			$response = new Response();
			$response->headers->set('Content-Type', 'binary');
			$response->setContent($reqFile->getContent());

			return $response;
		} else {
			throw new NotFoundHttpException();
		}
	}
}