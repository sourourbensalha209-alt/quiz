( function ( $ ) {
    'use strict';

$('.time').mask('00:00:00');

if($('.iconpicker').length){
 $('.iconpicker').iconpicker({placement: 'bottom'});
}


$(document).ready(function(){
  $('.pt-scroll').scrollbar();
});

if($("#colorpicker-popup, .colorpicker-popup").length){
$("#colorpicker-popup, .colorpicker-popup").spectrum({
    color: $(this).val(),
		showInput: true,
    allowEmpty:true,
		preferredFormat: "hex",
		change: function(rr){
		},
		move: function(color) {
			if($(this).attr('name') == 'button_border_color'){
				$("[name=pg_bg_v]").val(color.toHexString());
			}
		}
	});
}


$.puerto_confirm = function( tit, aler, col) {
	$.confirm({
			icon: ( col == 'green' ? 'far fa-laugh-wink' : 'far fa-surprise'),
			theme: 'modern',
			closeIcon: true,
			animation: 'scale',
			type: col,
			title: tit,
			content: aler,
			buttons: false
	});
}


$('[name=chooseFile]').on('change', function (e) {
	var filename = e.target.files[0].name;
	$(".file-select-name").text(filename);
});


$.puertosend = function(Fid, Faj, Fty = 'modal', Fred = ''){
	$(Fid).on("submit", function(){
		var ths = $(this);
		var btn  = ths.find('button[type=submit]');
		var msg  = btn;
		var btxt = btn.html();
		var form = Faj == "sendpaypalitem" ? $("#payment-form") : $(this);

		btn.prop('disabled', true).html('<i class="fas fa-spinner fa-pulse fa-fw"></i> Loading..');

		$.post(path+"/ajax.php?pg="+ Faj, form.serialize(), function(puerto){
			if(Fty == 'modal'){
				if(puerto.type == 'success'){
					$.puerto_confirm("Success!", puerto.alert, "green");
					setTimeout(function () {
						if(Faj == 'sendpaypalitem' || Faj == 'sendpaypalplan') $(location).attr('href', puerto.url);
						else {
							if(Fred) $(location).attr('href', path+"/"+Fred);
							else location.reload();
						}
					}, 2000);
				} else {
					$.puerto_confirm("Error!", puerto.alert, "red");
					btn.html(btxt).prop('disabled', false);
				}
			} else {
				msg.before(puerto.alert);
				if(puerto.type == "danger"){
					setTimeout(function () {
						$(".alert").fadeOut('slow').remove();
						btn.html(btxt).prop('disabled', false);
					}, 3000);
				} else {
					setTimeout(function () {
						$(".alert").fadeOut('slow').remove();
						if(Faj == "sendsignup"){
							$("#registerModal").modal("hide");
							$("input[name=sign_name]").val($("input[name=reg_name]").val());
							$("input[name=sign_pass]").val($("input[name=reg_pass]").val());
						} else {
							if(Fred) $(location).attr('href', path+"/"+Fred);
							else location.reload();
						}
					}, 3000);
				}
			}
		}, "json");
		return false;
	});
}


$.puerto_droped = function( prtclick, prtlist = "ul.pt-drop" ){
	$(prtclick).on('click', function(){
		var ul = $(this).parent();
		if( ul.find(prtlist).hasClass('open') ){
			ul.find(prtlist).removeClass('open');
			$(this).removeClass('active');
		} else {
			$("ul.pt-drop, ul.dropdown").removeClass('open');
			$(prtlist).parent().find(".active").removeClass('active');
			$(prtlist).removeClass('open');
			ul.find(prtlist).addClass('open');
			$(this).addClass('active');
		}
		return false;
	});
	$("html, body").on('click', function(){
		$("ul.pt-drop, ul.dropdown").parent().find(".active").removeClass('active');
		$("ul.pt-drop, ul.dropdown").removeClass('open');
	});
}

$.puerto_droped(".pt-options-link");
$.puerto_droped(".pt-showmenudetails");
$.puerto_droped(".pt-showcats", ".dropdown");



$.puertoImage = function(id, choose, thumb, thumb2, crop = true){
	var id = id, choose = choose, name = $("input[rel='"+choose+"']"), thumb = thumb;
	$(id).imageUploader({
	  fileField: choose,
	  urlField: '#url',
	  hideFileField: false,
	  hideUrlField: false,
	  url: path+'/ajax.php?pg=imageupload'+(!crop ? '&request=crop' : ''),
	  thumbnails: {
	    div: thumb,
	    crop: 'zoom',
	    width: 150,
	    height: 150
	  },
	  afterUpload: function (data) {  name.val(data); $(thumb2).attr("src",data); },
	  onFileAdded: function(file)        {  },
	  onFilesSelected: function()        {  },
	  onUrlSelected: function()          {  },
	  onDragStart: function(event)       {  },
	  onDragEnd: function(event)         {  },
	  onDragEnter: function(event)       {  },
	  onDragLeave: function(event)       {  },
	  onDragOver: function(event)        {  },
	  onDrop: function(event)            {  },
	  onUploadProgress: function(event)  {  },
	  beforeUpload: function()           {  $(thumb).html(""); return true; },
	  error: function(msg) { alert(msg); },
	});
}

$.puertoImage('#dropZone', '#chooseFile', '#thumbnails', '#thumbnails');
$.puertoImage('#dropZone', '#chooseQuestion', '#thumbnailsQst', '#thumbnailsQst', false);
$.puertoImage('#dropZone', '#chooseAnswer', '#thumbnailsAns', '#thumbnailsAns');
$.puertoImage('#dropZone', '#chooseQuiz', '#thumbnailsQuiz', '#thumbnailsQuiz', false);



//- Wysibb Editor

if($("#wysibb-editor").length){
	var textarea = document.getElementById('wysibb-editor');
	sceditor.create(textarea, {
		format: 'bbcode',
		style: path+'/js/minified/themes/content/default.min.css',
		emoticonsRoot: path+'/js/minified/',
		height: 400,
		toolbarExclude: 'indent,outdent,email,date,time,ltr,rtl,print,subscript,superscript,table,code,quote,emoticon',
		icons: 'material',
	});
	var body = sceditor.instance(textarea).getBody();
	sceditor.instance(textarea).keyUp(function(e) {
		var val = sceditor.instance(textarea).val();
		sceditor.instance(textarea).updateOriginal();
	});
}


//- Delete
$(".pt-delete").on("click", function(){
	if(confirm("Are you sure you want to delete?")){
		var th   = $(this);
		var id   = $(this).data("id");
		var type = $(this).data("type");
		$.get(path+"/ajax.php?pg=delete&id="+id+"&request="+type, function(puerto){
			if(puerto) {
				if(type=='answer'){
					th.parent().parent().fadeOut("slow", function(){ $(this).remove(); });
				} else if(type=='question'){
					th.parent().parent().parent().fadeOut("slow", function(){ $(this).remove(); });
				} else {
					th.parent().parent().parent().parent().fadeOut("slow", function(){ $(this).remove(); });
				}

			}
		});
	}
	return false;
});

$(document).ready(function () {
var counterDown = setInterval(function () {
  var span = $(".count-down span").html();
  var counter = parseInt(span);
    $(".count-down span").html(counter - 1);
    $(".dur").val(counter - 1);
    if (counter === 10) {
      $(".count-down").css({
          backgroundColor: "orange"
      });
    } else if (counter === 5) {
      $(".count-down").css({
          backgroundColor: "red"
      });
    }
}, 1000);
});


//- Send order to paypal
$.puertosend(".sendpaypalplan", "sendpaypalplan");




$(".pt-login .bg-o").on('click', function(){
	var ul = $(this).parent();
	if( ul.find(".pt-drops").hasClass('open') ){
		ul.find(".pt-drops").removeClass('open');
		$(this).removeClass('active');
	} else {
		$(".pt-drops").parent().find(".active").removeClass('active');
		$(".pt-drops").removeClass('open');
		ul.find(".pt-drops").addClass('open');
		$(this).addClass('active');
	}
	return false;
});

$.puertosend("#sendlogin", "sendlogin", "alert");
$.puertosend("#sendsignup", "sendsignup", "alert");


$('.pt-logout').on('click', function(){
	if(confirm(lang['alerts']['logout'])){
		$.post(path+"/ajax.php?pg=logout", {type: 1}, function(puerto){
			$(location).attr('href', path+'/index.php');
		});
	}
});




//- Edit Cuisine
$(".pt-editcategorylink").on("click", function(){
	var id = $(this).data("id");
	$.get(path+"/ajax.php?pg=editcategory&id="+id, function(puerto){
		if(puerto){
			$("input[name=name]").val(puerto.name);
			$("input[name=id]").val(puerto.id);
			$("input[name=color]").val(puerto.color);
			$("input[name=icon]").val(puerto.icon);
			$("#myModal").modal("show");
		}
	}, 'json');
	return false;
});
$.puertosend("#sendcategory", "sendcategory", "alert");


$("input[name=search]").on('keyup keydown change', function(){
	var th = $(this);
	var vl = $(this).val();

	$.post(path+"/ajax.php?pg=search", {search:vl}, function(puerto){
		$(".sresults").html(puerto);
		th.parent().find('ul').addClass("open");
	});
});

$(".pt-lang a").on('click', function() {
	$.post(path+"/ajax.php?pg=lang", {id:$(this).attr('rel')}, function(puerto){ location.reload();});
});


$.puertosend("#sendsubscribe", "sendsubscribe");


$("#example-async").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slide",
		labels: {
        finish: lang['finish'],
        next: lang['next'],
        previous: lang['previous'],
        loading: lang['loading']
    },
    onStepChanging: function (event, currentIndex, newIndex)
    {
				return true;
    },
    onFinishing: function (event, currentIndex){
			var btn = $(this).find("a[href='#finish']");
			var btxt = btn.html();
			btn.addClass('disabled').html('<i class="fas fa-spinner fa-pulse fa-fw"></i> Loading..');
			btn.after('<span class="afterDisabled"></span>');

				$.post(path+"/ajax.php?pg=sendresponses", $("#sendresponses").serialize(), function(puerto){
					$(".all").text(puerto.all);
					$(".correct").text(puerto.correct);
					$(".pt-results h3").text(puerto.title);
					$(".pt-results h1").text(puerto.percentage);
					$(".pt-results i").attr("class", puerto.icon);
					setTimeout(function () {
						$("#example-async .content, #example-async .actions").slideUp();
						$(".pt-results").slideDown("slow");
						$(".pt-wrapper").css({'height': '100vh', 'overflow': 'hidden'});

					}, 1000);

				}, "json");
				return false;
    },

});


