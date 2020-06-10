<?php
class Home extends Controller {
    public function index($name=''){
        $user=$this->model('User');
        $user->name=$name;
        $this->view('Home/index',['name'=>$user->name]);
        User::find(1)->username;
    }
}