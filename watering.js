//取得現在時間 + alarm時間到澆水10秒(led+文字)
"use strict";

function _asyncToGenerator(fn) { return function () { var gen = fn.apply(this, arguments); return new Promise(function (resolve, reject) { function step(key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(function (value) { step("next", value); }, function (err) { step("throw", err); }); } } step("next"); }); }; }

_asyncToGenerator(regeneratorRuntime.mark(function _callee4() {
  var soil, led, alarm, h, m, tensec, s, tensecflag, now, get_time, g;
  return regeneratorRuntime.wrap(function _callee4$(_context4) {
    while (1) {
      switch (_context4.prev = _context4.next) {
        case 0:
          get_time = function get_time(t) {
            var varTime = new Date(),
                varHours = varTime.getHours(),
                varMinutes = varTime.getMinutes(),
                varSeconds = varTime.getSeconds();
            var varNow;
            if (t == "hms") {
              varNow = varHours + ":" + varMinutes + ":" + varSeconds;
            } else if (t == "h") {
              varNow = varHours;
            } else if (t == "m") {
              varNow = varMinutes;
            } else if (t == "s") {
              varNow = varSeconds;
            }
            return varNow;
          };

          g = (function () {
            var ref = _asyncToGenerator(regeneratorRuntime.mark(function _callee2() {
              return regeneratorRuntime.wrap(function _callee2$(_context2) {
                while (1) {
                  switch (_context2.prev = _context2.next) {
                    case 0:
                      document.getElementById("SetSchedule").addEventListener("click", _asyncToGenerator(regeneratorRuntime.mark(function _callee() {
                        return regeneratorRuntime.wrap(function _callee$(_context) {
                          while (1) {
                            switch (_context.prev = _context.next) {
                              case 0:
                                alarm = 'SetSchedule()';  //排程時間

                              case 1:
                              case "end":
                                return _context.stop();
                            }
                          }
                        }, _callee, this);
                      })));
                      h = Math.abs(get_time("h"));
                      m = Math.abs(get_time("m"));
                      s = Math.abs(get_time("s"));
                      now = [h, ':', m, ':', s].join('');
                      document.getElementById("demo-area-03-show").innerHTML = ['現在時間:', now, '<br/>'].join('');

                      if (!(now == alarm)) {
                        _context2.next = 15;
                        break;
                      }

                      tensecflag = 1;
                      led.on();
					  document.getElementById("demo-area-05-show").innerHTML = 'watering';
                      _context2.next = 11;
                      return delay(1);

                    case 11:
                      tensec = tensec - 1;
                      g();
                      _context2.next = 29;
                      break;

                    case 15:
                      if (!(tensecflag == 1 && 0 <= tensec && tensec <= 10)) {
                        _context2.next = 23;
                        break;
                      }

                      led.on();
					  document.getElementById("demo-area-05-show").innerHTML = 'watering';
                      _context2.next = 19;
                      return delay(1);

                    case 19:
                      tensec = tensec - 1;
                      g();
                      _context2.next = 29;
                      break;

                    case 23:
                      tensecflag = 0;
                      led.off();
					  document.getElementById("demo-area-05-show").innerHTML = 'no watering';
                      _context2.next = 27;
                      return delay(1);

                    case 27:
                      tensec = 10;
                      g();

                    case 29:
                    case "end":
                      return _context2.stop();
                  }
                }
              }, _callee2, this);
            }));

            return function g() {
              return ref.apply(this, arguments);
            };
          })();

          boardReady('YWgg', (function () {
            var ref = _asyncToGenerator(regeneratorRuntime.mark(function _callee3(board) {
              return regeneratorRuntime.wrap(function _callee3$(_context3) {
                while (1) {
                  switch (_context3.prev = _context3.next) {
                    case 0:
                      board.systemReset();
                      board.samplingInterval = 250;
                      soil = getSoil(board, 3);
                      led = getLed(board, 10);
                      alarm = '16:33:0';
                      tensec = 10;
                      tensecflag = 0;
                      g();

                    case 8:
                    case "end":
                      return _context3.stop();
                  }
                }
              }, _callee3, this);
            }));

            return function (_x) {
              return ref.apply(this, arguments);
            };
          })());

        case 3:
        case "end":
          return _context4.stop();
      }
    }
  }, _callee4, this);
}))();

//var ss=0;  //由小視窗(setSchedule.html)設定排程時間後變成1

//由小視窗設定排程時間，將時間傳給alarm
function SetSchedule() {
  //ss=1;
  var time = document.forms['wateringschedule'];
  var wateringh = time.elements['wateringh'].value;
  var wateringm = time.elements['wateringm'].value;
  var waterings = time.elements['waterings'].value;
  return (wateringh + ':' + wateringm + ':' + waterings);
}


//有設定過排程時間就顯示新的時間，否則顯示未設定
function getSetSchedule() {
//	if(ss==1) {
  var time = document.forms['wateringschedule'];
  var wateringh = time.elements['wateringh'].value;
  var wateringm = time.elements['wateringm'].value;
  var waterings = time.elements['waterings'].value;
  document.getElementById("showSetSchedule").innerHTML = (wateringh + ':' + wateringm + ':' + waterings);
//	} else {
//		document.getElementById("showSetSchedule").innerHTML = ('not set');
//	}
}