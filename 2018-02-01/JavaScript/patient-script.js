/* Ticking Clock */
(function () {
    function checkTime(i) {
        return (i < 10) ? "0" + i : i;
    }

    function ordinalSuffix(num) {
        if ((num == 1) || (num == 21) || (num == 31)) {
            return "st";
        }
        else if ((num == 2) || (num == 22)) {
            return "nd";
        }
        else if ((num == 3) || (num == 23)) {
            return "rd";
        }
        else {
            return "th";
        }
    }

    function startTime() {
        var today = new Date();

        var hours = today.getHours() > 12 ? today.getHours() - 12: today.getHours();
        hours = checkTime(hours);
        var minutes = checkTime(today.getMinutes());
        var seconds = checkTime(today.getSeconds());
        var timeOfDay = today.getHours() > 12 ? "PM" : "AM";

        var year = "2018";
        var month = today.getMonth();
        var nameMonth = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var day = today.getDate();

        document.getElementById('header-datetime').innerHTML = nameMonth[month] + " " + day + ordinalSuffix(day) + "," + " " + year + 
               " " + hours + ":" + minutes + ":" + seconds + " " + timeOfDay;

        t = setTimeout(function () {
            startTime()
        }, 500);
    }
    startTime();
})();
/*      END      */