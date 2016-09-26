/* \u00e1 -> á , \u00e9 -> é , \u00ed -> í , \u00f3 -> ó , \u00fa  , \u00fa -> ú , \u00c1 -> Á ,
 \u00c9 -> É , \u00cd -> Í , \u00d3 -> Ó , \u00da -> Ú , \u00f1 -> ñ , \u00d1 -> Ñ */

function lee_json() {
$(".panel-body").html('<div class="row"></div>');
$.getJSON("../assets/js/preguntas.json", function(datos) {
$.each(datos["preguntas"], function(idx,preg) {
console.log(preg.title);
construirHtmlPregunta(preg.title,preg.options,preg.name);
});
});
}

function construirHtmlPregunta(title, opciones, name){
var html = '<div class="col-md-8"><div class="form-group"><label>'+title+'</label>';
html += '<select name="'+name+'" id="'+name+'" class="form-control">';
         $.each(opciones, function(idx,opt) {
         html += '<option value="'+opt.value+'">'+opt.name+' </option>';
		 });
         html += '</select></div></div>';
$(".row").append(html);
}