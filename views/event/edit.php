<link rel="stylesheet" href="/assets/styles/event-style.css">
<form class="container" method="POST">

    <div class="row">
        <div id="right_form_col" class="col-md-4">
            <div class="form-group">
                <label for="exampleFormControlInput1">Tiêu đề sự kiện</label>
                <input value="<?php echo $regist->name?>" type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Tiêu đề" required
                 />
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Thể loại</label>
                <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                    <!-- <option value="7">Đêm nhạc</option>
                <option value="2">Beertalks</option>
                <option value="3">Chiếu phim</option> -->
                    <?php
                    foreach ($categories as $category) {
                        echo "
            <option value=$category->id>$category->name</option>
            ";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Số lượng vé</label>
                <input type="number" class="form-control" name="number_ticket" id="exampleFormControlInput1" placeholder="" 
                value="<?php echo $regist->number_ticket?>"
                />
            </div>


            <div class="form-group">
                <label for="exampleFormControlInput1">Giá vé</label>
                <input type="number" class="form-control" name="ticket_price" id="exampleFormControlInput1" placeholder="VND"
                value="<?php echo $regist->ticket_price?>"
                 />
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Ngày</label>
                <input type="date" class="form-control" name="date" id="exampleFormControlInput1" placeholder="" required
                value="<?php echo $regist->date?>"
                 />
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Thời gian bắt đầu</label>
                <input type="time" class="form-control" name="start_time" id="exampleFormControlInput1" placeholder="" required 
                value="<?php echo $regist->start_time?>"
                />
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="text" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email" 
                value="<?php echo $regist->email?>"
                />
            </div>
        </div>



        <!-- <div class="col-md-5">
                <div id="choose-avatar" style="height: 344px">
                    <button type="button" onclick="input_avatar.click()" class="btn btn-sm btn-light">
                        Choose image
                    </button>
                    <input id="input_avatar" type="file" name="p_file" hidden="" />

                    
                    <input type="image" hidden="" id="avatar_preview" src="" />

                    
                    <input id="avatar_url" name="image_url" type="text" hidden="" />
                </div>
            </div> -->
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Mô tả</label>

        <textarea class="form-control" placeholder="Gửi gắm đôi lời.." name="description" id="exampleFormControlTextarea1" rows="2"
        ><?php echo $regist->description?></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block">
            Chỉnh sửa đăng ký!
        </button>
    </div>
</form>
</div>