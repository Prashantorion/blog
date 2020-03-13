
function clock() {

   var now = new Date();

   var outStr = now.getHours()+':'+now.getMinutes()+':'+now.getSeconds();

   document.getElementById('clockDiv').innerHTML=outStr;

   setTimeout('clock()',1000);

}



function curDate() {

   var now = new Date();

   var month = new Array();
    month[0] = "Jan";
    month[1] = "Feb";
    month[2] = "Mar";
    month[3] = "Apr";
    month[4] = "May";
    month[5] = "Jun";
    month[6] = "Jul";
    month[7] = "Aug";
    month[8] = "Sep";
    month[9] = "Oct";
    month[10] = "Nov";
    month[11] = "Dec";

    var d = new Date();
    var n = month[d.getMonth()];	

   var outStr = now.getDate()+' / '+n+' / '+now.getFullYear();

   document.getElementById('dateDiv').innerHTML=outStr;

}

clock();

curDate();


/*

var fullDate = new Date();console.log(fullDate);
var twoDigitMonth = fullDate.getMonth()+"";if(twoDigitMonth.length==1)	twoDigitMonth="0" +twoDigitMonth;
var twoDigitDate = fullDate.getDate()+"";if(twoDigitDate.length==1)	twoDigitDate="0" +twoDigitDate;
var currentDate = twoDigitDate + "/" + twoDigitMonth + "/" + fullDate.getFullYear();console.log(currentDate);

*/