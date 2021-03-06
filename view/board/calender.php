<!DOCTYPE html>
<html>
<head lang="en">
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
     <!-- <meta http-equiv="x-ua-compatible" content="ie=edge"> -->
     <title>Calendar Event</title>
     <base href="/freshgrc/">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.css" rel="stylesheet" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js"></script>
     <!-- <link rel="stylesheet" type="text/css" href="http://qtip2.com/static/stylesheets/libs/jquery.fullcalendar.css"> -->
     <script type="text/javascript" src="metronic/theme/assets/pages/scripts/jqueryfullcalendar.js"></script>
     <script type="text/javascript" src="http://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
</head>
<body>
<div id='calendar' style="width: 50%;height: 50%;margin-left: 250px;"></div>
<script>
    $(document).ready( function() {
        $.ajax({
            dataType: "json",
            contentType: 'application/json',
            url: "view/board/boardDataForCalender.php",
            data: "",
            success:boardcalender
          });
    });

function boardcalender(data){

  var chartData=[];
for(i=0;i<data.length;i++)
     {
     chartData.push({"title":data[i].title,"start":data[i].date});
      }
  console.log(data);
$('#calendar').fullCalendar({
eventMouseover: function (data, event, view) {

            tooltip = '<div class="tooltiptopicevent" style="width:auto;height:auto;background:#a4a7ae;position:absolute;z-index:10001;padding:10px 10px 10px 10px ;  line-height: 200%;">' + 'Title: ' + ': ' + data.title + '</br>' + 'Start_date: ' + ': ' + data.date + '</div>';


            $("body").append(tooltip);
            $(this).mouseover(function (e) {
                $(this).css('z-index', 10000);
                $('.tooltiptopicevent').fadeIn('500');
                $('.tooltiptopicevent').fadeTo('10', 1.9);
            }).mousemove(function (e) {
                $('.tooltiptopicevent').css('top', e.pageY + 10);
                $('.tooltiptopicevent').css('left', e.pageX + 20);
            });


        },
        eventMouseout: function (data, event, view) {
            $(this).css('z-index', 8);

            $('.tooltiptopicevent').remove();

        },
        dayClick: function () {
            tooltip.hide()
        },
        eventResizeStart: function () {
            tooltip.hide()
        },
        eventDragStart: function () {
            tooltip.hide()
        },
        viewDisplay: function () {
            tooltip.hide()
        },


    events: chartData
});
for (var i = 0; i < events.length; i++) {
    var evStartDate = new Date(events[i].start),
        evFinishDate = new Date(events[i].end);
    if (events[i].end) {
        while (evStartDate <= evFinishDate) {
            addClassByDate(evStartDate);
            evStartDate.setDate(evStartDate.getDate() + 1);
        }
    } else {
        addClassByDate(evStartDate);
    }
}

function addClassByDate(date) {
    var dataAttr = getDataAttr(date);
    $("[data-date='" + dataAttr + "']").addClass("hasEvent");
}

function getDataAttr(date) {
    return date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + (date.getDate().toString().length === 2 ? date.getDate() : "0" + date.getDate());
};
}
</script>
</body>
</html>