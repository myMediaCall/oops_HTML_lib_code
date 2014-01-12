// give parent div obj 
function findAncestorByTagName(start, tagName) {
	var d;
    if (tagName.toUpperCase() === start.nodeName.toUpperCase()) {
        d=start;
    }
    else if (start === document.body) {
        d=0;
    }
    else {
        d=findAncestorByTagName(start.parentNode, tagName);
    }
	//alert(d.id);
	return d;
}

function scrollToAnchor(aid){	//alert('hii');
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}