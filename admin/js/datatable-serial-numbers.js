// Add an event listener for sorting and searching
dataTable.on('order.dt search.dt', function () {
    dataTable.column(1, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
    cell.innerHTML = i + 1;
    });
}).draw();