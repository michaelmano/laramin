const bootstrap = function bootstrap() {
	var pre = document.getElementsByTagName('pre'),
		pl = pre.length;
	for (var i = 0; i < pl; i++) {
		pre[i].innerHTML = '<span class="Pre__line"></span>' + pre[i].innerHTML;
		var num = pre[i].innerHTML.split(/\n/).length;
		for (var j = 0; j < num; j++) {
			var line_num = pre[i].getElementsByTagName('span')[0];
			line_num.innerHTML += '<span class="Pre__line-number">' + (j + 1) + '</span>';
		}
	}
}

export default bootstrap;