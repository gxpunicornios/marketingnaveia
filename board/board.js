$(document).ready(function(){

	 $('textarea#post_text').froalaEditor({
      height: 350
    });

    $('#csv-export').click(function(){

    	var fileName = "leads_" + new Date().toLocaleString();
    	$.get("?export=1", function(data, status){

			if (window.navigator.msSaveOrOpenBlob) {
			    var blob = new Blob([data]);
			    window.navigator.msSaveOrOpenBlob(blob, fileName+'.csv');
			} else {
			    var a         = document.createElement('a');
			    a.href        = 'data:attachment/csv,' +  encodeURIComponent(data);
			    a.target      = '_blank';
			    a.download    = fileName+'.csv';
			    document.body.appendChild(a);
			    a.click();
			}
    	});
    });

});