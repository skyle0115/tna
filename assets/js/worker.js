function click_info_strike(){
    $.post("worker/strike.php", {},
    function(data, status){
        Materialize.toast(data, 4000);
    });
}
