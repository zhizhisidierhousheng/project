@extends("Admin.AdminPublic.public")
@section('admin')

<body> 
    <div class="cl pd-20" style="background-color:#5bacb6"> 
        <dl style="margin-left:20px;color:#fff"> 
            <dd class="pt-10 f-12" style="margin-left:0">
            收件人姓名：{{$address->name}}
            </dd>
            <dd class="pt-10 f-12" style="margin-left:0">
            收件人电话：{{$address->phone}}
            </dd> 
            <dd class="pt-10 f-12" style="margin-left:0">
            收货地址：{{$address->area . $address->address}}
            </dd>
            <dd class="pt-10 f-12" style="margin-left:0">
            邮政编码：{{$address->postacode}}
            </dd>
            <dd class="pt-10 f-12" style="margin-left:0">
            使用优惠券：{{$coupon->coupon_id}} (￥{{$coupon->money}})
            </dd>
        </dl> 
    </div> 
    <div class="pd-10"> 
        <table class="table table-border table-bordered"> 
            <tbody> 
                <tr class="text-c"> 
                    <th>商品名称</th> 
                    <th>商品价格</th> 
                    <th>购买数量</th> 
                    <th>合计</th> 
                </tr> 
            @foreach($data as $row)
            <tr class="text-c"> 
                <td>
                    <img src="{{$row->gpic}}" width="100" height="100">
                    {{$row->gdcr}}
                </td> 
                <td>{{$row->gprice}}</td> 
                <td>{{$row->num}}</td> 
                <td>{{$row->gprice * $row->num}}</td> 
            </tr> 
            @endforeach
            </tbody> 
        </table> 
    </div> 
@endsection