$("#sendquestion .selectpicker").on("changed.bs.select", function() {
	if(this.value == 'objective'){
		$(".truefalse").fadeIn().css('display','flex');
	} else {
		$(".truefalse").fadeOut().css('display','none');
	}
})


$(".quizsave").on("click", function(){
	var form = $("#sendquiz").serialize();
	form += '&status=0';
	$.post(path+"/ajax.php?pg=sendquiz", form, function(puerto){
		if(puerto.type == "success"){
			setTimeout(function () {
				$(location).attr('href', path+"/"+puerto.pagename+"?pg=quizzes&request=new&id="+puerto.id);
			}, 3000);
			$.puerto_confirm( "Success!", puerto.alert, "green");
		} else {
			$.puerto_confirm( "Error!", puerto.alert, "red");
		}
	}, "json");
	return false;
});


$(".quizpublish").on("click", function(){
	var form = $("#sendquiz").serialize();
	form += '&status=1';
	$.post(path+"/ajax.php?pg=sendquiz", form, function(puerto){
		if(puerto.type == "success"){
			setTimeout(function () {
				$(location).attr('href', path+"/"+puerto.pagename+"?pg=quizzes&request=new&id="+puerto.id);
			}, 3000);
			$.puerto_confirm( "Success!", puerto.alert, "green");
		} else {
			$.puerto_confirm( "Error!", puerto.alert, "red");
		}
	}, "json");
	return false;
});

