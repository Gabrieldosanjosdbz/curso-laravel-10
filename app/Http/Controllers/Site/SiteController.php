<?php 

namespace App\Http\Controllers\Site; // Um namespace no PHP é como um sobrenome para suas classes e funções. É como se você estivesse organizando suas coisas em diferentes gavetas. Quando você diz que algo está no namespace "App\Http\Controllers\Site"

class SiteController{
    public function contact(){
        return view('site/contact');
    }
}

