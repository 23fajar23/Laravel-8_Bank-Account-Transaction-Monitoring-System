"use strict";
var KTGeneralFullCalendarDragDemos = {
    init: function () {
        !(function () {
            var e = document.getElementById("kt_docs_fullcalendar_events_list");
            new FullCalendar.Draggable(e, {
                itemSelector: ".fc-event",
                eventData: function (e) {
                    return { title: e.innerText.trim() };
                },
            });
            var t = document.getElementById("kt_docs_fullcalendar_drag");
            new FullCalendar.Calendar(t, {
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
                },
                editable: !0,
                droppable: !0,
                drop: function (e) {
                    document.getElementById("drop-remove").checked &&
                        e.draggedEl.parentNode.removeChild(e.draggedEl);
                },
            }).render();
        })();
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTGeneralFullCalendarDragDemos.init();
});
