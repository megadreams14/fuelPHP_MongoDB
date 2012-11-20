<?php
//Not found用
//routes.phpで設定されてる
class Controller_notfound extends Model_Common {

    //基本的にコレ以外は呼び出さないから作る必要なし
    public function action_index() {
        $this->template->title = 'Not found';
        $this->viewContent('notfound/index');
    }
}
?>