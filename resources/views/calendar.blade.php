<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Year Calendar</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    <style>
        .calendar-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .calendar {
            width: 100%;
            max-width: 400px; /* Adjust as needed */
            margin: 10px;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .tippy-box {
            width: 100%;
            max-width: none;
        }
    </style>
    <!-- Include Tippy.js CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
</head>
<body class="bg-gray-100 p-4">
    <div class="container mx-auto">
        <div class="calendar-container" id="calendar-container">
            <!-- Calendars will be dynamically added here -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var events = @json($events);

            if (typeof events === 'string') {
                events = JSON.parse(events);
            }

            var monthsWithEvents = [];

            // Group events by month
            events.forEach(event => {
                var eventDate = new Date(event.start);
                var monthYear = eventDate.getFullYear() + '-' + (eventDate.getMonth() + 1);
                if (!monthsWithEvents.includes(monthYear)) {
                    monthsWithEvents.push(monthYear);
                }
            });

            var calendarContainer = document.getElementById('calendar-container');

            monthsWithEvents.forEach((monthYear, index) => {
                var [year, month] = monthYear.split('-').map(Number);
                var calendarEl = document.createElement('div');
                calendarEl.id = 'calendar-' + index;
                calendarEl.className = 'calendar bg-white p-4';
                calendarContainer.appendChild(calendarEl);

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    initialDate: new Date(year, month - 1, 1),
                    headerToolbar: {
                        left: '',
                        center: 'title',
                        right: ''
                    },
                    events: events.filter(event => {
                        var eventDate = new Date(event.start);
                        return eventDate.getFullYear() === year && (eventDate.getMonth() + 1) === month;
                    }).map(event => {
                        return {
                            title: event.title,
                            start: event.start,
                            end: event.start, // Ensure event is shown only on the start date
                            extendedProps: {
                                description: event.description
                            }
                        };
                    }),
                    dayCellDidMount: function(info) {
                        if (info.date.getMonth() !== (month - 1)) {
                            info.el.style.display = 'none';
                        }
                    },
                    eventDidMount: function(info) {
                        var tooltipContent = `
                            <div class="p-2">
                                <strong>${info.event.title}</strong>
                                <p>Start: ${info.event.start.toISOString().slice(0, 10)}</p>
                                <p>End: ${info.event.end ? info.event.end.toISOString().slice(0, 10) : 'N/A'}</p>
                            </div>
                        `;
                        tippy(info.el, {
                            content: tooltipContent,
                            allowHTML: true,
                            theme: 'light',
                            interactive: true,
                            maxWidth: 'full', // Make tooltip full width
                            onShow(instance) {
                                instance.popper.style.width = '100%';
                            }
                        });
                    }
                });
                calendar.render();
            });
        });
    </script>
</body>
</html>
