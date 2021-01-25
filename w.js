"use strict";

function _asyncToGenerator(fn) { return function () { var gen = fn.apply(this, arguments); return new Promise(function (resolve, reject) { function step(key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(function (value) { step("next", value); }, function (err) { step("throw", err); }); } } step("next"); }); }; }

_asyncToGenerator(regeneratorRuntime.mark(function _callee14() {
  var dht, soil, pir, relay, led, wflag_manully, a, alarm, hr, tensec, waitfifteen, rgbled, min, tensecflag, wflag_schedule, buzzer, wflag_soil, sec, now, wflag_alarm, alarmtensec, alarmtensecflag, fmanu, fdht, buzzer_music, fdete, fsoil, get_time, falarm, fsche, allBoardReady;
  return regeneratorRuntime.wrap(function _callee14$(_context14) {
    while (1) {
      switch (_context14.prev = _context14.next) {
        case 0:
		  //nowtime
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

		  //soil
          fsoil = function fsoil() {
            soil.on((function () {
              var ref = _asyncToGenerator(regeneratorRuntime.mark(function _callee7(val) {
                return regeneratorRuntime.wrap(function _callee7$(_context7) {
                  while (1) {
                    switch (_context7.prev = _context7.next) {
                      case 0:
                        soil.detectedVal = val;
                        a = Math.round((soil.detectedVal - 0) * (1 / (100 - 0)) * (0 - 200) + 200);
                        if (a < 5) {
                          wflag_soil = 1;
                          led.on();
                          document.getElementById("showSoilhumidity").innerHTML = ['土壤濕度:', a, '%'].join('');
                          document.getElementById("showIfsoil").innerHTML = '自動澆水:watering';
                        } else if (a >= 5) {
                          wflag_soil = 0;
                          if (wflag_soil == 0 && wflag_alarm == 0 && wflag_manully == 0 && wflag_schedule == 0) {
                            led.off();
                            document.getElementById("showSoilhumidity").innerHTML = ['土壤濕度:', a, '%'].join('');
                            document.getElementById("showIfsoil").innerHTML = '自動澆水:no watering';
                          }
                        }

                      case 3:
                      case "end":
                        return _context7.stop();
                    }
                  }
                }, _callee7, this);
              }));

              return function (_x2) {
                return ref.apply(this, arguments);
              };
            })());
          };

		  //buzz
          buzzer_music = function buzzer_music(m) {
            var musicNotes = {};
            musicNotes.notes = [];
            musicNotes.tempos = [];
            if (m[0].notes.length > 1) {
              for (var i = 0; i < m.length; i++) {
                if (Array.isArray(m[i].notes)) {
                  var cn = musicNotes.notes.concat(m[i].notes);
                  musicNotes.notes = cn;
                } else {
                  musicNotes.notes.push(m[i].notes);
                }
                if (Array.isArray(m[i].tempos)) {
                  var ct = musicNotes.tempos.concat(m[i].tempos);
                  musicNotes.tempos = ct;
                } else {
                  musicNotes.tempos.push(m[i].tempos);
                }
              }
            } else {
              musicNotes.notes = [m[0].notes];
              musicNotes.tempos = [m[0].tempos];
            }
            return musicNotes;
          };

		  //dht
          fdht = function fdht() {
            dht.read((function () {
              var ref = _asyncToGenerator(regeneratorRuntime.mark(function _callee3(evt) {
                return regeneratorRuntime.wrap(function _callee3$(_context3) {
                  while (1) {
                    switch (_context3.prev = _context3.next) {
                      case 0:
                        document.getElementById("showAirhumidity").innerHTML = (['溫度：',dht.temperature,'度，','濕度：',dht.humidity,'%'].join(''));

                      case 2:
                      case "end":
                        return _context3.stop();
                    }
                  }
                }, _callee3, this);
              }));

              return function (_x) {
                return ref.apply(this, arguments);
              };
            })(), 1000);
          };

		  //manully
          fmanu = (function () {
            var ref = _asyncToGenerator(regeneratorRuntime.mark(function _callee2() {
              return regeneratorRuntime.wrap(function _callee2$(_context2) {
                while (1) {
                  switch (_context2.prev = _context2.next) {
                    case 0:
					  document.getElementById("showIfmanully").innerHTML = String('手動澆水:no watering');
                      document.getElementById("btnWatering").addEventListener("click", _asyncToGenerator(regeneratorRuntime.mark(function _callee2() {
                        return regeneratorRuntime.wrap(function _callee$(_context) {
                          while (1) {
                            switch (_context.prev = _context.next) {
                              case 0:
                                wflag_manully = 1;
                                led.on();
                                document.getElementById("showIfmanully").innerHTML = '手動澆水:watering';
                                _context.next = 5;
                                return delay(5);

                              case 5:
                                wflag_manully = 0;
                                document.getElementById("showIfmanully").innerHTML = '手動澆水:no watering';

                              case 7:
                              case "end":
                                return _context.stop();
                            }
                          }
                        }, _callee, this);
                      })));
                      if (wflag_soil == 0 && wflag_alarm == 0 && wflag_manully == 0 && wflag_schedule == 0) {
                        led.off();
                      }

                    case 2:
                    case "end":
                      return _context2.stop();
                  }
                }
              }, _callee2, this);
            }));

            return function fmanu() {
              return ref.apply(this, arguments);
            };
          })();

		  //detection
          fdete = (function () {
            var ref = _asyncToGenerator(regeneratorRuntime.mark(function _callee6() {
              return regeneratorRuntime.wrap(function _callee6$(_context6) {
                while (1) {
                  switch (_context6.prev = _context6.next) {
                    case 0:
                      pir.on("detected", _asyncToGenerator(regeneratorRuntime.mark(function _callee5() {
                        return regeneratorRuntime.wrap(function _callee5$(_context5) {
                          while (1) {
                            switch (_context5.prev = _context5.next) {
                              case 0:
                                setInterval(_asyncToGenerator(regeneratorRuntime.mark(function _callee4() {
                                  return regeneratorRuntime.wrap(function _callee4$(_context4) {
                                    while (1) {
                                      switch (_context4.prev = _context4.next) {
                                        case 0:
                                          rgbled.setColor('#ff0000');
                                          buzzer.play(buzzer_music([{ notes: "C4", tempos: "1" }]).notes, buzzer_music([{ notes: "C4", tempos: "1" }]).tempos);
                                          _context4.next = 4;
                                          return delay(0.5);

                                        case 4:
                                          rgbled.setColor('#3333ff');
                                          buzzer.play(buzzer_music([{ notes: "E6", tempos: "1" }]).notes, buzzer_music([{ notes: "E6", tempos: "1" }]).tempos);
                                          _context4.next = 8;
                                          return delay(0.5);

                                        case 8:
                                        case "end":
                                          return _context4.stop();
                                      }
                                    }
                                  }, _callee4, this);
                                })), 1000);

                              case 1:
                              case "end":
                                return _context5.stop();
                            }
                          }
                        }, _callee5, this);
                      })));

                    case 1:
                    case "end":
                      return _context6.stop();
                  }
                }
              }, _callee6, this);
            }));

            return function fdete() {
              return ref.apply(this, arguments);
            };
          })();

		  //alarm
          falarm = (function () {
            var ref = _asyncToGenerator(regeneratorRuntime.mark(function _callee9() {
              return regeneratorRuntime.wrap(function _callee9$(_context9) {
                while (1) {
                  switch (_context9.prev = _context9.next) {
                    case 0:
                        document.getElementById("setScheduletime").addEventListener("click", function () {
                        alarm = document.getElementById("newalarmtime").value;
                        document.getElementById("showAlarmtime").innerHTML = alarm;
                      });
                      hr = get_time("h");
                      min = get_time("m");
                      sec = get_time("s");
                      now = [hr, ':', min, ':', sec].join('');
                      document.getElementById("showNowtime").innerHTML = ['現在時間:', now].join('');
                      document.getElementById("showAlarmtime").innerHTML = ['排程時間:', alarm].join('');
                      if (now == alarm) {
                        alarmtensec = 10;
                        wflag_alarm = 1;
                        alarmtensecflag = 1;
                        document.getElementById("showIfalarm").innerHTML = ['排程澆水:watering，剩餘時間:', alarmtensec, '秒'].join('');
                        led.on();
                      } else if (alarmtensecflag == 1 && 0 < alarmtensec && alarmtensec <= 10) {
                        alarmtensec = alarmtensec - 1;
                        wflag_alarm = 1;
                        document.getElementById("showIfalarm").innerHTML = ['排程澆水:watering，剩餘時間:', alarmtensec, '秒'].join('');
                        led.on();
                        if (alarmtensec == 0) {
                          alarmtensecflag = 0;
                          wflag_alarm = 0;
                        }
                      } else {
                        wflag_alarm = 0;
                        alarmtensecflag = 0;
                        document.getElementById("showIfalarm").innerHTML = '排程澆水:no watering';
                        if (wflag_soil == 0 && wflag_alarm == 0 && wflag_manully == 0 && wflag_schedule == 0) {
                          led.off();
                        }
                      }
                      _context9.next = 9;
                      return delay(1);

                    case 9:
                      falarm();

                    case 10:
                    case "end":
                      return _context9.stop();
                  }
                }
              }, _callee9, this);
            }));

            return function falarm() {
              return ref.apply(this, arguments);
            };
          })();

		  //schedule
          fsche = (function () {
            var ref = _asyncToGenerator(regeneratorRuntime.mark(function _callee10() {
              return regeneratorRuntime.wrap(function _callee10$(_context10) {
                while (1) {
                  switch (_context10.prev = _context10.next) {
                    case 0:
                      if (tensecflag == 0 && waitfifteen == 0) {
                        tensec = 10;
                        tensecflag = 1;
                        wflag_schedule = 1;
                        document.getElementById("showIfschedule").innerHTML = ['定時澆水:watering，剩餘時間:', tensec, '秒'].join('');
                        led.on();
                      } else if (tensecflag == 1 && 0 < tensec && tensec <= 10) {
                        tensec = tensec - 1;
                        wflag_schedule = 1;
                        document.getElementById("showIfschedule").innerHTML = ['定時澆水:watering，剩餘時間:', tensec, '秒'].join('');
                        led.on();
                        if (tensec == 0) {
                          waitfifteen = 15;
                          tensecflag = 0;
                          wflag_schedule = 0;
                        }
                      } else {
                        waitfifteen = waitfifteen - 1;
                        document.getElementById("showIfschedule").innerHTML = ['定時澆水:no watering，剩餘等待時間:', waitfifteen, '秒'].join('');
                        if (wflag_soil == 0 && wflag_alarm == 0 && wflag_manully == 0 && wflag_schedule == 0) {
                          led.off();
                        }
                      }
                      _context10.next = 3;
                      return delay(1);

                    case 3:
                      fsche();

                    case 4:
                    case "end":
                      return _context10.stop();
                  }
                }
              }, _callee10, this);
            }));

            return function fsche() {
              return ref.apply(this, arguments);
            };
          })();

          if (window.readyBoardLength) {
            window.readyBoardLength = window.readyBoardLength + 1;
          } else {
            window.readyBoardLength = 1;
          }

          boardReady('vnO1', (function () {
            var ref = _asyncToGenerator(regeneratorRuntime.mark(function _callee11(board) {
              return regeneratorRuntime.wrap(function _callee11$(_context11) {
                while (1) {
                  switch (_context11.prev = _context11.next) {
                    case 0:
                      board.systemReset();
                      board.samplingInterval = 250;
                      dht = getDht(board, 11);
                      relay = getRelay(board, 9);
                      if (window.boardReadyNumber) {
                        window.boardReadyNumber = window.boardReadyNumber + 1;
                      } else {
                        window.boardReadyNumber = 1;
                      }
                      allBoardReady(window.boardReadyNumber);

                    case 6:
                    case "end":
                      return _context11.stop();
                  }
                }
              }, _callee11, this);
            }));

            return function (_x3) {
              return ref.apply(this, arguments);
            };
          })());

          if (window.readyBoardLength) {
            window.readyBoardLength = window.readyBoardLength + 1;
          } else {
            window.readyBoardLength = 1;
          }

          boardReady('YWgg', (function () {
            var ref = _asyncToGenerator(regeneratorRuntime.mark(function _callee12(board) {
              return regeneratorRuntime.wrap(function _callee12$(_context12) {
                while (1) {
                  switch (_context12.prev = _context12.next) {
                    case 0:
                      board.systemReset();
                      board.samplingInterval = 250;
                      soil = getSoil(board, 3);
                      led = getLed(board, 8);
                      rgbled = getRGBLed(board, 6, 9, 10);
                      buzzer = getBuzzer(board, 7);
                      pir = getPir(board, 11);
                      alarm = '1:1:1';
                      alarmtensec = 0;
                      alarmtensecflag = 0;
                      wflag_soil = 0;
                      wflag_manully = 0;
                      wflag_schedule = 0;
                      wflag_alarm = 0;
                      waitfifteen = 15;
                      tensec = 0;
                      tensecflag = 0;
                      if (window.boardReadyNumber) {
                        window.boardReadyNumber = window.boardReadyNumber + 1;
                      } else {
                        window.boardReadyNumber = 1;
                      }
                      allBoardReady(window.boardReadyNumber);

                    case 19:
                    case "end":
                      return _context12.stop();
                  }
                }
              }, _callee12, this);
            }));

            return function (_x4) {
              return ref.apply(this, arguments);
            };
          })());

          allBoardReady = (function () {
            var ref = _asyncToGenerator(regeneratorRuntime.mark(function _callee13(boardReadyNumber) {
              return regeneratorRuntime.wrap(function _callee13$(_context13) {
                while (1) {
                  switch (_context13.prev = _context13.next) {
                    case 0:
                      if (!(window.boardReadyNumber == window.readyBoardLength)) {
                        _context13.next = 9;
                        break;
                      }

                      _context13.next = 3;
                      return fdete();

                    case 3:
                      fdht();
                      fsoil();
                      fsche();
                      _context13.next = 8;
                      return fmanu();

                    case 8:
                      falarm();

                    case 9:
                    case "end":
                      return _context13.stop();
                  }
                }
              }, _callee13, this);
            }));

            return function allBoardReady(_x5) {
              return ref.apply(this, arguments);
            };
          })();

        case 13:
        case "end":
          return _context14.stop();
      }
    }
  }, _callee14, this);
}))();