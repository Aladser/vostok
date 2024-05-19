<?php

namespace ZLabs;

use Bitrix\Main\Application;
use Bitrix\Main\Context;
use ZLabs\Frontend\MustacheSingleton;

/** @todo сделать singleton */
class App
{
    const INCLUDE_PATH = '/local/include/';
    const ASSETS_PATH = '/local/assets/local/';
    const DEFAULT_IMAGE_PATH = '/local/assets/images/logo.svg';

    public static $app;
    public static $docRoot;
    public static $mustache;
    public static $cmain;
    public static $context;

    public static function init()
    {
        self::$app = Application::getInstance();
        self::$docRoot = Application::getDocumentRoot();
        self::$mustache = MustacheSingleton::getInstance();
        self::$cmain =& $GLOBALS['APPLICATION'];
        self::$context = Context::getCurrent();
    }

    public static function Render($template, $context = [])
    {
        echo self::$mustache->render($template, $context);
    }

    public static function CMain()
    {
        return self::$cmain;
    }

    public static function inlineJs(array $paths = [])
    {
        $cPaths = self::assetsFullPathCompile($paths, '.js');
        self::$cmain->SetPageProperty('inlineJs', \implode(';', $cPaths));
    }

    protected static function assetsFullPathCompile(array $paths, string $ext)
    {
        foreach ($paths as $key => $path) {
            if (count(explode('/', $path)) === 1) {
                $paths[$key] = self::ASSETS_PATH . $path . '/' . $path . $ext;
            }
        }

        return $paths;
    }

    // @todo ввести альтернативный синтаксис (передавать строку через , bundle ?)

    public static function asyncJs(array $paths = [])
    {
        $cPaths = self::assetsFullPathCompile($paths, '.js');
        self::$cmain->SetPageProperty('asyncJs', \implode(';', $cPaths));
    }

    public static function deferredJs(array $paths = [])
    {
        $cPaths = self::assetsFullPathCompile($paths, '.js');
        self::$cmain->SetPageProperty('deferredJs', \implode(';', $cPaths));
    }

    public static function deferredCss(array $paths = [])
    {
        $cPaths = self::assetsFullPathCompile($paths, '.css');
        self::$cmain->SetPageProperty('deferredCss', \implode(';', $cPaths));
    }

    public static function inlineCss(array $paths = [])
    {
        $cPaths = self::assetsFullPathCompile($paths, '.css');
        self::$cmain->SetPageProperty('inlineCss', \implode(';', $cPaths));
    }

    /**
     * По умолчанию подключает файл /local/include/ . $path . '.php'
     *
     * @param string $path
     * @param bool $includePath
     * @param array $params
     * @param string $hideIcons
     * @return mixed
     */
    public static function Include(string $path, bool $includePath = true, array $params = [], string $hideIcons = 'Y')
    {
        if ($includePath) {
            $path = self::includePath($path, false);
        }

        $arParams = array_merge(
            array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => $path,
                "AREA_FILE_RECURSIVE" => "N",
                "AREA_FILE_SUFFIX" => "",
                "EDIT_TEMPLATE" => "",
                "SITE_LANG" => self::$context->getLanguage()
            ),
            $params
        );

        self::$cmain->IncludeComponent(
            "bitrix:main.include",
            "",
            $arParams,
            false,
            [
                "HIDE_ICONS" => $hideIcons
            ]
        );
    }

    /**
     * IncludePath in local/include
     * @param $componentPath
     * @param boolean $absPath
     * @param string $ext
     * @return string
     */
    public static function includePath($componentPath, $absPath = true, $ext = '.php')
    {
        return ($absPath ? self::$docRoot : '') . self::INCLUDE_PATH . $componentPath . $ext;
    }

    /**
     * Установка свойств страницы [Ключ - Значение]
     *
     * @param array $props
     * @return void
     */
    public static function setPageProperties(array $props)
    {
        foreach ($props as $key => $value) {
            self::$cmain->SetPageProperty($key, $value);
        }
    }
}
