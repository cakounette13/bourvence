(function() {
	var popup = {
		init: function() {
			var popupShowed = false;
			window.addEventListener('load', function(e) {
				if(!popupShowed) {
					document.getElementById('popup').style.display = 'block'
    				const popupShowed = true
				}
				document.getElementById('modal-close').addEventListener('click', function(e) {
					document.getElementById('popup').style.display = "none"
				});
			});
		}
	};
	popup.init();
})();