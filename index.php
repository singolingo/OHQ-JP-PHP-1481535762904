<!DOCTYPE html>
<html>
<head>
	<title>OGSC＆環境センサのデモ</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <meta name="description" content="これはデモです。 ">

<!-- 	<link rel="stylesheet" href="style.css" /> -->

<link rel="stylesheet" href="css/BarGauge/jquery.BarGauge.css" type="text/css" />
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
<script src="jquery.SimpleChart.js"></script>


  <script type="text/javascript" src="js/ncmb.min.js" charset="utf-8">

  <!-- Nifty Cloud  -->
    //【環境センサー】 ニフティクラウドに接続
    var ncmb = new NCMB(e34bf31c6652e31c561f3f0253bd13a46ace822c266a490e69d13c51109f0106,1e58451ab1c41d53824514f79552c0a718716af91e898f8418494bf22132b416);
    //【OHQ】 ニフティクラウドに接続
    //var ncmb = new NCMB(960534844e162f267e64764aa91ed32cbdf73a4582451afe5be15a6bec788bf6,0072db3fd89db23a26cef2ef707c9f4f42035f8a8a69cc22dc7c881c49225934);

    // クラスのTestClassを作成
    var OC_KankyoSensor = ncmb.DataStore("OC_KankyoSensor");

    // データストアへの登録
    var OC_KankyoSensor = new OC_KankyoSensor();
    OC_KankyoSensor.set("message", "This is A message.");
    OC_KankyoSensor.save()
         .then(function(){                 // 保存に成功した場合の処理



          })
         .catch(function(err){            // 保存に失敗した場合の処理



          });


    <!-- OGSC Cloud  -->
     // ヘッダーを指定
	header( "Content-Type: application/json; charset=utf-8" ) ;
	$url = "http://OGSC.com"; // OGSC Cloud API サーバーのURL　＆　アクセスキー
	$json = file_get_contents($url);
	//mb_language("Japanese");  php.ini の設定が難しい場合は、これを宣言。
	$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
	$arr = json_decode($json,true);

	if ($arr === NULL) {      //〜データがない時の処理〜
	    return;
	}else{	                  //〜存在しているときの処理〜
     $BPmax= 0;
     $BPmin= 0;
     $Shinpaku= 0;

	}

  </script>


<script>
$(document).ready(function(e) {
  var data = [{
  values:[
    {X:0,Y:10},
    {X:1,Y:60},
    {X:2,Y:70},
    {X:3,Y:10},
    {X:4,Y:90}
  ],
  color:"red",
  title:"赤"
  },{
  values:[
    {X:0,Y:0},
    {X:1,Y:10},
    {X:2,Y:20},
    {X:3,Y:30},
    {X:4,Y:40}
  ],
  color:"blue",
  title:"青Blue Color"
  }];
  $('#demo').SimpleChart({
      data:data,
      title: "タイトルだよ",
      maxValX: 4,
      maxValY: 100,
  });
});
</script>



</head>
<body>
	<table>
		<tr>
			<td>
				<h1 id = "message"><?php echo "OMRON connect Demo"; ?></h1>
				<p class='description'></p> Thanks for creating a <span class="blue">OMRON connect Demo Application</span>.
			</td>
		</tr>
	</table>

   <h1>SimpleChart のデモ。</h1>
   <div id="demo"></div>


</body>
</html>
