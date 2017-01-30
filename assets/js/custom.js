$(function () {
    moment.locale('pt-br');
});

function applyFormErrors(errors, dataElement, status) {
    // percorre a lista de campos devolvidos da API
    $.each(errors, function (index, value) {
        // seleciona os elemento HTML de acordo com o campo mencionado
        var element = ($("[ng-model='" + dataElement + "." + index + "']").length > 0) ? $("[ng-model='" + dataElement + "." + index + "']") : $("[name='" + index + "']");

        if (element.is("table")) { // tratamento exclusivo para tabelas
            if($(element).find("thead").length > 0)
                $(element).find("thead").css("background-color", "#A94442").css("color", "#FFFFFF");
            else
                $(element).find("tbody tr td").css("border-color", "#A94442");
        }
        else if (element.is("span")) // tratamento exclusivo para spans
            $(element).css("border-color", "#A94442").css("color", "#A94442");
        else if (typeof (element.attr('flow-btn')) != "undefined")
            element = $(element).closest("span").css("background-color", "#A94442").css("border-color", "#A94442").css("color", "#FFFFFF");
        else if (element.hasClass("chosen")) {
            var form_group = element.closest(".form-group");
            if (form_group.find("a.chosen-single").length > 0)
                element = form_group.find("a.chosen-single");
            else if (form_group.find("ul.chosen-choices").length > 0)
                element = form_group.find("ul.chosen-choices");
            element.css("border-color", "#A94442");
        }

        // coloca a mensagem de erro no elemento HTML selecionado
        element.attr("data-toggle", "tooltip").attr("data-placement", "top").attr("title", value).attr("data-original-title", value);
        element.closest(".element-group").addClass("has-error");
    });

    // inicializa o tooltip para exibir o erro ao passar o mouse sobre o elemento HTML
    $('[data-toggle="tooltip"]').tooltip();
}

function clearValidationFormStyle() {
    $('[data-toggle="tooltip"]').removeAttr("data-toggle").removeAttr("data-placement").removeAttr("title").removeAttr("data-original-title");
    $(".element-group").removeClass("has-error");
    $("table thead").css("background-color", "#FFFFFF").css("color", "#515151");
    $("table tbody tr td").css("border-color", "rgba(0,0,0,0.11)");
    $(".form-fields span").css("background-color", "#fafafa").css("border-color", "#CDD6E1").css("color", "#515151");
    $("a.chosen-single").css("border-color", "#CDD6E1");
    $("ul.chosen-choices").css("border-color", "#CDD6E1");
}

function redirectToPageOnSuccess(pageFrom, pageTo) {
    setTimeout(function () {
        var newUrl = window.location.href;
        if (window.location.href.indexOf("?") != -1) {
            // Remove os parâmetros da url
            newUrl = window.location.href.substr(0, window.location.href.indexOf("?"));
        }
        // Faz o redirecionamento
        window.location.href = newUrl.replace(pageFrom, pageTo);
    }, 5000);
}

function getQueryParams(qs) {
    qs = qs.split('+').join(' ');

    var params = {},
            tokens,
            re = /[?&]?([^=]+)=([^&]*)/g;

    while (tokens = re.exec(qs)) {
        params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
    }

    return params;
}

function isEmpty(value) {
    return (typeof value === "undefined" || value === null || value === "");
}