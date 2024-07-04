(function() {
	var popup = {
		init: function() {
			window.addEventListener('load', function(e) {
				const cookies = document.cookie.split('; ')
				const value = cookies.find(c =>c.startsWith('adult'))?.split('=')[1]
				if(value === undefined) {
					document.getElementById('popup').style.display = 'block'
					document.cookie = "adult=yes"
				} else {
					document.getElementById('modal-close').addEventListener('click', function(e) {
					document.getElementById('popup').style.display = "none"
					});
					
				}
			});
		}
	};
	popup.init();
})();