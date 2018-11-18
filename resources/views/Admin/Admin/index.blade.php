@extends("Admin.AdminPublic.public")
@section("admin")

<div class="page-container">
	
	@if(session('error'))
    <div style="width:300px;height:20px;margin:auto;color:red;">{{session('error')}}</div>
    @endif
	<p class="f-20 text-success">欢迎来到淘食</p>
	
<div class="main">
    <div id="myrl" style="width:98%; margin-left:auto; margin-right:auto; height:600px; overflow:hidden;">
        <form name="CLD">
            <table class="biao" style="table-layout:fixed;height:80%" >
                <tbody>
                    <tr>
                        <td class="calTit" colSpan="7" style="height:30px;padding-top:3px;text-align:center;">

                        <a href="#" title="上一年" id="nianjian" class="ymNaviBtn lsArrow"></a>
                        <a href="#" title="上一月" id="yuejian" class="ymNaviBtn lArrow" ></a>

                        <div style="width:50%; float:left; padding-left:230px;">
                            <span id="dateSelectionRili" class="dateSelectionRili" style="cursor:hand;color: white; border-bottom: 1px solid white;" onclick="dateSelection.show()">
                                <span id="nian" class="topDateFont"></span>
                                <span class="topDateFont">年</span>
                                <span id="yue" class="topDateFont"></span>
                                <span class="topDateFont">月</span>
                                <span class="dateSelectionBtn cal_next" onclick="dateSelection.show()">▼</span>
                            </span> &nbsp;&nbsp;
                            <font id="GZ" class="topDateFont"></font>
                        </div>

                        <!--新加导航功能-->
                        <div style="left: 34%; display: none;" id="dateSelectionDiv">
                            <div id="dateSelectionHeader"></div>
                            <div id="dateSelectionBody">
                                <div id="yearList">
                                    <div id="yearListPrev" onclick="dateSelection.prevYearPage()">&lt;</div>
                                    <div id="yearListContent"></div>
                                    <div id="yearListNext" onclick="dateSelection.nextYearPage()">&gt;</div>
                                </div>
                                <div id="dateSeparator"></div>
                                <div id="monthList">
                                    <div id="monthListContent">
                                        <span id="SM0" class="month" onclick="dateSelection.setMonth(0)">1</span>
                                        <span id="SM1" class="month" onclick="dateSelection.setMonth(1)">2</span>
                                        <span id="SM2" class="month" onclick="dateSelection.setMonth(2)">3</span>
                                        <span id="SM3" class="month" onclick="dateSelection.setMonth(3)">4</span>
                                        <span id="SM4" class="month" onclick="dateSelection.setMonth(4)">5</span>
                                        <span id="SM5" class="month" onclick="dateSelection.setMonth(5)">6</span>
                                        <span id="SM6" class="month" onclick="dateSelection.setMonth(6)">7</span>
                                        <span id="SM7" class="month" onclick="dateSelection.setMonth(7)">8</span>
                                        <span id="SM8" class="month" onclick="dateSelection.setMonth(8)">9</span>
                                        <span id="SM9" class="month" onclick="dateSelection.setMonth(9)">10</span>
                                        <span id="SM10" class="month" onclick="dateSelection.setMonth(10)">11</span>
                                        <span id="SM11" class="month curr" onclick="dateSelection.setMonth(11)">12</span>
                                    </div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div id="dateSelectionBtn">
                                    <div id="dateSelectionTodayBtn" onclick="dateSelection.goToday()">今天</div>
                                    <div id="dateSelectionOkBtn" onclick="dateSelection.go()">确定</div>
                                    <div id="dateSelectionCancelBtn" onclick="dateSelection.hide()">取消</div>
                                </div>
                            </div>
                            <div id="dateSelectionFooter"></div>
                        </div>
                        <a href="#" id="nianjia" title="下一年" class="ymNaviBtn rsArrow" style="float:right;"></a>
                        <a href="#" id="yuejia" title="下一月" class="ymNaviBtn rArrow" style="float:right;"></a>
                        
                        </td>
                    </tr>
                    <tr class="calWeekTit" style="font-size:12px; height:40px;text-align:center;">
                        <td width="100" class="red">星期日</td>
                        <td width="100">星期一</td>
                        <td width="100">星期二</td>
                        <td width="100">星期三</td>
                        <td width="100">星期四</td>
                        <td width="100">星期五</td>
                        <td width="100" class="red">星期六</td>
                    </tr>
                    <script language="Javascript">
                        var gNum;
                        for (var i = 0; i < 6; i++) {
                            document.write('<tr style="table-layout:fixed" align=center height="70" id="tt">');
                            for (var j = 0; j < 7; j++) {
                                gNum = i * 7 + j ;
                                document.write('<td  id="GD' + gNum + '" on="0" ><font id="SD' + gNum + '" style="font-size:22px;"  face="Arial"');
                                if (j == 0) document.write('color=red');
                                if (j == 6) document.write('color=red');
                                document.write('  title="">  </font><br><font  id="LD' + gNum + '"  size=2  style="white-space:nowrap;overflow:hidden;cursor:default;">  </font></td>');
                            }
                            document.write('</tr>');
                        }

                    </script>
                </tbody>
            </table>
        </form>
    </div>
</div>

	
</div>
<footer class="footer mt-20">
	<div class="container">
		<p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br>
			Copyright &copy;2015-2017 H-ui.admin v3.1 All Rights Reserved.<br>
			本后台系统由<a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持
		</p>
	</div>
</footer>

<script type="text/javascript" src="/static/admin/calendar/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/calendar/js/calendar.js"></script>

@endsection
@section('title', '后台首页')