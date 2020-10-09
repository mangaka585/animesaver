Vue.component("start-page", {
	template : "<section style='min-height: 100vh;text-align: center;'>\
				    <h2 style='padding-top: 150px;padding-bottom: 50px;'>Обучение вместе с AnimeSaver</h2>\
				    <div style='display: flex;flex-direction: row;max-width: 80%;margin-left: auto;margin-right: auto;'>\
				      <div style='margin-left: auto;margin-right: auto;padding-top: 10px;padding-bottom: 10px;padding-left: 25px;padding-right: 25px;'>Японский язык</div>\
				    </div>\
    			<section>",
});

var Study = new Vue ({
	el: '#study',
	data : {
		mainWindow : 'start-page',
	}
})