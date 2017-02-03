/**
 * Created by ajmul on 2/2/2017.
 */
//with sorting
var grid;

function makeGrid(columns, data){

    var options = {
        enableCellNavigation: true,
        enableColumnReorder: false,
        multiColumnSort: true
    };

    $(function () {


        grid = new Slick.Grid("#myGrid", data, columns, options);

        grid.onSort.subscribe(function (e, args) {
            var cols = args.sortCols;

            data.sort(function (dataRow1, dataRow2) {
                for (var i = 0, l = cols.length; i < l; i++) {
                    var field = cols[i].sortCol.field;
                    var sign = cols[i].sortAsc ? 1 : -1;
                    var value1 = dataRow1[field], value2 = dataRow2[field];
                    var result = (value1 == value2 ? 0 : (value1 > value2 ? 1 : -1)) * sign;
                    if (result != 0) {
                        return result;
                    }
                }
                return 0;
            });
            grid.invalidate();
            grid.render();
        });

    })
}