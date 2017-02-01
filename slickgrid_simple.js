/**
 * Created by ajmul on 2/2/2017.
 */

var grid;

function makeGrid(columns, data){

    var options = {
        enableCellNavigation: true,
        enableColumnReorder: false
    };

    $(function () {


        grid = new Slick.Grid("#myGrid", data, columns, options);

    })
}