$(document).ready(function(){
    if($("#checkdoge").is(':checked')){
        $("#viewdoge").css('display','');
        $("#datawddoge").css('display','');
        $("#datadepodoge").css('display','');
        $("#trade").prop("href", "trade?coin=doge");
        $("#deposit").prop("href", "#deposit-doge");
        $("#referral").prop("href", "referral?coin=doge");
        $("#wd").prop("href", "#withdraw-doge");
        
        $("#checkbtt").prop("checked", false );
        $("#viewbtt").css('display','none');
        $("#datawdbtt").css('display','none');
        $("#datadepobtt").css('display','none');
        
        $("#checktron").prop("checked", false );
        $("#viewtron").css('display','none');
        $("#datawdtron").css('display','none');
        $("#datadepotron").css('display','none');
        
        $("#checkshiba").prop("checked", false );
        $("#viewshiba").css('display','none');
        $("#datawdshiba").css('display','none');
        $("#datadeposhiba").css('display','none');
    }else if($("#checkbtt").is(':checked')){
        $("#viewbtt").css('display','');
        $("#datawdbtt").css('display','');
        $("#datadepobtt").css('display','');
        $("#trade").prop("href", "trade?coin=btt");
        $("#deposit").prop("href", "#deposit-btt");
        $("#referral").prop("href", "referral?coin=btt");
        $("#wd").prop("href", "#withdraw-btt");

        $("#checkdoge").prop("checked", false );
        $("#viewdoge").css('display','none');
        $("#datawddoge").css('display','none');
        $("#datadepodoge").css('display','none');

        $("#checktron").prop("checked", false );
        $("#viewtron").css('display','none');
        $("#datawdtron").css('display','none');
        $("#datadepotron").css('display','none');

        $("#checkshiba").prop("checked", false );
        $("#viewshiba").css('display','none');
        $("#datawdshiba").css('display','none');
        $("#datadeposhiba").css('display','none');
    }else if($("#checktron").is(':checked')){
        $("#viewtron").css('display','');
        $("#datawdtron").css('display','');
        $("#datadepotron").css('display','');
        $("#trade").prop("href", "trade?coin=tron");
        $("#deposit").prop("href", "#deposit-tron");
        $("#referral").prop("href", "referral?coin=tron");
        $("#wd").prop("href", "#withdraw-tron");
        
        $("#checkbtt").prop("checked", false );
        $("#viewbtt").css('display','none');
        $("#datawdbtt").css('display','none');
        $("#datadepobtt").css('display','none');

        $("#checkdoge").prop("checked", false );
        $("#viewdoge").css('display','none');
        $("#datawddoge").css('display','none');
        $("#datadepodoge").css('display','none');

        $("#checkshiba").prop("checked", false );
        $("#viewshiba").css('display','none');
        $("#datawdshiba").css('display','none');
        $("#datadeposhiba").css('display','none');
    }else if($("#checkshiba").is(':checked')){
        $("#viewshiba").css('display','');
        $("#datawdshiba").css('display','');
        $("#datadeposhiba").css('display','');
        $("#trade").prop("href", "trade?coin=shiba");
        $("#deposit").prop("href", "#deposit-shiba");
        $("#referral").prop("href", "referral?coin=shiba");
        $("#wd").prop("href", "#withdraw-shiba");

        $("#checkbtt").prop("checked", false );
        $("#viewbtt").css('display','none');
        $("#datawdbtt").css('display','none');
        $("#datadepobtt").css('display','none');

        $("#checktron").prop("checked", false );
        $("#viewtron").css('display','none');
        $("#datawdtron").css('display','none');
        $("#datadepotron").css('display','none');

        $("#checkdoge").prop("checked", false );
        $("#viewdoge").css('display','none');
        $("#datawddoge").css('display','none');
        $("#datadepodoge").css('display','none');
    }
});

