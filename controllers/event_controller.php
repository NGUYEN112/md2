<?php

include_once("controllers/base_controller.php");
require_once("model/category.php");
require_once("model/event.php");


class EventController extends BaseController {
    public function index() {
        $this->render('event','index');
    }

    public function eventlist() {
        $data = Event::all();

        $viewData = array("event" => $data);

        $this->render('event', 'eventlist', $viewData);
    }

    public function regist() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->sendRegist();
        } else {
            $this->showRegistPage();
        }
    }

    public function edit()
    {
        //kiem tra neu request  la post thi goi ham luu
        //con lai tra ve giao dien chinh sua
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->updateRegist();
        } else {
            $this->showEditPage();
        }
        // $this->render('products', 'edit');
    }

    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //lay id phan tu tu url
            $id = $_GET["id"];

            $event = Event::find($id);
            $event->destroy();

            //dieu huong ve trang index
            header("Location:?controller=event&action=eventlist");
        }
    }

    protected function sendRegist() {
        //lay data tu form
        $name = $_POST["name"];
        $number_ticket = $_POST["number_ticket"];
        $ticket_price = $_POST["ticket_price"];
        $date = $_POST["date"];
        $start_time = $_POST["start_time"];
        $email = $_POST["email"];
        $category_id = $_POST["category_id"];
        $description = $_POST["description"];

        //khoi tao doi tuong product
        $event = new Event();
        $event->name = $name;
        $event->number_ticket = $number_ticket;
        $event->ticket_price = $ticket_price;
        $event->date = $date;
        $event->start_time = $start_time;
        $event->email = $email;
        $event->category_id = $category_id;
        $event->description = $description;

        $storedSuccesful = $event->save();
        if ($storedSuccesful) {
            $_SESSION["message"] = "Bạn đã đăng kí thành công!";
        }
        header("Location:?controller=event&action=eventlist");
    }

    protected function showRegistPage() {
        //lay it
        // $id = $_GET["id"];

        // //lay thong tin san pham
        // $regist = Regist::find($id);
        // $categories = Category::all();

        // $viewData = array(
        //     "regist" => $regist,
        //     "categories" => $categories
        // );
        $this->render('event','regist');
    }

    protected function updateRegist(){
        $id = $_GET["id"];
        $event = Event::find($id);
        $event->name = $_POST["name"];
        $event->category_id = $_POST["category_id"];
        $event->number_ticket = $_POST["number_ticket"];
        $event->ticket_price = $_POST["ticket_price"];
        $event->date = $_POST["date"];
        $event->start_time = $_POST["start_time"];
        $event->email = $_POST["email"];
        $event->description = $_POST["description"];

        $storedSuccesful = $event->save();
        if ($storedSuccesful) {
            $_SESSION["message"] = "Bạn đã sửa thành công!";
        }

        header("Location:?controller=event&action=eventlist");
    }

    protected function showEditPage(){
               //lay it
               $id = $_GET["id"];

               //lay thong tin san pham
               $event = Event::find($id);
               $categories = Category::all();
       
               $viewData = array(
                   "regist" => $event,
                   "categories" => $categories
               );
       
       
               $this->render('event','edit', $viewData);
    }
    
}

?>