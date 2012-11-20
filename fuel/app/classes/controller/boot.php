<?php
//require_once APPPATH . 'classes/model/common.php';
class Controller_Boot extends Model_Common {

    public function action_index() {
        $this->context['data'] = null;
        $this->viewContent('boot/index');
    }

    public function action_boot() {
        $this->context['data']['demos'] = Model_Demo::find_all();
        $data['demos'] = Model_Demo::find_all();
//        $this->plus_js[] = 'my_boot.js';
        $this->php_js = 'boot/my_boot.js';
        var_dump($data);
        $this->viewContent('boot/boot','管理テスト');
    }
}
?>
