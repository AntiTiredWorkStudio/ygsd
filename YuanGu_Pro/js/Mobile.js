(function(doc_01, win_01) {
	var docEl_01 = doc_01.documentElement;
	var resizeEvt_01 = 'orientationchange' in window ? 'orientationchange' : 'resize';
	var recalc_01 = function() {
		var clientWidth_01 = docEl_01.clientWidth;
		var clientheight_01 = docEl_01.clientHeight;
		if(!clientWidth_01) return;
		if(clientWidth_01 < 641) {
			docEl_01.style.fontSize = (clientWidth_01 / 640 * 100).toFixed(1) + 'px';
		} else {
			docEl_01.style.fontSize = 100 + 'px';
            //console.log("xxx");
		}
	};
	recalc_01();
	if(!doc_01.addEventListener) return;
	win_01.addEventListener(resizeEvt_01, recalc_01, false);
})(document, window);