$("#sendquestion").on("submit", function(){
	var form = $(this).serialize();
	$.post(path+"/ajax.php?pg=sendquestion", form, function(puerto){
		if(puerto.type == "success"){
			setTimeout(function () {
				$(location).attr('href', path+"/"+puerto.pagename+"?pg=quizzes&request=new&id="+puerto.id);
			}, 3000);
			$.puerto_confirm( "Success!", puerto.alert, "green");
		} else {
			$.puerto_confirm( "Error!", puerto.alert, "red");
		}
	}, "json");
	return false;
});

$("#sendanswer").on("submit", function(){
	var form = $(this).serialize();
	$.post(path+"/ajax.php?pg=sendanswer", form, function(puerto){
		if(puerto.type == "success"){
			setTimeout(function () {
				location.reload();
			}, 3000);
			$.puerto_confirm( "Success!", puerto.alert, "green");
		} else {
			$.puerto_confirm( "Error!", puerto.alert, "red");
		}
	}, "json");
	return false;
});








$.puertosend("#sendplans", "sendplans");
$.puertosend("#sendpage", "sendpage");
$.puertosend("#sendsettings", "sendsettings");
$.puertosend("#senduserdetails", "senduserdetails");













//---------------------------------------------
//- Sharts
$.barChart = function(ChartID, DataLabelss, DataCnts, DataClrs, DataTitle, DataType = 'bar'){
	new Chart(document.getElementById(ChartID), {
	    type: DataType, //horizontalBar
	    data: {
	      labels: DataLabelss,
	      datasets: [
	        {
	          label: DataTitle,
	          backgroundColor: DataClrs,
	          data: DataCnts
	        }
	      ]
	    },
	    options: {
	      legend: { display: false },
	      title: {
	        display: (DataTitle ? true : false),
	        text: DataTitle
	      },
				scales: {
	        xAxes: [{
            ticks: { beginAtZero: true }
	        }]
		    }
	    }
	});
}

