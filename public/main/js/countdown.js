
function CountdownTimer(elemID, timeLimit, limitMessage, msgClass) {
    this.initialize.apply(this, arguments);
}

CountdownTimer.prototype = {
    initialize: function (elemID, timeLimit, limitMessage, msgClass) {
        this.elem = document.getElementById(elemID);
        this.timeLimit = timeLimit;
        this.limitMessage = limitMessage;
        this.msgClass = msgClass;
    },

    countDown: function () {
        var timer;
        var today = new Date()
        var days = Math.floor((this.timeLimit - today) / (24 * 60 * 60 * 1000));
        var hours = Math.floor(((this.timeLimit - today) % (24 * 60 * 60 * 1000)) / (60 * 60 * 1000));
        var mins = Math.floor(((this.timeLimit - today) % (24 * 60 * 60 * 1000)) / (60 * 1000)) % 60;
        var secs = Math.floor(((this.timeLimit - today) % (24 * 60 * 60 * 1000)) / 1000) % 60 % 60;
        var milis = Math.floor(((this.timeLimit - today) % (24 * 60 * 60 * 1000)) / 10) % 100;
        var me = this;

        if ((this.timeLimit - today) > 0) {
            // timer = '<small>オープンまで</small><br>' + days + '<small>日</small>' + this.addZero(hours) + '<small>時間</small>' + this.addZero(mins) + '<small>分</small>' + this.addZero(secs) + '<small>秒</small>'
            // this.elem.innerHTML = timer;
            timer = '<span class="fs-4">オープンまで</span>&nbsp;' + days + '<span class="fs-4">日</span>'
            this.elem.innerHTML = timer;
            tid = setTimeout(function () { me.countDown(); }, 10);

        } else {
            this.elem.innerHTML = this.limitMessage;
            if (this.msgClass) {
                this.elem.setAttribute('class', this.msgClass);
            }
            return;
        }
    },

    addZero: function (num) {
        num = '00' + num;
        str = num.substring(num.length - 2, num.length);

        return str;
    }
}

cdTimer1();

function cdTimer1() {
    // 設定項目 ここから--------------------------------------------- 
    var elemID = 'countdown';
    var year = 2025; // 年  
    var month = 7; // 月  
    var day = 20; // 日  
    var limitMessage = 'オープンしました。';
    var msgClass = 'msg_1';
    // 設定項目 ここまで---------------------------------------------

    var timeLimit = new Date(year, month - 1, day);
    var timer = new CountdownTimer(elemID, timeLimit, limitMessage, msgClass);
    timer.countDown();
}
