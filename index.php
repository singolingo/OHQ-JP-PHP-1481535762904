<!DOCTYPE html>
<html>
<head>
	<title>OGSC＆環境センサのデモ</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <meta name="description" content="OMRON connect Demo">
<!-- <link rel="stylesheet" href="style.css" /> -->

<!-- OGSC Cloud  -->
<link rel="stylesheet" href="css/BarGauge/jquery.SimpleChart.css" type="text/css" />
<link rel="stylesheet" href="css/BarGauge/jquery.BarGauge.css" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.SimpleChart.js"></script>
<script type="text/javascript" src="js/jquery.BarGauge.js"></script>

<!-- Nifty Cloud  -->
<script type="text/javascript" src="js/ncmb.min.js" charset="utf-8"></script>
<script type="text/javascript">

  // ボタンクリックで更新
    jQuery(document).ready(function () {
        $(".btn1").click(function(){
            alert("Button枠がクリックされました");
        	$('.kankyo1').BarGauge({
				value: 70,
				goal: 100,
			});
			$('.kankyo2').BarGauge({
				value: 70,
				goal: 100,
			});
        });
    });

    //【環境センサー】Nifty mobile backendアプリとの連携
 function onKankyoButton1_Click(){
    var ncmb = new NCMB(e34bf31c6652e31c561f3f0253bd13a46ace822c266a490e69d13c51109f0106,1e58451ab1c41d53824514f79552c0a718716af91e898f8418494bf22132b416);

    // クラスのTestClassを作成
    var OC_KankyoSensor = ncmb.DataStore("OC_KankyoSensor");

    OC_KankyoSensor.fetchAll()
    .then(function(results){
           	//for (var i=0; i<results.length ;i++){
            //	var = object = results[i];
                var object = results[0];       // 1件のみ取得
                //}
    })
    .catch(function(err){
        	    console.log(err);
    });

    // データストアへのデータ登録
//    var OC_KankyoSensor = new OC_KankyoSensor(); //インスタンス化
//    OC_KankyoSensor.set("message", "環境センサーの処理");
//    OC_KankyoSensor.load()
//         .then(function(){                 // 保存に成功した場合の処理
//          })
//         .catch(function(err){            // 保存に失敗した場合の処理
//          });
    };
</script>

<!-- OGSC Cloud  -->
<script>
     // ヘッダーを指定
	header( "Content-Type: application/json; charset=utf-8" ) ;
	$url = "http://OGSC.com"; // OGSC Cloud API サーバーのURL　＆　アクセスキー
	$json = file_get_contents($url);
	//mb_language("Japanese");  php.ini の設定が難しい場合は、これを宣言。
	$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
	$arr = json_decode($json,true);

	if ($arr === NULL) {      //〜データがない時の処理〜
        var data;
       for(i=0,i<count(arr),i++){
          data.X = arr[i][0];
          data.Y = arr[i][1];
       }

		return;
	}else{	                  //〜存在しているときの処理〜
     $BPmax= 0;
     $BPmin= 0;
     $Shinpaku= 0;

	}
</script>


<script>

//SimpleChart のデータ
$(document).ready(function(a) {
  var data = [{
  values:[
    {X:0,Y:122},
    {X:1,Y:127},
    {X:2,Y:125},
    {X:3,Y:134},
    {X:4,Y:124}
  ],
  color:"red",
  title:"max"
  },{
  values:[
    {X:0,Y:88},
    {X:1,Y:91},
    {X:2,Y:93},
    {X:3,Y:94},
    {X:4,Y:90}
  ],
  color:"blue",
  title:"min"
  },{
	  values:[
	    {X:0,Y:75},
	    {X:1,Y:74},
	    {X:2,Y:75},
	    {X:3,Y:77},
	    {X:4,Y:76}
	  ],
	  color:"orange",
	  title:"bpm"
  }];
  $('#BloodPressure').SimpleChart({
      data:data,
      title: "血圧",
      maxValX: 30,
      maxValY: 180,
  });
});


