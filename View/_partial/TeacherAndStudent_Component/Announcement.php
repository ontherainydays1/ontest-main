<?php
class Announcement
{
    public static function createAnnouncement($data)
    {
        $firstContent = '';
        // $result = '
        //         <div class="card py-2">
        //             <div class="row px-3">
        //                 <ul id="announcementUl" class="col text-center">
        //                     <p class="fs-5 fw-bold">Thông Báo</p>';
        $i = 0;
        $result = '';
        while($row = mysqli_fetch_array($data)) {
            $result .= '
                            <li class="list-group px-5">
                                <button id="btn'.$i.'" name="'.$row['idNotice'].'" type="button" class="list-group-item list-group-item-action row d-flex justify-content-between" aria-current="true" onclick = "renderAnnoucementContent(this)">
                                    <div class="col">'.$row['title'].'</div>
                                    <div class="col">'.$row['date'].'</div>
                                </button>
                                <hr>
                            </li>
                        ';
        }
        return $result;
    }
    public static function createAnnouncementContent($data)
    {   $result = '';
        while ($row = mysqli_fetch_array($data)) {
            $result .= '
                <div class="border p-3">
                    <p class="text-center fs-5 fw-bold">'.$row['title'] .'</p>
                    <hr>
                    <div>
                        <p class="text-lg-start">'.$row['notice'].'</p>
                    </div>
                </div>';
        }
        return $result;
    }
    public static function createFirstAnnouncementContent($title, $data)
    {
        return '</ul>
        <div id="annoucementContent" class="col-6 border py-3">
            <p class="text-center fs-5 fw-bold">'.$title.'</p>
            <hr>
            <div>
                <p class="text-center">'.$data.'</p>
            </div>
        </div>
        </div>
        </div>';
    }
}
