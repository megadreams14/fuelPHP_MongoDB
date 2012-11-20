<?php

//共通メソッド
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Model_Common extends \Controller_Template {

    //Viewに渡すデータ群
    protected $context;
    //追加で読み込むCSSファイル群(静的ファイル)
    protected $plus_css;
    //追加で読み込むJavaScriptファイル群(静的ファイル)
    protected $plus_js;
    //PHPとJavaScriptで連携する(値を受け渡す)必要があるファイル
    protected $php_js;

    //下準備
    public function before() {
        //親クラスのbeforeを呼び出して, $this->templateを使えるようにしてもらう
        parent::before();
        //その他のinitialze
        $this->context = array();
        $this->plus_css = array();
        $this->plus_js = array();
        $this->php_js = null;
    }

    protected function viewContent($path = null) {
        //$this->template->VARに値を入れておくとviewでも値が受け取れる
        //header, footerに値を入れたい時は同じようにしましょう
        $php_js = null;
        
        //引数$pathが空の場合には何も出来ないのでERROR出して止まる
        if (isset($path) !== true) {
            echo '$path is NULL, confirm viewContent !!';
            exit();
        }

        //Controllerでtitleが指定されていない場合にはModel_Constに書いてあるTITLEを使う
        if (isset($this->template->title) !== true) {
            $this->template->title = Model_Const::TITLE;
        }

        //Viewに受け渡すデータを定義する
        if (isset($this->context[Model_Const::DATA]) === true) {
            $this->template->view_data = $this->context[Model_Const::DATA];
        } else {
            $this->template->view_data = null;
        }

        //PHPとJavaScriptを連携させたものが必要な場合はそれを読み込む(Viewとして読み込んで, footerでechoする)
        if (isset($this->php_js) === true) {
            $php_js = \View::forge($this->php_js, array());
        }

        //Viewのtemplate.phpにそれぞれ渡す
        $this->template->content = \View::forge($path, array('view_data' => $this->template->view_data, 'title' => $this->template->title, 'menu' => \View::forge('tmpl/menu', array())));
        $this->template->header = \View::forge('tmpl/header', array('title' => $this->template->title, 'plus_css' => $this->plus_css));
        $this->template->footer = \View::forge('tmpl/footer', array('copy_year' => $this->get_copyright_year(), 'plus_js' => $this->plus_js, 'php_js' => $php_js));

//        $this->template = Response::forge
//                (
//                    (
//                        \View::forge
//                        (
//                            $path,
//                            array
//                            (
//                                'data' => $this->context,
//                                'title' => $title
//                            )
//                         )
//                    )
//                );
    }

    public function after($response) {
        //親クラスのafterを呼び出して, responseインスタンスをもらう
        parent::after($response);
        $response = parent::after($response);
        return $response;
    }

    protected function redirect_page($redirect_page = null) {
        if ($redirect_page !== null) {
            Response::redirect($redirect_page);
        } else {
            Response::redirect('notfound');
        }
        exit();
    }

    /*
     * commonでしか使わない奴だからprivateでいいよね
     * &copyの次に書く年を決定する
     */

    private function get_copyright_year() {
        $ret = '';
        $now_year = intval(date('Y'));
        if ($now_year > Model_Const::NOW_YEAR_INT) {
            $ret = Model_Const::NOW_YEAR_STR . ' - ' . $now_year;
        } else {
            $ret = '' . $now_year;
        }
        return $ret;
    }

}

?>
