@extends("Home.HomePublic.public")
@section('home')
<head> 
    <link href="/static/home/css/Orders.css" rel="stylesheet" type="text/css" /> 
</head>
<body>
    <!--确认订单页样式--> 
    <div class="Inside_pages clearfix" id="Orders"> 
        <div class="Orders_style clearfix"> 
            <!--地址信息样式--> 
            <div class="Address_info"> 
                <div class="title_name">订单收货地址</div> 
                <ul> 
                    <li><label>收件人姓名：</label>{{$data->name}}</li> 
                    <li><label>收件人地址：</label>{{$data->area . $data->address}}</li> 
                    <li><label>收件人电话：</label>{{$data->phone}}</li> 
                    <li><label>邮&nbsp;&nbsp;&nbsp;编：</label>{{$data->postacode}}</li>
                </ul>
            </div>
        </div> 
        <form class="form" method="post"> 
            <fieldset> 
                <!--产品列表--> 
                <div class="product_List"> 
                    <table> 
                        <thead>
                            <tr class="title">
                                <td class="name">商品名称</td>
                                <td class="price">商品价格</td>
                                <td class="Quantity">购买数量</td>
                                <td class="Money">金额</td>
                            </tr>
                        </thead> 
                        <tbody>
                        @foreach($data->info as $info)
                            <tr> 
                                <td class="Product_info"> 
                                    <a href="#">
                                        <img src="/static/home/products/p_11.jpg" width="100px" height="100px" />
                                    </a> 
                                    <a href="#" class="product_name">麻阳冰糖橙子甜橙冰糖柑8斤新鲜水果甜过永兴冰糖橙赣南脐橙包邮</a> 
                                </td> 
                                <td><i>￥</i>{{$info->gprice}}</td> 
                                <td>{{$info->num}}</td> 
                                <td class="Moneys"><i>￥</i>{{$info->gprice * $info->num}}</td> 
                            </tr> 
                        @endforeach
                        </tbody> 
                    </table> 
                    <!--价格--> 
                    <div class="price_style"> 
                        <div class="right_direction"> 
                        <ul> 
                            <li>
                                <label>商品总价</label>
                                <i>￥</i>
                                <span>{{$data->total + $data->money}}</span>
                            </li>
                            <li>
                                <label>优惠金额</label>
                                <i>￥</i>
                                <span>-{{$data->money}}</span>
                            </li>
                            <li class="shiji_price">
                                <label>实&nbsp;&nbsp;付&nbsp;&nbsp;款</label>
                                <i>￥</i>
                                <span>{{$data->total}}</span>
                            </li> 
                        </ul> 
                        </div> 
                    </div> 
                </div> 
            </fieldset> 
        </form> 
    </div> 
</body>
@endsection
@section('title', '订单列表')