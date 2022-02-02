$(document).ready(function(){
    $("#search_member").keyup(function(){
        if($(this).val() != ""){
            search_table($(this).val());
        }
    });
});

function search_table(value){
    $(".data-search tbody tr").each(function(){
        var found = "false";
        if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0){
            found = "true";
        }
        if(found == "true"){
            $(this).show();
        }else{
            $(this).hide();
        }
    });
}