$("#checkdoge").change(function() {
    if($(this).is(':checked')){
        $("#viewdoge").css('display','');
        $("#datawddoge").css('display','');
        $("#datadepodoge").css('display','');
        $("#trade").prop("href", "trade?coin=doge");
        $("#deposit").prop("href", "#deposit-doge");
        $("#referral").prop("href", "referral?coin=doge");
        $("#wd").prop("href", "#withdraw-doge");
        
        $("#checkbtt").prop("checked", false );
        $("#viewbtt").css('display','none');
        $("#datawdbtt").css('display','none');
        $("#datadepobtt").css('display','none');
        
        $("#checktron").prop("checked", false );
        $("#viewtron").css('display','none');
        $("#datawdtron").css('display','none');
        $("#datadepotron").css('display','none');
        
        $("#checkshiba").prop("checked", false );
        $("#viewshiba").css('display','none');
        $("#datawdshiba").css('display','none');
        $("#datadeposhiba").css('display','none');
    }
});

$("#checkbtt").change(function() {
    if($(this).is(':checked')){
        $("#viewbtt").css('display','');
        $("#datawdbtt").css('display','');
        $("#datadepobtt").css('display','');
        $("#trade").prop("href", "trade?coin=btt");
        $("#deposit").prop("href", "#deposit-btt");
        $("#referral").prop("href", "referral?coin=btt");
        $("#wd").prop("href", "#withdraw-btt");

        $("#checkdoge").prop("checked", false );
        $("#viewdoge").css('display','none');
        $("#datawddoge").css('display','none');
        $("#datadepodoge").css('display','none');

        $("#checktron").prop("checked", false );
        $("#viewtron").css('display','none');
        $("#datawdtron").css('display','none');
        $("#datadepotron").css('display','none');

        $("#checkshiba").prop("checked", false );
        $("#viewshiba").css('display','none');
        $("#datawdshiba").css('display','none');
        $("#datadeposhiba").css('display','none');
    }
});

$("#checktron").change(function() {
    if($(this).is(':checked')){
        $("#viewtron").css('display','');
        $("#datawdtron").css('display','');
        $("#datadepotron").css('display','');
        $("#trade").prop("href", "trade?coin=tron");
        $("#deposit").prop("href", "#deposit-tron");
        $("#referral").prop("href", "referral?coin=tron");
        $("#wd").prop("href", "#withdraw-tron");
        
        $("#checkbtt").prop("checked", false );
        $("#viewbtt").css('display','none');
        $("#datawdbtt").css('display','none');
        $("#datadepobtt").css('display','none');

        $("#checkdoge").prop("checked", false );
        $("#viewdoge").css('display','none');
        $("#datawddoge").css('display','none');
        $("#datadepodoge").css('display','none');

        $("#checkshiba").prop("checked", false );
        $("#viewshiba").css('display','none');
        $("#datawdshiba").css('display','none');
        $("#datadeposhiba").css('display','none');
    }
});

$("#checkshiba").change(function() {
    if($(this).is(':checked')){
        $("#viewshiba").css('display','');
        $("#datawdshiba").css('display','');
        $("#datadeposhiba").css('display','');
        $("#trade").prop("href", "trade?coin=shiba");
        $("#deposit").prop("href", "#deposit-shiba");
        $("#referral").prop("href", "referral?coin=shiba");
        $("#wd").prop("href", "#withdraw-shiba");

        $("#checkbtt").prop("checked", false );
        $("#viewbtt").css('display','none');
        $("#datawdbtt").css('display','none');
        $("#datadepobtt").css('display','none');

        $("#checktron").prop("checked", false );
        $("#viewtron").css('display','none');
        $("#datawdtron").css('display','none');
        $("#datadepotron").css('display','none');

        $("#checkdoge").prop("checked", false );
        $("#viewdoge").css('display','none');
        $("#datawddoge").css('display','none');
        $("#datadepodoge").css('display','none');
    }
});