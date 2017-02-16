/**
 * Created by ajmul on 2/2/2017.
 */
//with sorting
var grid;
function intFormatter(row, cell, value, columnDef, dataContext) {
    return parseInt(value);
}

function sorterStringCompare(a, b) {
    var x = a[sortcol], y = b[sortcol];
    return sortdir * (x === y ? 0 : (x > y ? 1 : -1));
}
function sorterNumeric(a, b) {
    var x = (isNaN(a[sortcol]) || a[sortcol] === "" || a[sortcol] === null) ? -99e+10 : parseFloat(a[sortcol]);
    var y = (isNaN(b[sortcol]) || b[sortcol] === "" || b[sortcol] === null) ? -99e+10 : parseFloat(b[sortcol]);
    return sortdir * (x === y ? 0 : (x > y ? 1 : -1));
}

function sorterDateIso(a, b) {
    var regex_a = new RegExp("^((19[1-9][1-9])|([2][01][0-9]))\\d-([0]\\d|[1][0-2])-([0-2]\\d|[3][0-1])(\\s([0]\\d|[1][0-2])(\\:[0-5]\\d){1,2}(\\:[0-5]\\d){1,2})?$", "gi");
    var regex_b = new RegExp("^((19[1-9][1-9])|([2][01][0-9]))\\d-([0]\\d|[1][0-2])-([0-2]\\d|[3][0-1])(\\s([0]\\d|[1][0-2])(\\:[0-5]\\d){1,2}(\\:[0-5]\\d){1,2})?$", "gi");

    if (regex_a.test(a[sortcol]) && regex_b.test(b[sortcol])) {
        var date_a = new Date(a[sortcol]);
        var date_b = new Date(b[sortcol]);
        var diff = date_a.getTime() - date_b.getTime();
        return sortdir * (diff === 0 ? 0 : (date_a > date_b ? 1 : -1));
    }
    else {
        var x = a[sortcol], y = b[sortcol];
        return sortdir * (x === y ? 0 : (x > y ? 1 : -1));
    }
}

function makeGrid(columns, data){

    var options = {
        enableCellNavigation: true,
       enableColumnReorder: true,
        multiColumnSort: true
    };
    data.getItemMetadata = function (row) {
        if(data[row].Colour == "red"){
            //alert(data[row].EventId);
            return {
                cssClasses: 'highlight_red'
            }
        }
        else if(data[row].Colour == "purple"){
            // alert(row);
            return {
                cssClasses: 'highlight_purple'
            }
        }
    }

    $(function () {




        grid = new Slick.Grid("#myGrid", data, columns, options);

        grid.onSort.subscribe(function (e, args) {
            var cols = args.sortCols;

            data.sort(function (dataRow1, dataRow2) {
                for (var i = 0, l = cols.length; i < l; i++) {
                    sortdir = cols[i].sortAsc ? 1 : -1;
                    sortcol = cols[i].sortCol.field;

                    //var value1 = dataRow1[field], value2 = dataRow2[field];
                    var result = cols[i].sortCol.sorter(dataRow1, dataRow2);//(value1 == value2 ? 0 : (value1 > value2 ? 1 : -1)) * sign;
                    if (result != 0) {
                        return result;
                    }
                }
                return 0;
            });
            grid.invalidate();
            grid.render();
        });

        grid.onClick.subscribe(function (e) {

            //find which cell was pressed
            var cell = grid.getCellFromEvent(e);
            //if the column was priority do this stuff
            if (grid.getColumns()[cell.cell].id == "EventId") {
                //window.open("google.com", _self);

                var eventid = data[cell.row].EventId;
                var pccomm = data[cell.row].Portfolio_Comment;
                var savd = new Date();
                var savd = savd.getDate() + "/" + (savd.getMonth()+1) + "/" + savd.getFullYear();
               //alert(savd);
                openTab2(event,'TrainingView', eventid, pccomm, savd);
                e.stopPropagation();
            }

        });

    })
}
function openTab2(evt, tabName, eventid, pccomm, savd) {


    document.forms["StaticField"].elements["evid"].value = eventid;
    document.forms["COform"].elements["PCcomm"].value = pccomm;
    document.forms["COform"].elements["saved"].value= savd;
    document.forms["COform"].elements["jobstat"].value= "Unemployed";

    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
    

    if(tabName == "Myclaims"){
        myClaims();
    }
}