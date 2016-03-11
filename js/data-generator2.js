
(function(w, undefined) {
				alert(firstNames);

  var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

  function randomDate() {
    var start = new Date(1960, 0, 1), end = new Date(1994, 0, 1);
    return new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
  }

  w.generateRows = function(rows, extraCols) {
    rows = rows || 100;
    extraCols = extraCols || 0;
    for (var i = 0; i < rows; i++) {
      var data = {
        firstName: firstNames[Math.floor(Math.random() * firstNames.length)],
        lastName: lastNames[Math.floor(Math.random() * lastNames.length)],
        jobTitle: jobTitles[Math.floor(Math.random() * jobTitles.length)],
        dob: randomDate()
      };
      var row = '<tr>';
      //row += '<td class="expand"></td>';
      row += '<td>' + data.firstName + '</td>';
      row += '<td>' + data.lastName + '</td>';
      row += '<td>' + data.jobTitle + '</td>';
      row += '<td data-value="' + data.dob.getTime() + '">' + data.dob.getDate() + ' ' + months[data.dob.getMonth()] + ' ' + data.dob.getFullYear() +'</td>';
      for (var j = 0; j < extraCols; j++) {
        row += '<td>' + (i+1) + '.' + (j+1) + '</td>';
      }
      row += '</tr>';
      document.writeln(row);
    }
  };
})(window);