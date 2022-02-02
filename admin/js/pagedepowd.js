
function getPageList(totalPages, page, maxLength){
    function range(start, end){
        return Array.from(Array(end - start + 1), (_, i) => i + start);
    }

    var sideWidth = maxLength < 9 ? 1 : 2;
    var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
    var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;

    if(totalPages <= maxLength){
        return range(1, totalPages);
    }

    if(page <= maxLength - sideWidth - 1 - rightWidth){
        return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages));
    }

    if(page >= totalPages - sideWidth - 1 - rightWidth){
        return range(1, sideWidth).concat(0, range(totalPages- sideWidth - 1 - rightWidth - leftWidth, totalPages));
    }

    return range(1, sideWidth).concat(0, range(page - leftWidth, page + rightWidth), 0, range(totalPages - sideWidth + 1, totalPages));
}


var numberOfItemsDepo = $(".deposit tr").length;
var numberOfItemswd = $(".withdraw tr").length;
var limitPerPage = 10; //How many card items visible per a page
var totalPagesDepo = Math.ceil(numberOfItemsDepo / limitPerPage);
var totalPageswd = Math.ceil(numberOfItemswd / limitPerPage);
var paginationSize = 7; //How many page elements visible in the pagination
var currentPageDepo = 0;
var currentPageWd = 0;

    function showPageDepo(whichPage){
        if(whichPage < 1 || whichPage > totalPagesDepo) return false;

        currentPageDepo = whichPage;

        $(".deposit tr").hide().slice((currentPageDepo - 1) * limitPerPage, currentPageDepo * limitPerPage).show();

        $(".depolist li").slice(1, -1).remove();

        getPageList(totalPagesDepo, currentPageDepo, paginationSize).forEach(item => {
            $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots")
            .toggleClass("active", item === currentPageDepo).append($("<a>").addClass("page-link")
            .attr({href: "javascript:void(0)"}).text(item || "...")).insertBefore(".next-page");
        });

        $(".previous-page").toggleClass("disable", currentPageDepo === 1);
        $(".next-page").toggleClass("disable", currentPageDepo === totalPagesDepo);
        return true;
    }

    if(numberOfItemsDepo){
        $(".depolist").append(
            $("<li>").addClass("page-item").addClass("previous-page").append($("<a>").addClass("page-link").attr({href: "javascript:void(0)"}).text("Prev")),
            $("<li>").addClass("page-item").addClass("next-page").append($("<a>").addClass("page-link").attr({href: "javascript:void(0)"}).text("Next"))
        );
    }
    
    $(".deposit").show();
    $("#deposhow").click(function() {
        $("#wd").css('display','none');
        $("#depo").css('display','');
        var pagedepo = currentPageDepo == 0 ? 1 : currentPageDepo;
        showPageDepo(pagedepo);
    })

    $(document).on("click", ".depolist li.current-page:not(.active)", function(){
        return showPageDepo(+$(this).text());
    });

    $(".depolist .next-page").on("click", function(){
        return showPageDepo(currentPageDepo + 1);
    });

    $(".depolist .previous-page").on("click", function(){
        return showPageDepo(currentPageDepo - 1);
    });

    function showPageWD(whichPage){
        if(whichPage < 1 || whichPage > totalPageswd) return false;

        currentPageWd = whichPage;

        $(".withdraw tr").hide().slice((currentPageWd - 1) * limitPerPage, currentPageWd * limitPerPage).show();

        $(".wdlist li").slice(1, -1).remove();

        getPageList(totalPageswd, currentPageWd, paginationSize).forEach(item => {
            $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots")
            .toggleClass("active", item === currentPageWd).append($("<a>").addClass("page-link")
            .attr({href: "javascript:void(0)"}).text(item || "...")).insertBefore(".next-page");
        });

        $(".previous-page").toggleClass("disable", currentPageWd === 1);
        $(".next-page").toggleClass("disable", currentPageWd === totalPageswd);
        return true;
    }

    if(numberOfItemswd > 0){
        $(".wdlist").append(
            $("<li>").addClass("page-item").addClass("previous-page").append($("<a>").addClass("page-link").attr({href: "javascript:void(0)"}).text("Prev")),
            $("<li>").addClass("page-item").addClass("next-page").append($("<a>").addClass("page-link").attr({href: "javascript:void(0)"}).text("Next"))
        );
    }
    $(".withdraw").show();
    $("#wdshow").click(function() {
        $("#wd").css('display','');
        $("#depo").css('display','none');
        showPageWD(currentPageWd);
    });
    showPageWD(1);

    $(document).on("click", ".wdlist li.current-page:not(.active)", function(){
        return showPageWD(+$(this).text());
    });

    $(".wdlist .next-page").on("click", function(){
        return showPageWD(currentPageWd + 1);
    });

    $(".wdlist .previous-page").on("click", function(){
        return showPageWD(currentPageWd - 1);
    });
