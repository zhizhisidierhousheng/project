<div class="link_box">
    <div class="link_top">
        <div class="top_right"></div>
        <div class="top_left"></div>
    </div> 
    <div class="link_content">
        <h3 class="link_tit">友情链接</h3>
        <ul class="link_list">
<<<<<<< HEAD
          @foreach($data as $row)
            <li>
                <a href="{{$row->url}}" target="_blank">{{$row->name}}</a>
            </li>
          @endforeach
=======
            @foreach($data as $row)
            <li><a href="{{$row->url}}" target="_blank">{{$row->name}}</a></li>
            @endforeach
>>>>>>> 8c2cf29f33e6097b6fa2e2820d34a0ecf848a131
        </ul>
        <div class="Pagination">
            @foreach($pp as $row)
            <a href="javascript:void(0)" class="current" onclick="page({{$row}})">{{$row}}</a>
              @endforeach
        </div>
<<<<<<< HEAD
        <div class="link_bottom">
            <div class="bottom_right"></div>
            <div class="bottom_left"></div>
        </div>
=======
    </div>
    <div class="link_bottom">
        <div class="bottom_right"></div>
        <div class="bottom_left"></div>
>>>>>>> 8c2cf29f33e6097b6fa2e2820d34a0ecf848a131
    </div>
</div>