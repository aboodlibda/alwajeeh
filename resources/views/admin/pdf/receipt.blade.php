
<html dir="rtl" lang="ar">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>{{'Recepit-'.$order->number}}</title>
    <style>
        /* http://meyerweb.com/eric/tools/css/reset/
           v2.0 | 20110126
           License: none (public domain)
        */

        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed,
        figure, figcaption, footer, header, hgroup,
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }
        /* HTML5 display-role reset for older browsers */
        article, aside, details, figcaption, figure,
        footer, header, hgroup, menu, nav, section {
            display: block;
        }
        body {
            line-height: 1;
            font-family: Arial;
            font-size: 14px;
        }
        ol, ul {
            list-style: none;
        }
        blockquote, q {
            quotes: none;
        }
        blockquote:before, blockquote:after,
        q:before, q:after {
            content: '';
            content: none;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
        /*to show cell's position*/

        table.brefTbl td {
            border: solid 0px black;
            border-collapse: collapse;
        }

        table.invTbl  td {
            border: solid 1px black;
            border-collapse: collapse;
        }

        table.classicTbl tbody {
            border: none;
            border-collapse: collapse;
        }

        .bold~tr td {
            border: solid 1px lightgray;
        }

        td {
            padding: 0.8em;
        }

        [colspan="4"][rowspan="2"] {
            height: 6em;
            width: 100em;
        }
        td {
            padding: 0.4em;
        }

    </style>

</head>

<body>

<table class="brefTbl" style="width: 80%; margin: auto; margin-top: 100px; font-weight: bold">
    <tr><td style="width: 100%; font-weight: bold;font-size: 25px"><strong>سند قبض</strong><span style="color:red"> - {{$order->number}}</span></td><td></td><td></td><td></td><td></td><td style="text-align:center; width: 30%"></td></tr>
</table>

<table  class="invTbl" style="width: 80%; margin: auto; margin-top: 50px;">
    <tr style="background-color: #eeeeee; font-weight: bold">
    
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold"> المبلغ : </td>
        <td style="text-align: center;font-weight: bold">{{$order->first_installment .' '. 'ر.س'}}</td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold">استلمت من السيد : </td>
        <td style="text-align: center;font-weight: bold">{{$order->full_name}}</td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold">رقم الجوال : </td>
        <td style="text-align: center;font-weight: bold">{{$order->phone}}</td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold">العنوان : </td>
        <td style="text-align: center;font-weight: bold">{{$order->area .' - '. $order->street}}</td>
    </tr>

    <tr>
        <td style="text-align: center;font-weight: bold">وذالك عن : </td>
        <td style="text-align: center;font-weight: bold">دفعة اولى من ثمن جهاز : @foreach($order->products as $key => $product)

        {{$product->name}}

        @endforeach</td>
    </tr>

    <tr>
        <!-- <td style="text-align: center;font-weight: bold">المبلغ بالحروف : </td>
        <td style="text-align: center;font-weight: bold">نيننينن</td> -->
    </tr>


</table>

<table class="classicTbl" style="width: 80%; margin: auto; margin-top: 50px; margin-bottom: 100px;">
    <tr>
        <td style="width: 25%; font-weight: bold">
           
            <br>
            توقيع المستلم :  <br><br><br><br>......................</td>
        <td  style="text-align: center"></td>
        <td   style="width: 25%; font-weight: bold; font-size: 18px; text-align: center">
            <strong>الختم : </strong>
            <br><br>
            <br>
            <span><img style="width: 80px;margin: -24px 35px;transform: rotate(-20deg);" src="{{asset('sign.png')}}"></span>
        </td>
    </tr>
</table>



<table class="classicTbl" style="width: 80%; margin: auto; margin-top: 50px; margin-bottom: 100px;">
    <tr>
        <td style="width: 25%; font-weight: bold"></td>
        <td  style="text-align: center">شكرا لتعاونكم معنا!</td>
        <td   style="width: 25%; font-weight: bold; font-size: 18px; text-align: center">

        </td>
    </tr>
</table>




</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date+' '+time;


    // alert(dateTime);
    $('#time').text(dateTime);
</script>
</html>

