<?php
/**
 * インクルード処理用関数
 */

if (is_file(__DIR__ . '/config.php')) {
    require_once __DIR__ . '/config.php';
}

// SP階層？
$SP_FLG = strpos(__DIR__, '/sp/') !== false;

// PCのcommonにyamlファイルがあるかのチェック
if ((!$SP_FLG and is_file(__DIR__ . '/seo.yaml')) or ($SP_FLG and is_file(__DIR__ . '/../../common/seo.yaml'))) {
    require_once 'Spyc.php'; // yamlライブラリ
    $data = spyc_load_file(($SP_FLG) ? __DIR__ . '/../../common/seo.yaml' : __DIR__ . '/seo.yaml');

    if (!is_array($data)) {
        exit('yaml file error');
    }

    foreach ($data['seo'] as $v) {
        if (strpos($_SERVER['REQUEST_URI'], $v['page']) !== false) {
            $SEO = $v;
            break;
        }
    }

    // 一致するのがなかったら
    if (!isset($SEO)) {
        $SEO = $data['default'];
    }

    define('SEO_TITLE', $SEO['title']);
    define('SEO_DESCRIPTION', $SEO['description']);
    define('SEO_KEYWORDS', $SEO['keywords']);
    define('SEO_H1', $SEO['h1']);
    unset($SEO, $data);
}

/**
 * sample code
 *
 * <title><?=SEO_TITLE?></title>
 * <meta name="description" content="<?=SEO_DESCRIPTION?>">
 * <meta name="Keywords" content="<?=SEO_KEYWORDS?>">
 */

// 相対パスを取得

// このサイトのＴＯＰ階層を抽出する（裏側のファイルのパスなどに使用）
$base_path = str_replace('/common', '', dirname(__FILE__));

// ドキュメントルート ディレクトリのパスを除去する
$inc_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $base_path) . '/';

// ディレクトリ名
$plc = basename(dirname($_SERVER['PHP_SELF']));

/**
 * 置換をすれば楽にパスが変更できる
 * href="../ → href="{$inc_path}
 * src="../ → src="{$inc_path}
 */

/**
 * ヘッダー用
 */
function DispHeader()
{
    global $inc_path;

    /**
     * variable functions
     * <h1>{$cname('SEO_H1')}</h1>
     */
    $cname = 'constant';

    $html = <<<EDIT
EDIT;

    // 内容を返す
    return $html;
}

/**
 * サイド
 */
function DispSide()
{
    global $inc_path;

    $html = <<<EDIT
EDIT;

    // 内容を返す
    return $html;
}

/**
 * フッター
 */
function DispFooter()
{
    global $inc_path;

    $html = <<<EDIT
EDIT;

    // 内容を返す
    return $html;

}

/**
 * 全ページに追加
 * headタグの開始の直後
 *
 * <head>
 * <?=DispAfterHeadStartTag()?>
 *
 */
function DispAfterHeadStartTag()
{
    global $inc_path;

    $html = <<<EDIT
EDIT;

    // 内容を返す
    return $html;
}

/**
 * 全ページに追加
 * headタグの閉じの直上
 *
 * <?=DispBeforeHeadEndTag()?>
 * </head>
 *
 */
function DispBeforeHeadEndTag()
{
    global $inc_path;

    $html = <<<EDIT
EDIT;

    // 内容を返す
    return $html;
}

/**
 * 全ページに追加
 * bodyタグの開始の直後
 *
 * <body>
 * <?=DispAfterBodyStartTag()?>
 *
 */
function DispAfterBodyStartTag()
{
    global $inc_path;

    $html = <<<EDIT
EDIT;

    // 内容を返す
    return $html;
}

/**
 * 全ページに追加
 * bodyタグの終了の直上
 *
 * <?=DispBeforeBodyEndTag()?>
 * </body>
 *
 */
function DispBeforeBodyEndTag()
{
    global $inc_path;

    $html = <<<EDIT
EDIT;

    // 内容を返す
    return $html;
}

