<?php  

namespace App\Controllers;

use App\Models\Contact;
use App\Utilities\Validation;
use GrahamCampbell\ResultType\Success;

class ContactController{
    private $contacModel;
    public function __construct(){
        $this->contacModel = new Contact();
    }




    public function add()
    {
        global $request;
        // // var_dump($request);
        // $a = $request->input('name');
        // var_dump($a);
        $data['alreadyExists'] = false;
        $count = $this->contacModel->count(['mobile'=>$request->input('mobile')]);
        if ($count) {
            $data['alreadyExists'] = true;
            view_die('contact.add-result',$data);
        }  
        if (!Validation::is_valid_email($request->input('email'))) {
            $data = ['success' => false , 'message'=>'Invalid Email Address'];
            view_die('contact.add-result',$data);
        }
        $contact_id = $this->contacModel->create([
            'name'=>$request->input('name'),
            'mobile'=>$request->input('mobile'),
            'email'=>$request->input('email')
        ]);
        $data['contact_id'] = $contact_id;
        $data['success'] = true;
        $data['message'] = "Contact with id $contact_id Created Successfully";   

        view('contact.add-result',$data);
    }

    public function delete()
    {
        global $request;
        // var_dump($request);
        $id = $request->get_route_param('id');
        
        $data['deleted_count'] = $this->contacModel->delete(['id' => $id]);
        
        view('contact.delete-result',$data);
    }
}
?>