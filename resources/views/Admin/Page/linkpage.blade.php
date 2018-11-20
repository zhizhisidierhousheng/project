<div class="link_box">
    <div class="link_top">
        <div class="top_right"></div>
        <div class="top_left"></div>
    </div> 
    <div class="link_content">
        <h3 class="link_tit">友情链接</h3>
        <ul class="link_list">
            @foreach($data as $row)
            <li><a href="{{$row->url}}" target="_blank">{{$row->name}}</a></li>
            @endforeach
        </ul>
        <div class="Pagination">
        </div>
    </div>
    <div class="link_bottom">
        <div class="bottom_right"></div>
        <div class="bottom_left"></div>
    </div>
</div>