$.lineChart = function(ChartID, DataLabelss, DataCnts, DataTitle){
	new Chart(document.getElementById(ChartID), {
		type: 'line',
		data: {
			labels: DataLabelss,
			datasets: [{
					data: DataCnts,
					label: false,
					borderColor: "#1c52f4",
					backgroundColor: 'rgba(28, 82, 244, 0.52)'
				}
			]
		},
		options: {
			legend: {
					display: false
			},
			title: {
				display: (DataTitle ? true : false),
				text: DataTitle
			},
			scales: {
					xAxes: [{
							ticks: {
									autoSkip: false,
									maxRotation: 40,
									minRotation: 40
							}
					}]
			}
	}
	});
}

$.pieChart = function(DataId, DataLabels, DataCnt, DataClrs, DataTitle){
	new Chart(document.getElementById(DataId), {
    type: 'doughnut',
    data: {
      labels: DataLabels,
      datasets: [
        {
          label: "Partisipate of",
          backgroundColor: DataClrs,
          data: DataCnt
        }
      ]
    },
		options: {
			legend: { display: true },
			title: {
				display: (DataTitle ? true : false),
				text: DataTitle
			}
		}
	});
}


if($("#orders-os").length){
	var oss = $("#orders-os").data('id');
	var os = oss ? oss : 0;
$.get(path+"/ajax.php?pg=orders-os&id="+oss, function(puerto) {

	var ass = JSON.parse(puerto);
	var DataLabelss = ass.labels;
	var DataCnts = ass.data;
	var DataTitle = ass.title;
	var DataClrs = ass.colors;

	$.pieChart("orders-os", DataLabelss, DataCnts, DataClrs);

});
}

