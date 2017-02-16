/**
 * Created by ajmul on 2/2/2017.
 */
function getCols(checkBoxListId){
    //var checkBoxListId = "ReportColsList"
    var elementRef = document.getElementById(checkBoxListId);
    var checkBoxArray = elementRef.getElementsByTagName('input');
    var selections = [];

    var count = 1;
    for (var i =0; i <checkBoxArray.length; i++){
        if(checkBoxArray[i].checked==true){
            selections[count] = checkBoxArray[i].value;
            count++;
        }

    }
    //alert(selections.length);
    return selections;
}