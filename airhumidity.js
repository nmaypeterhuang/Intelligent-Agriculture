var dht;
var relay;


boardReady('vnO1', function (board) {
  board.systemReset();
  board.samplingInterval = 20;
  dht = getDht(board, 11);
  relay = getRelay(board, 9);
  document.getElementById("demo-area-01-show").style.fontSize = 20+"px";
  document.getElementById("demo-area-01-show").style.lineHeight = 20+"px";
  dht.read(function(evt){
    document.getElementById("demo-area-01-show").innerHTML = (['溫度：',dht.temperature,'度，','濕度：',dht.humidity,'%'].join(''));
    if (dht.temperature >= 35) {
      relay.on();
    } else {
      relay.off();
    }
  }, 1000);
});