if($("#quizzes-states").length){
$.get(path+"/ajax.php?pg=quizzes-states&request=days", function(puerto) {

	var ass = JSON.parse(puerto);
	var DataLabelss = ass.labels;
	var DataCnts = ass.data;
	var DataTitle = ass.title;
	var DataClrs = ass.colors;

	$.barChart("quizzes-states", DataLabelss, DataCnts, DataClrs, DataTitle);

});
$(".ptcpquizzesstates").on("click", function(){
	var ids = $(this).attr('rel');
	$.get(path+"/ajax.php?pg=quizzes-states&request="+ids, function(puerto) {
		var ass = JSON.parse(puerto);
		var DataLabelss = ass.labels;
		var DataCnts = ass.data;
		var DataTitle = ass.title;
		var DataClrs = ass.colors;
		$.barChart("quizzes-states", DataLabelss, DataCnts, DataClrs, DataTitle);
	});
	return false;
});
}

if($("#orders-devices").length){
	var devicess = $("#orders-devices").data('id');
	var devices = devicess ? devicess : 0;
$.get(path+"/ajax.php?pg=orders-devices&id="+devices, function(puerto) {

	var ass = JSON.parse(puerto);
	var DataLabelss = ass.labels;
	var DataCnts = ass.data;
	var DataTitle = ass.title;
	var DataClrs = ass.colors;

	$.pieChart("orders-devices", DataLabelss, DataCnts, DataClrs)

});
}

if($("#orders-cpgender").length){
	var cpgenders = $("#orders-cpgender").data('id');
	var cpgender = cpgenders ? cpgenders : 0;
$.get(path+"/ajax.php?pg=orders-cpgender&id="+cpgender, function(puerto) {

	var ass = JSON.parse(puerto);
	var DataLabelss = ass.labels;
	var DataCnts = ass.data;
	var DataTitle = ass.title;
	var DataClrs = ass.colors;

	$.pieChart("orders-cpgender", DataLabelss, DataCnts, DataClrs)

});
}

if($("#orders-cporders").length){
$.get(path+"/ajax.php?pg=orders-cporders&request=months", function(puerto) {
	var ass = JSON.parse(puerto);
	var DataLabelss = ass.labels;
	var DataCnts = ass.data;
	var DataTitle = ass.title;

	$.lineChart("orders-cporders", DataLabelss,DataCnts,DataTitle);

});
$(".ptcporders").on("click", function(){
	var ids = $(this).attr('rel');
	$.get(path+"/ajax.php?pg=orders-cporders&request="+ids, function(puerto) {
		var ass = JSON.parse(puerto);
		var DataLabelss = ass.labels;
		var DataCnts = ass.data;
		var DataTitle = ass.title;

		$.lineChart("orders-cporders", DataLabelss,DataCnts, DataTitle);
	});
	return false;
});
}







$(document).ready(function(){
$(function () {
var wrld = {
	map: 'world_mill_en',
	normalizeFunction: 'polynomial',
	regionStyle: regionStyling,
	backgroundColor: "transparent",
	zoomOnScroll: false,
	series: {
		regions: [{
			values: return_first,
			attribute: 'fill',
			scale: ['#92adff', '#1C52F4']}
	]},
onRegionTipShow: function(e, el, code){
	el.html( return_first[code] + ' Votes from ' + el.html());
	$(".lbl-hover").html('Hovered country value: ' + return_first[code]);
}
};

if ($('#world-map').length > 0) {
	$('#world-map').vectorMap(wrld);
}

});
});

var regionStyling = { initial: { fill: '#5c6366' }, hover: { fill: '#B0013A' }, selected: { fill: '#B0013A' } };

var return_first = function () {
	var tmp = null;
	var worlds = $('#world-map').data('id');
	var worldid = worlds ? worlds : 0;
	$.ajax({
		'async': false,
		'type': "GET",
		'dataType': 'JSON',
		'url': path+'/ajax.php?pg=world&id='+worldid,
		'success': function (data) {
				tmp = data;
		}
	});
	return tmp;
}();


} ( jQuery ) )
