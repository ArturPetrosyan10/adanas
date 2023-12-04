/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referencing this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'FOS-Icons\'">' + entity + '</span>' + html;
	}
	var icons = {
		'fs-icon-remove': '&#xe90c;',
		'fs-icon-close': '&#xe90b;',
		'fs-icon-filter': '&#xe90a;',
		'fs-icon-check': '&#xe909;',
		'fs-icon-search': '&#xe908;',
		'fs-icon-arrow': '&#xe900;',
		'fs-icon-basket': '&#xe901;',
		'fs-icon-bell': '&#xe902;',
		'fs-icon-chevron': '&#xe903;',
		'fs-icon-heart': '&#xe904;',
		'fs-icon-minus': '&#xe905;',
		'fs-icon-plus': '&#xe906;',
		'fs-icon-user': '&#xe907;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/fs-icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
