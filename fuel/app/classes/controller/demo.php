<?php

//require_once APPPATH . 'classes/model/common.php';
//contentsディレクトリを作って全部まとめる場合には, contentsディレクトリの内部は全てnamespace Contents;の記述が必須
//namespace Contents;

class Controller_Demo extends Model_Common {

    const COLLECTION_NAME = 'demos';

    public function action_index() {
        $this->template->title = "Demos";
        $this->context[Model_Const::DATA]['demos'] = Model_Demo::find_all();
        $this->plus_js[] = 'my_demo.js';
        $this->php_js = 'demo/my_demo.js';
        $this->viewContent('demo/index');
//		$this->template->content = View::forge('demo/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('Demo');

        $mongodb = \Mongo_Db::instance();
        $data['demo'] = $mongodb->get_view_datas($mongodb, Controller_Demo::COLLECTION_NAME, $id);

//		$data['demo'] = Model_Demo::find_by_pk($id);

        $this->template->title = "Demo";
        $this->context[Model_Const::DATA] = $data;
        $this->viewContent('demo/view');
//        $this->template->content = View::forge('demo/view', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Demo::validate('create');

            if ($val->run()) {
                $demo = Model_Demo::forge(array(
                            'id'   => Input::post('id'),
                            'name' => Input::post('name'),
                            'data' => Input::post('data'),
                        ));

                if ($demo and $demo->save()) {
                    Session::set_flash('success', 'Added demo #' . $demo->id . '.');
                    Response::redirect('demo');
                } else {
                    Session::set_flash('error', 'Could not save demo.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Demos";
//        $this->context['data'] = null;
        $this->viewContent('demo/create');
//        $this->template->content = View::forge('demo/create');
    }

    public function action_edit($id = null) {
        is_null($id) and Response::redirect('Demo');

        $demo = Model_Demo::find_one_by_id($id);

        if (Input::method() == 'POST') {
            $val = Model_Demo::validate('edit');

            if ($val->run()) {
                $demo->id = Input::post('id');
                $demo->name = Input::post('name');
                $demo->data = Input::post('data');

                if ($demo->save()) {
                    Session::set_flash('success', 'Updated demo #' . $id);
                    Response::redirect('demo');
                } else {
                    Session::set_flash('error', 'Nothing updated.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->set_global('demo', $demo, false);
        $this->template->title = "Demos";
        $this->context[Model_Const::DATA] = $demo;
        $this->viewContent('demo/edit');
//        $this->template->content = View::forge('demo/edit');
    }

    public function action_delete($id = null) {
        if ($demo = Model_Demo::find_one_by_id($id)) {
            $demo->delete();

            Session::set_flash('success', 'Deleted demo #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete demo #' . $id);
        }

        Response::redirect('demo');
    }

}