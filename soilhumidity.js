"use strict";

function _asyncToGenerator(fn) { return function () { var gen = fn.apply(this, arguments); return new Promise(function (resolve, reject) { function step(key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(function (value) { step("next", value); }, function (err) { step("throw", err); }); } } step("next"); }); }; }

_asyncToGenerator(regeneratorRuntime.mark(function _callee4() {
  var soil, led, a;
  return regeneratorRuntime.wrap(function _callee4$(_context4) {
    while (1) {
      switch (_context4.prev = _context4.next) {
        case 0:

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
                      soil.on((function () {
                        var ref = _asyncToGenerator(regeneratorRuntime.mark(function _callee2(val) {
                          return regeneratorRuntime.wrap(function _callee2$(_context2) {
                            while (1) {
                              switch (_context2.prev = _context2.next) {
                                case 0:
                                  soil.detectedVal = val;
                                  a = Math.round((soil.detectedVal - 0) * (1 / (100 - 0)) * (0 - 200) + 200);
                                  document.getElementById("demo-area-02-show").innerHTML = a;

                                  if (!(a >= 0 && a < 50)) {
                                    _context2.next = 10;
                                    break;
                                  }

                                  led.on();
                                  document.getElementById("demo-area-02-show").innerHTML = String(a) + String('watering');
                                  _context2.next = 8;
                                  return delay(5);

                                case 8:
                                  _context2.next = 11;
                                  break;

                                case 10:
                                  led.off();

                                case 11:
                                  document.getElementById("demo-area-05-btn5").addEventListener("click", _asyncToGenerator(regeneratorRuntime.mark(function _callee() {
                                    return regeneratorRuntime.wrap(function _callee$(_context) {
                                      while (1) {
                                        switch (_context.prev = _context.next) {
                                          case 0:
                                            led.on();
                                            document.getElementById("demo-area-04-show").innerHTML = 'watering';
                                            _context.next = 4;
                                            return delay(5);

                                          case 4:
                                            document.getElementById("demo-area-04-show").innerHTML = 'no watering';
                                            led.off();

                                          case 6:
                                          case "end":
                                            return _context.stop();
                                        }
                                      }
                                    }, _callee, this);
                                  })));

                                case 12:
                                case "end":
                                  return _context2.stop();
                              }
                            }
                          }, _callee2, this);
                        }));

                        return function (_x2) {
                          return ref.apply(this, arguments);
                        };
                      })());

                    case 5:
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

        case 1:
        case "end":
          return _context4.stop();
      }
    }
  }, _callee4, this);
}))();