<?php


class Event
{
    public $id;
    public $name;
    public $number_ticket;
    public $ticket_price;
    public $date;
    public $start_time;
    public $email;
    public $category_id;
    public $description;

    public $category;


    //trả về mảng các đối tượng product
    static function all()
    {
        $sql = "SELECT 
        t1.*,
        t2.name as category
         FROM case_study.regist t1
         INNER JOIN categories t2
         ON t1.category_id = t2.id";

        $smpt = Dbh::getInstance()->prepare($sql);
        $smpt->execute();

        //kiểu dữ liệu là mảng của các mảng liên kết
        $rawData = $smpt->fetchAll();

        //chuyển đổi mảng liên kết thành mảng của các product
        $list = [];

        foreach ($rawData as $row) {
            $entity = new Event();

            $entity->id = $row["id"];
            $entity->name = $row["name"];
            $entity->number_ticket = $row["number_ticket"];
            $entity->ticket_price = $row["ticket_price"];
            $entity->date = $row["date"];
            $entity->start_time = $row["start_time"];
            $entity->date = $row["date"];
            $entity->email = $row["email"];
            $entity->description = $row["description"];
            $entity->category_id = $row["category_id"];

            $entity->category = $row["category"];


            $list[] = $entity;
        }

        //tra ve mang cac phan tu event
        return $list;
    }

    //tra ve doi tuong product  
    static function find($id)
    {
        $sql = "SELECT * FROM regist WHERE id = $id";

        $smpt = Dbh::getInstance()->prepare($sql);
        $smpt->execute();

        $rawData = $smpt->fetch();

        $event = new Event();
        $event->id = $rawData["id"];
        $event->name = $rawData["name"];
        $event->number_ticket = $rawData["number_ticket"];
        $event->ticket_price = $rawData["ticket_price"];
        $event->date = $rawData["date"];
        $event->start_time = $rawData["start_time"];
        $event->email = $rawData["email"];
        $event->description = $rawData["description"];
        $event->category_id = $rawData["category_id"];

        return $event;
    }

    //luu thuc the product vao csdl
    public function save()
    {
        $sql = "INSERT INTO regist(
                id,name,number_ticket,ticket_price,date,start_time,email,description,category_id    
                )   
                VALUE(?,?,?,?,?,?,?,?,?)
                ON DUPLICATE KEY UPDATE
                name=?,
                number_ticket=?,
                ticket_price=?,
                date=?,
                start_time=?,
                email=?,
                description=?,
                category_id=?
            ";

        $smpt = Dbh::getInstance()->prepare($sql);
        return $smpt->execute(
            [
                $this->id,
                $this->name,
                $this->number_ticket,
                $this->ticket_price,
                $this->date,
                $this->start_time,
                $this->email,
                $this->description,
                $this->category_id,

                $this->name,
                $this->number_ticket,
                $this->ticket_price,
                $this->date,
                $this->start_time,
                $this->email,
                $this->description,
                $this->category_id
            ]
        );
    }
    public function destroy()
    {
        $db = Dbh::getInstance();
        $req = $db->prepare("DELETE FROM regist WHERE id = $this->id");
        $req->execute();
    }
}
