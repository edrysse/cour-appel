<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>طلب الطوابع المطاطية</title>
</head>
<style>
    .title{
        font-size: 16px;
        text-decoration: underline;


    }
  
    body{
        margin: 20px
    }
.part3{
    top: 80px;
    right: 20px;
    position: absolute;
}
.part1{
    top: 20px;
    right: 40px;
    position: absolute;
}
.part4{
    top: 110px;
    right: 20px;
    position: absolute;
}

.part2 {
    position: absolute;
    top: 50px;
    right: 50px;

}
.part1,.part2 ,.part3 ,.part4{

font-size: 15px;
    font-weight: 400
}
.myimg{
    position: absolute;
    left: 38%;
    width: 150px;
    height: 150px;
}
table {
            margin-left: auto;
            margin-right: auto;
        }

@media print {
    @page {
        margin: 0;
    }

    @page {
        margin-top: 10 !important;
        margin-bottom: 0 !important;
    }
}
</style>
<body>
    
</body>
</html>   <div>
    <div class="title" style="position: relative">

        <p  class="part1 title" >المملكة المغربية</p>
<p class="part2 title">        <span  >وزارة العدل </span>
</p>        <p  class="part3 title"> محكمة الاستئناف بالعيون</p>
        <p  class="part4 title">المديرية الفرعية الاقليمية</p>
            </div>
            <div style="position: relative">
                <a href="#">
                    <img class="myimg" src="https://i.ibb.co/86kq4Mp/mhkama-removebg-preview-1.png" >
                </a>
                <p style="position: absolute;left:20%;">{{ str_replace('-', '/', explode(' ', $request->date)[0]) }} :العيون في</p>
                <h1 style="text-align: center ;padding-top:200px;">طلب الطوابع المطاطية<br><h2 style="text-align: center">{{ $request->id }} :رقم</h2></h1>
                <h2 style="float: right;">المحكمة: الاستئناف</h2><br><br>
                <h2 style=" position: absolute; right:0%;">المصلحة: كتابةالنيابة العامة</h2>
            </div>
<table border="1" style="position:relative;top:30px ;width: 90%;height:300px;">
<thead style="height: 40px">
<tr>    <th style="width: 20%">الملاحظات</th><th  style="width: 20%">القسم الخاص به</th><th style="width: 10%"> الكمية المطلوبة</th><th style="width: 42%">نموذج الطابع المطاطي </th><th style="width: 8%"> الرقم</th>
</tr></thead>

<tbody style="
    width: 200px; height: 500px;
 ">

@foreach ($plastiqueType as $pla)
    <tr>
        <td style="text-align: right">{{ $request->obs }}</td>
        <td style="text-align: right">{{ $request->class }}</td>
        <td style="text-align: right">{{ $plastiqueNumber[$loop->index] }}</td>
        <td style="text-align: right">{{ $pla }}</td>
        <td style="text-align: right">{{ $loop->index + 1 }}</td>
    </tr>
@endforeach

</tbody>
            </table>
            <table border="1" style="position: relative ; top:40px">
                <thead>
                    <th>تأشيرة المدير الفرعي</th><th>توقيع المسؤول</th><th>توقيع المستفيد</th>
                    <th>إسم المستفيد</th>
                </thead>
                <tbody style="height: 32px"><td></td><td></td><td></td><td style="text-align: right">{{ $request->employe_name }}</td></tbody>
            </table>
</div>


<script>
    function openPrintView() {
        window.print();
        window.onafterprint = function () {
            window.close();
        }
    }
    window.onload = openPrintView;
</script>