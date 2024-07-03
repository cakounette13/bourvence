(function() {
	var popup = {
		init: function() {
			var cookie = document.cookie;
			window.addEventListener('load', function(e) {
				if(!cookie) {
					document.getElementById('popup').style.display = 'block'
				}
				document.getElementById('modal-close').addEventListener('click', function(e) {
					document.getElementById('popup').style.display = "none"
				});
			});
		}
	};
	popup.init();
})();