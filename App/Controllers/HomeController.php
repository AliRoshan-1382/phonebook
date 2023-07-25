<?php  

namespace App\Controllers;

use App\Models\Contact;

class HomeController{
    private $contacModel;
    public function __construct(){
        $this->contacModel = new Contact();
    }




    public function index()
    {
        global $request;
        $where = ['ORDER' => ["created_at" => "DESC"]];
        $search_keyword = $request->input('s');
        if (!is_null($search_keyword)) {
            $where['OR'] = [
                "name[~]" =>  $search_keyword,
                "mobile[~]" =>  $search_keyword,
                "email[~]" =>  $search_keyword,
            ];
        }

        $contacts = $this->contacModel->get('*' , $where);
        $data = [
            'contacts' => $contacts,
            'search_keyword' => $search_keyword
        ];
        view('home.index',$data);
    }
}


// $faker = \Faker\Factory::create();

// for ($i=0; $i < 1000; $i++) { 
//     $this->contacModel->create([
//         'name'=>$faker->name(),
//         'mobile'=>$faker->email(),
//         'email'=>$faker->phoneNumber()
//     ]);
// }
?>