var Calendar = function(element, holidays, leaves) {

	var currentYear = new Date().getFullYear();
	var weekLabels = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
	var months = ['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];
	var day = 0;
	var cell = [];
	var table = document.createElement('table');
	var body = table.createTBody();
	var head = table.createTHead();
	var rowTh = head.insertRow(-1);
	rowTh.insertCell(-1).innerHTML = '';

	for (var dayLabel = 0;37 > dayLabel;dayLabel++) {
	  7 === day && (day = 0);
	  var dayLb = rowTh.insertCell(-1);
	  dayLb.innerHTML = weekLabels[day].substring(0,1); 
	  dayLb.className = 'dayLabel';
	  if(weekLabels[day].substring(0,1) == "S") {
	  	dayLb.className = 'dayLabelWeekend';
	  }
	  day++;
	}

	for (var month = 0;month < months.length;month++) {
		var row = body.insertRow(-1);
		row.insertCell(-1).innerHTML = months[month];
		var firstDay = new Date(currentYear, month, 1).getUTCDay();
		var monthDays = new Date(currentYear, month+1, 1, -1).getUTCDate() + firstDay -1;
		cell[month] = [];
		for (var weekDay = 0; 37 >= weekDay;weekDay++) {
			cell[month][weekDay] = row.insertCell(-1);
			cell[month][weekDay].className = 'empty row';
		}
		for (var day = firstDay;day <= monthDays; day++) {
			var realDay = day - firstDay+ 1
			cell[month][day] && (
				cell[month][day].innerHTML = realDay,
				cell[month][day].className = 'day row'
				);

			new Date(currentYear, month, realDay).getUTCDay() > 4 && (
				cell[month][day] && (cell[month][day].className = 'weekend row')
			)
		}
	}
	for(holiday in holidays) {
		var dayDiff = new Date(new Date(holidays[holiday].to) - new Date(holidays[holiday].from));
		var firstDay = new Date(currentYear, new Date(holidays[holiday].to).getUTCMonth(), 1).getUTCDay() - 1;
		var from = new Date(holidays[holiday].from);
		for(var i=firstDay; i <= (dayDiff.getUTCDate() - 1) + firstDay; i++) {
			var date = new Date(currentYear, from.getUTCMonth(), from.getUTCDate()+i);
			var month = date.getUTCMonth();
			var day = date.getUTCDate();
			if(holidays[holiday].type === 'holiday' && cell[month][day].className !== 'empty') {
				cell[month][day].className = 'weekend'
			} else if(cell[month][day].className !== 'weekend' && cell[month][day].className !== 'empty') {
				cell[month][day].className = 'day'
			}
		}
	}

	for(leave in leaves) {
		var dayDiff = new Date(new Date(leaves[leave].to) - new Date(leaves[leave].from));
		var firstDay = new Date(currentYear, new Date(leaves[leave].to).getUTCMonth(), 1).getUTCDay() - 1;
		var from = new Date(leaves[leave].from);
		if(currentYear === from.getFullYear() && leaves[leave].type !== 'rejected') {
			for(var i=firstDay; i <= (dayDiff.getUTCDate() - 1) + firstDay; i++) {
				var date = new Date(currentYear, from.getUTCMonth(), from.getUTCDate()+i);
				var month = date.getUTCMonth();
				var day = date.getUTCDate()+1;
				cell[month][day].className = 'leave'
			}
		}
	}
	rowTh.insertCell(rowTh.length).innerHTML = '';
	document.getElementById(element).appendChild(table);
}