//BarGaugeのデータ
$(document).ready(function(b) {
    $('#kankyo1').BarGauge({
		value: 30,
		goal: 100,
		decPlaces: 2,
        color: '#ff0000',
		title: "気温",
		showTitle: true,
		value_before: "摂氏",
		value_after: "度C",
		valueColor: '#77ff77',
		showValue: true,
		animSpeed: 'slow',
		animType: 'linear',
		toolTip: '推移を表示'
	});
	$('#kankyo2').BarGauge({
		value: 60,
		goal: 100,
		decPlaces: 2,
		color: '#00ff00',
		title: "湿度",
		showTitle: true,
		value_before: "湿度",
		value_after: "度",
		valueColor: '#77ff77',
		toolTip: '推移を表示',
		showValue: true,
		animSpeed: 1000,
		animType: 'swing',
		faceplate: "url(css/BarGauge/bar_graph-colorScale.png) no-repeat",
	});
	$('#kankyo3').BarGauge({
		value: 2,
		goal: 10,
		color: 'yellow',
		backgroundColor: 'black',
		decPlaces: 0,
		title: "照度",
		toolTip: '推移を表示',
		valueColor: '#77ff77',
		showTitle: true,
		value_after: "％",
		showValue: true,
		animSpeed: 'fast',
		faceplate: "url(css/BarGauge/bar_graph-gradient.png) no-repeat"
	});
    $('#kankyo4').BarGauge({
		value: 51,
		goal: 100,
		decPlaces: 2,
		color: 'pink',
		title: "騒音",
		toolTip: '推移を表示',
		valueColor: '#77ff77',
		showTitle: true,
		value_after: "デシベル",
		showValue: true,
		animSpeed: 'slow',
		animType: 'linear'
	});
    $('#kankyo5').BarGauge({
		value: 51000,
		goal: 100000,
		decPlaces: 2,
		color: 'orange',
		title: "UV",
		toolTip: '推移を表示',
		valueColor: '#77ff77',
		showTitle: true,
		value_after: "度",
		showValue: true,
		animSpeed: 'slow',
		animType: 'linear'
	});
    $('#kankyo6').BarGauge({
		value: 100,
		goal: 10,
		decPlaces: 2,
		color: 'sky',
		title: "気圧",
		toolTip: '推移を表示',
		valueColor: '#77ff77',
		showTitle: true,
		value_before: "Pa",
		showValue: true,
		animSpeed: 'slow',
		animType: 'linear'
	});
    $('#kankyo7').BarGauge({
		value: 70,
		goal: 100,
		decPlaces: 2,
		color: 'white',
		backgroundColor: 'black',
		title: "不快指数",
		toolTip: '推移を表示',
		valueColor: '#77ff77',
		showTitle: true,
		showValue: true,
		animSpeed: 'slow',
		animType: 'linear'
	});
    $('#kankyo8').BarGauge({
		value: 51,
		goal: 100,
		color: 'purple',
		backgroundColor: 'white',
		decPlaces: 2,
		title: "熱中症",
		toolTip: '推移を表示',
		valueColor: '#77ff77',
		showTitle: true,
		showValue: true,
		animSpeed: 'slow',
		animType: 'linear'
	});
});

</script>

</head>
<body>
	<table>
		<tr>
			<td>
				<h1 id = "message"><?php echo "OMRON connect Demo"; ?></h1>
			</td>
		</tr>
	</table>

	<table>
		<tr>
			<td>
   <h1>血圧計</h1>
   <div id="BloodPressure"></div>
			</td>
		</tr>
		<tr>
			<td>
   <table>
   <h1>環境センサー</h1>

<!--    <input type="button" id="btn1" value="環境センサーからデータを取得" /> -->

      <tr>
      <td><font size=22 >気温</font></td><td>
      <div id="kankyo1" class="barGauge_container"></div></td>
      <td><font size=22 >湿度</font></td><td>
      <div id="kankyo2" class="barGauge_container"></div></td>
      </tr>
      <tr>
      <td><font size=22 >照度</font></td><td>
      <div id="kankyo3" class="barGauge_container"></div></td>
      <td><font size=22 >騒音</font></td><td>
      <div id="kankyo4" class="barGauge_container"></div></td>
      </tr>
      <tr>
      <td><font size=22 >UV</font></td><td>
      <div id="kankyo5" class="barGauge_container"></div></td>
      <td><font size=22 >気圧</font></td><td>
      <div id="kankyo6" class="barGauge_container"></div></td>
      </tr>
      <tr>
      <td><font size=22 >不快</font></td><td>
      <div id="kankyo7" class="barGauge_container"></div></td>
      <td><font size=22 >熱中症</font></td><td>
      <div id="kankyo8" class="barGauge_container"></div></td>
      </tr>
    </table>

			</td>
		</tr>
	</table>

</body>
</html>
